<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    /**
     * IPB leaves an [attachment=ID:filename] tag in the post body for every
     * attached file. The ID is the attach_id column of fm_attachments; the
     * filename is only a label and is not the name of the file on disk.
     */
    const ATTACHMENT_TAG_PATTERN = '/\[attachment=([0-9]+):([^\]]*)\]/i';

    protected $table = 'fm_posts';
    protected $primaryKey = 'pid';
    protected $allowedFields = [
        'append_edit',
        'edit_time',
        'author_id',
        'author_name',
        'use_sig',
        'use_emo',
        'ip_address',
        'post_date',
        'icon_id',
        'post',
        'queued',
        'topic_id',
        'post_title',
        'new_topic',
        'edit_name',
        'post_key',
        'post_htmlstate',
        'post_edit_reason',
        'post_bwoptions',
        'pdelete_time',
        'post_field_int',
        'post_field_t1',
        'post_field_t2'
    ];
    protected $returnType = 'array';

    private function _transformPostText($text, array $attachments = []) {
        // replace "http://www.grocerycrud.com/forums/" or "https://www.grocerycrud.com/forums/" with "/"
        $text = preg_replace('/https?:\/\/www.grocerycrud.com\/forums\//is', '/', $text);

        // point old documentation links to the v1.x documentation
        $text = $this->_replaceDocumentationLinks($text);

        // replace <#EMO_DIR#> with 'default'
        $text = str_replace('<#EMO_DIR#>', 'default', $text);

        // replace [code] tags with <pre> tags
        $text = preg_replace('/\[code\](.*?)\[\/code\]/is', '<pre class="prettyprint prettyprinted">$1</pre>', $text);

        // style IPB's stored code blocks like the [code] ones
        $text = $this->_styleStoredCodeBlocks($text);

        // replace [url] tags with <a> tags
        $text = preg_replace('/\[url="(.*?)"\](.*?)\[\/url\]/is', '<strong>$2</strong>', $text);

        // replace [attachment] tags with the image or with a download link
        $text = $this->_replaceAttachmentTags($text, $attachments);

        return $text;
    }

    /**
     * The old documentation now lives under /v1.x/. Every form of the old link
     * is rewritten to the same URL: http or https, with or without www, the
     * colon stored as "&#58;", or no scheme at all. The rest of the path is kept.
     */
    private function _replaceDocumentationLinks($text)
    {
        // Most posts have no documentation link, so skip the regex for them.
        if (stripos($text, 'grocerycrud.com/documentation') === false) {
            return $text;
        }

        return preg_replace(
            '~(?:https?(?::|&#58;)//|(?<![\w./-]))(?:www\.)?grocerycrud\.com/documentation(?![\w-])~i',
            'https://www.grocerycrud.com/v1.x/documentation',
            $text
        );
    }

    /**
     * IPB stored code blocks as <pre class="_prettyXprint ..."> and switched
     * the class back to "prettyprint" only when it displayed the post. Add the
     * classes our CSS styles. Only the real tag is matched, so HTML that a user
     * quoted as text (&lt;pre class="_prettyXprint") is left alone.
     */
    private function _styleStoredCodeBlocks($text)
    {
        // Most posts have no stored code block, so skip the replace for them.
        if (strpos($text, '_prettyXprint') === false) {
            return $text;
        }

        return str_replace(
            '<pre class="_prettyXprint',
            '<pre class="prettyprint prettyprinted _prettyXprint',
            $text
        );
    }

    /**
     * Collects every attachment referenced by the given posts and reads them
     * with a single query, so that a page of 20 posts still costs one query.
     *
     * @param object[] $posts
     * @return array<int, array> attachment rows, keyed by attach_id
     */
    private function _getAttachmentsForPosts($posts)
    {
        $attachmentIds = [];

        foreach ($posts as $post) {
            if (preg_match_all(self::ATTACHMENT_TAG_PATTERN, $post->post, $matches)) {
                $attachmentIds = array_merge($attachmentIds, $matches[1]);
            }
        }

        if (empty($attachmentIds)) {
            return [];
        }

        $attachmentModel = new AttachmentModel();

        return $attachmentModel->getByIds($attachmentIds);
    }

    private function _replaceAttachmentTags($text, array $attachments)
    {
        if (strpos($text, '[attachment=') === false) {
            return $text;
        }

        return preg_replace_callback(
            self::ATTACHMENT_TAG_PATTERN,
            function ($match) use ($attachments) {
                $attachmentId = (int)$match[1];

                // The row is gone from the database: fall back to the label
                // that is inside the tag, so that we never print raw BBCode.
                if (!isset($attachments[$attachmentId])) {
                    return esc(trim($match[2]));
                }

                return $this->_attachmentHtml($attachments[$attachmentId]);
            },
            $text
        );
    }

    private function _attachmentHtml(array $attachment)
    {
        $fileName = esc($attachment['attach_file']);

        if ((int)$attachment['attach_is_image'] === 1 && $attachment['attach_location'] !== '') {
            $url = esc($this->_uploadUrl($attachment['attach_location']));

            // The intrinsic size keeps the layout from jumping while loading.
            $width = (int)$attachment['attach_img_width'];
            $height = (int)$attachment['attach_img_height'];
            $sizeAttributes = $width > 0 && $height > 0
                ? ' width="' . $width . '" height="' . $height . '"'
                : '';

            return '<a href="' . $url . '" class="attachment-image" target="_blank" rel="noopener">'
                . '<img src="' . $url . '" class="bbc_img"' . $sizeAttributes
                . ' loading="lazy" alt="' . $fileName . '" />'
                . '</a>';
        }

        // Everything that is not an image was stored with an .ipb extension by
        // IPB, so it has to go through the download controller to get its real
        // name back.
        return '<a href="/attachment/' . (int)$attachment['attach_id'] . '" class="attachment-file">'
            . $fileName . ' (' . $this->_formatFileSize((int)$attachment['attach_filesize']) . ')</a>';
    }

    /**
     * Builds the public URL of an uploaded file. Each path segment is encoded
     * on its own, so that the slashes survive.
     */
    private function _uploadUrl($location)
    {
        $segments = array_map('rawurlencode', explode('/', $location));

        return '/uploads/' . implode('/', $segments);
    }

    private function _formatFileSize($bytes)
    {
        if ($bytes >= 1048576) {
            return round($bytes / 1048576, 2) . 'MB';
        }

        if ($bytes >= 1024) {
            return round($bytes / 1024, 2) . 'KB';
        }

        return $bytes . 'B';
    }

    public function getPosts($topicId, $page = 1)
    {
        if ((int)$page < 1) {
            return false;
        }

        $perPage = 20;
        $offset = ($page - 1) * $perPage;

        $output = $this->db->table('fm_posts')
            ->where('topic_id', $topicId)
            ->orderBy('post_date', 'ASC')
            ->join('fm_profile_portal', 'fm_profile_portal.pp_member_id = fm_posts.author_id')
            ->limit($perPage, $offset)
            ->get()
            ->getResult();

        $attachments = $this->_getAttachmentsForPosts($output);

        foreach ($output as &$post) {

            $post->post_date_raw = date('Y-m-d', $post->post_date) . "T" . date('H:i:s', $post->post_date) . "+00:00";
            $post->post_date = date('d F Y - h:i A', $post->post_date);
            $post->post = $this->_transformPostText($post->post, $attachments);
        }

        return $output;
    }

    /**
     * The start of the topic's first post as plain text, for the meta
     * description. Empty when the post has no text (an image only, say).
     */
    public function getTopicExcerpt($topicId)
    {
        $firstPost = $this->db->table('fm_posts')
            ->select('post')
            ->where('topic_id', $topicId)
            ->orderBy('post_date', 'ASC')
            ->limit(1)
            ->get()
            ->getRow();

        return $firstPost === null ? '' : self::toPlainText($firstPost->post);
    }

    /**
     * Turns IPB legacy markup (HTML, entities and BBCode) into one line of
     * plain text, cut at a word boundary. The result is not escaped.
     */
    public static function toPlainText($text, $maxLength = 160)
    {
        // Code reads badly in a search result, so drop it altogether.
        $text = preg_replace('~\[code\].*?\[/code\]|<pre\b.*?</pre>~is', ' ', (string)$text);
        $text = preg_replace(self::ATTACHMENT_TAG_PATTERN, ' ', $text);
        $text = preg_replace('~\[\*\]|\[/?[a-z]+(?:=[^\]]*)?\]~i', ' ', $text);
        $text = strip_tags(preg_replace('~<[^>]*>~', ' ', $text));
        $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = trim(preg_replace('~\s+~u', ' ', $text));

        if (mb_strlen($text) <= $maxLength) {
            return $text;
        }

        $text = mb_substr($text, 0, $maxLength);
        $lastSpace = mb_strrpos($text, ' ');

        if ($lastSpace !== false && $lastSpace > $maxLength / 2) {
            $text = mb_substr($text, 0, $lastSpace);
        }

        return rtrim($text, " ,.;:-") . '…';
    }

    public function getTotalPosts($topicId)
    {
        return $this->db->table('fm_posts')
            ->where('topic_id', $topicId)
            ->countAllResults();
    }

    public function getPaginationLinksForPosts($topicId, $topicSlug = "", $page = 1)
    {
        if ((int)$page < 1) {
            return false;
        }

        $perPage = 20;

        $totalPosts = $this->db->table('fm_posts')
            ->where('topic_id', $topicId)
            ->countAllResults();

        $totalPages = ceil($totalPosts / $perPage);

        if ((int)$page > $totalPages) {
            return false;
        }

        if ($totalPosts == 0 || $totalPosts <= $perPage) {
            return [
                'links' => [],
                'currentPage' => $page,
                'totalPages' => $totalPages
            ];
        }

        $paginationLinks = $this->_calculatePagination($page, $totalPages, $topicSlug);

        return [
            'links' => $paginationLinks,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ];
    }

    private function _calculatePagination ($currentPage, $totalPages, $topicSlug)
    {
        $links = [];

        if ($currentPage > 1) {
            $links[] = [
                'link' => $this->_pagingLink($topicSlug, 1),
                'label' => 'first'
            ];

            $links[] = [
                'link' => $this->_pagingLink($topicSlug, $currentPage - 1),
                'label' => 'previous'
            ];
        }

        for ($i = max($currentPage - 2, 1); $i <= min($currentPage + 2, $totalPages); $i++) {
            $links[] = [
                'link' => $this->_pagingLink($topicSlug, $i),
                'label' => (string)$i
            ];
        }

        if ($currentPage < $totalPages) {
            $links[] = [
                'link' => $this->_pagingLink($topicSlug, min($i, $totalPages)),
                'label' => 'next'
            ];

            if ($currentPage + 1 < $totalPages) {
                $links[] = [
                    'link' => $this->_pagingLink($topicSlug, $totalPages),
                    'label' => 'last'
                ];
            }
        }

        return $links;
    }

    private function _pagingLink($topicSlug, $page = 1) {
        if ($page == 1) {
            return "/topic/$topicSlug";
        }
        return "/topic/$topicSlug/page-$page";
    }
}
