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
        // replace [code] tags with <pre> tags
        $text = preg_replace('/\[code\](.*?)\[\/code\]/is', '<pre class="prettyprint prettyprinted">$1</pre>', $text);

        // replace [url] tags with <a> tags
        $text = preg_replace('/\[url="(.*?)"\](.*?)\[\/url\]/is', '<strong>$2</strong>', $text);

        return $text;
    }

    public function getPosts($topicId, $page = 1)
    {
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
}
