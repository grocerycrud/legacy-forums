<?php

namespace App\Models;

use CodeIgniter\Model;

class TopicModel extends Model
{
    protected $table = 'fm_topics';
    protected $primaryKey = 'tid';
    protected $allowedFields = [
        'title',
        'description',
        'state',
        'posts',
        'starter_id',
        'start_date',
        'last_poster_id',
        'last_post',
        'icon_id',
        'starter_name',
        'last_poster_name',
        'poll_state',
        'last_vote',
        'views',
        'forum_id',
        'approved',
        'author_mode',
        'pinned',
        'moved_to',
        'topic_hasattach',
        'topic_firstpost',
        'topic_queuedposts',
        'topic_open_time',
        'topic_close_time',
        'topic_rating_total',
        'topic_rating_hits',
        'title_seo',
        'seo_last_name',
        'seo_first_name',
        'topic_deleted_posts',
        'tdelete_time',
        'moved_on',
        'last_real_post',
        'topic_archive_status',
        'topic_answered_pid'
    ];

    public function getTopicByTid($id)
    {
        $output =
            $this->where('tid', $id)
                ->join('fm_profile_portal', 'fm_profile_portal.pp_member_id = fm_topics.starter_id')
                ->first();
        if ($output) {
            $output['start_date_raw'] = date('Y-m-d', $output['start_date']) . "T" . date('H:i:s', $output['start_date']) . "+00:00";
            $output['start_date'] = date('d F Y - H:i A', $output['start_date']);
        }

        return $output;
    }
}
