<?php

namespace App\Controllers;

use App\Models\ForumModel;
use App\Models\PostModel;
use App\Models\TopicModel;

class Website extends BaseController
{
    public function index()
    {
        return view('home-page');
    }

    public function topic($slug)
    {
        if (!preg_match('/^[0-9]+-[0-9a-z-]+$/', $slug)) {
            // throw Codeigniter 404 error
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $topicId = explode('-', $slug)[0];

        $topicModel = new TopicModel();
        $topic = $topicModel->getTopicByTid($topicId);

        $postModel = new PostModel();
        $posts = $postModel->getPosts($topicId);

        return view('topic', [
            'topic' => $topic,
            'posts' => $posts
        ]);
    }

    public function forum($slug) {

        if (!preg_match('/^[0-9]+-[0-9a-z-]+$/', $slug)) {
            // throw Codeigniter 404 error
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $forumId = explode('-', $slug)[0];

        $forumModel = new ForumModel();
        $forum = $forumModel->getForumById($forumId);
        $topics = $forumModel->getTopics($forumId);

        $paginationData = $forumModel->getPaginationLinksForTopics($forumId);

        return view('forum', [
            'forum' => $forum,
            'topics' => $topics,
            'paginationData' => $paginationData
        ]);
    }
}
