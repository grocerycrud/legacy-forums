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

    public function getPosts($topicId, $page = 1)
    {
        $perPage = 20;
        $offset = ($page - 1) * $perPage;

        return $this->db->table('fm_posts')
            ->where('topic_id', $topicId)
            ->orderBy('post_date', 'ASC')
            ->join('fm_profile_portal', 'fm_profile_portal.pp_member_id = fm_posts.author_id')
            ->limit($perPage, $offset)
            ->get()
            ->getResult();
    }
}
