<?php

namespace App\Controllers;

use App\Models\ForumModel;
use App\Models\PostModel;
use App\Models\TopicModel;

class Website extends BaseController
{
    public function index()
    {
        $this->_pageCache();

        return view('home-page');
    }

    public function topic($slug, $pageSlug = 'page-1')
    {
        if (!preg_match('/^[0-9]+-[0-9a-z-]+$/', $slug)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if (!preg_match('/^page-[0-9]+$/', $pageSlug)) {
            $pageSlug = 'page-1';
        }

        $this->_pageCache();

        $topicId = explode('-', $slug)[0];
        $page = explode('-', $pageSlug)[1];
        $canonicalUrl = $page === "1" ? 'topic/' . $slug : 'topic/' . $slug . '/' . $pageSlug;

        $topicModel = new TopicModel();
        $topic = $topicModel->getTopicByTid($topicId);

        $forumModel = new ForumModel();
        $forum = $forumModel->getForumById($topic['forum_id']);

        $postModel = new PostModel();
        $posts = $postModel->getPosts($topicId, $page);

        $paginationData = $postModel->getPaginationLinksForPosts($topicId, $slug, $page);

        if ($paginationData === false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('topic', [
            'topic' => $topic,
            'posts' => $posts,
            'paginationData' => $paginationData,
            'canonicalUrl' => $canonicalUrl,
            'forum' => $forum
        ]);
    }

    public function forum($slug, $pageSlug = 'page-1') {

        if (!preg_match('/^[0-9]+-[0-9a-z-]+$/', $slug)) {
            // throw Codeigniter 404 error
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if (!preg_match('/^page-[0-9]+$/', $pageSlug)) {
            $pageSlug = 'page-1';
        }

        $this->_pageCache();

        $forumId = explode('-', $slug)[0];
        $page = explode('-', $pageSlug)[1];
        $canonicalUrl = $page === "1" ? 'forum/' . $slug : 'forum/' . $slug . '/' . $pageSlug;

        $forumModel = new ForumModel();
        $forum = $forumModel->getForumById($forumId);
        $topics = $forumModel->getTopics($forumId, $page);

        $paginationData = $forumModel->getPaginationLinksForTopics($forumId, $slug, $page);

        if ($paginationData === false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('forum', [
            'forum' => $forum,
            'topics' => $topics,
            'paginationData' => $paginationData,
            'canonicalUrl' => $canonicalUrl
        ]);
    }

    private function _pageCache() {
        if ($_ENV['WEBPAGE_CACHE']) {
            $this->cachePage(2592000); // 30 days
        }
    }
}
