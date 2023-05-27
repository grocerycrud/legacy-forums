<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumModel extends Model
{
    protected $table = 'fm_forums';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id', 'topics', 'posts', 'last_post', 'last_poster_id', 'last_poster_name',
        'name', 'description', 'position', 'use_ibc', 'use_html', 'password',
        'password_override', 'last_title', 'last_id', 'sort_key', 'sort_order',
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

    public function getTopics($forumId, $page = 1)
    {
        $perPage = 30;
        $offset = ($page - 1) * $perPage;

        return $this->db->table('fm_topics')
            ->where('forum_id', $forumId)
            ->orderBy('pinned', 'DESC')
            ->orderBy('last_post', 'DESC')
            ->limit($perPage, $offset)
            ->get()
            ->getResult();
    }

}
