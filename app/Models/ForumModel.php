<?php

namespace App\Models;

use CodeIgniter\Model;
class ForumModel extends Model
{
    protected $table = 'fm_forums';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'topics',
        'posts',
        'last_post',
        'last_poster_id',
        'last_poster_name',
        'name',
        'description',
        'position',
        'use_ibc',
        'use_html',
        'password',
        'password_override',
        'last_title',
        'last_id',
        'sort_key',
        'sort_order',
        'prune', 'topicfilter', 'show_rules', 'preview_posts', 'allow_poll',
        'allow_pollbump', 'inc_postcount', 'skin_id', 'parent_id', 'redirect_url',
        'redirect_on', 'redirect_hits', 'rules_title', 'rules_text',
        'notify_modq_emails', 'sub_can_post', 'permission_custom_error',
        'permission_showtopic', 'queued_topics', 'queued_posts', 'forum_allow_rating',
        'forum_last_deletion', 'newest_title', 'newest_id', 'min_posts_post',
        'min_posts_view', 'can_view_others', 'hide_last_info', 'name_seo',
        'seo_last_title', 'seo_last_name', 'last_x_topic_ids', 'forums_bitoptions',
        'disable_sharelinks', 'deleted_posts', 'deleted_topics', 'tag_predefined',
        'archived_topics', 'archived_posts', 'viglink', 'ipseo_priority'
    ];

    public function getForumById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function getAll()
    {
        // Get only the forums that are not deleted
        $this->where('topics >', '0');
        return $this->findAll();
    }

    public function getTopics($forumId, $page = 1)
    {
        if ((int)$page < 1) {
            return false;
        }

        $perPage = 30;
        $offset = ($page - 1) * $perPage;

        $output = $this->db->table('fm_topics')
            ->where('forum_id', $forumId)
            ->orderBy('pinned', 'DESC')
            ->orderBy('last_post', 'DESC')
            ->join('fm_profile_portal', 'fm_profile_portal.pp_member_id = fm_topics.last_poster_id')
            ->limit($perPage, $offset)
            ->get()
            ->getResult();

        foreach ($output as &$topic) {
            $topic->start_date_raw = date('Y-m-d', $topic->start_date) . "T" . date('H:i:s', $topic->start_date) . "+00:00";
            $topic->start_date = date('d F Y - H:i A', $topic->start_date);

            $topic->last_post_raw = date('Y-m-d', $topic->last_post) . "T" . date('H:i:s', $topic->last_post) . "+00:00";
            $topic->last_post = date('d F Y - H:i A', $topic->last_post);
        }

        return $output;
    }

    public function getPaginationLinksForTopics($forumId, $forumSlug = "", $page = 1)
    {
        if ((int)$page < 1) {
            return false;
        }

        $perPage = 30;
        $total = $this->db->table('fm_topics')
            ->where('forum_id', $forumId)
            ->countAllResults();

        $totalPages = ceil($total / $perPage);

        if ((int)$page > $totalPages) {
            return false;
        }

        if ($total == 0 || $total <= $perPage) {
            return [
                'links' => [],
                'currentPage' => $page,
                'totalPages' => $totalPages
            ];
        }

        $paginationLinks = $this->_calculatePagination($page, $totalPages, $forumSlug);

        return [
            'links' => $paginationLinks,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ];
    }

    private function _calculatePagination ($currentPage, $totalPages, $forumSlug)
    {
        $links = [];

        if ($currentPage > 1) {
            $links[] = [
                'link' => $this->_pagingLink($forumSlug, 1),
                'label' => 'first'
            ];

            $links[] = [
                'link' => $this->_pagingLink($forumSlug, $currentPage - 1),
                'label' => 'previous'
            ];
        }

        for ($i = max($currentPage - 2, 1); $i <= min($currentPage + 2, $totalPages); $i++) {
            $links[] = [
                'link' => $this->_pagingLink($forumSlug, $i),
                'label' => (string)$i
            ];
        }

        if ($currentPage < $totalPages) {
            $links[] = [
                'link' => $this->_pagingLink($forumSlug, min($i, $totalPages)),
                'label' => 'next'
            ];

            if ($currentPage + 1 < $totalPages) {
                $links[] = [
                    'link' => $this->_pagingLink($forumSlug, $totalPages),
                    'label' => 'last'
                ];
            }
        }

        return $links;
    }

    public function _pagingLink($forumSlug, $page = 1) {
        if ($page == 1) {
            return "/forum/$forumSlug";
        }
        return "/forum/$forumSlug/page-$page";
    }

}
