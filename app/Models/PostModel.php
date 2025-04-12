<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
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

    private function _transformPostText($text) {
        // replace "http://www.grocerycrud.com/forums/" or "https://www.grocerycrud.com/forums/" with "/"
        $text = preg_replace('/https?:\/\/www.grocerycrud.com\/forums\//is', '/', $text);

        // replace <#EMO_DIR#> with 'default'
        $text = str_replace('<#EMO_DIR#>', 'default', $text);

        // replace [code] tags with <pre> tags
        $text = preg_replace('/\[code\](.*?)\[\/code\]/is', '<pre class="prettyprint prettyprinted">$1</pre>', $text);

        // replace [url] tags with <a> tags
        $text = preg_replace('/\[url="(.*?)"\](.*?)\[\/url\]/is', '<strong>$2</strong>', $text);

        return $text;
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

        foreach ($output as &$post) {

            $post->post_date_raw = date('Y-m-d', $post->post_date) . "T" . date('H:i:s', $post->post_date) . "+00:00";
            $post->post_date = date('d F Y - H:i A', $post->post_date);
            $post->post = $this->_transformPostText($post->post);
        }

        return $output;
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
