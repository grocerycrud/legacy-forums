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
        $page = (int)explode('-', $pageSlug)[1];

        $topicModel = new TopicModel();
        $topic = $topicModel->getTopicByTid($topicId);

        if ($topic === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $slug = $this->_canonicalSlug($topicId, $topic['title_seo'], $slug);
        $canonicalUrl = $this->_canonicalUrl('topic', $slug, $page);

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
            'metaDescription' => $postModel->getTopicExcerpt($topicId) ?: PostModel::toPlainText($topic['title']),
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
        $page = (int)explode('-', $pageSlug)[1];

        $forumModel = new ForumModel();
        $forum = $forumModel->getForumById($forumId);

        if ($forum === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $slug = $this->_canonicalSlug($forumId, $forum['name_seo'], $slug);
        $canonicalUrl = $this->_canonicalUrl('forum', $slug, $page);

        $topics = $forumModel->getTopics($forumId, $page);

        $paginationData = $forumModel->getPaginationLinksForTopics($forumId, $slug, $page);

        if ($paginationData === false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('forum', [
            'forum' => $forum,
            'topics' => $topics,
            'paginationData' => $paginationData,
            'canonicalUrl' => $canonicalUrl,
            'metaDescription' => $forumModel->getDescriptionText($forum)
        ]);
    }

    /**
     * Only the number in a slug is used for the lookup, so /topic/1318-anything
     * loads the same page as the real URL. Build links from the slug stored in
     * the database instead, so every copy points at one URL. The stored slug is
     * empty or percent-encoded for a few old records; it would not match our
     * route, so those keep the slug that was requested.
     */
    private function _canonicalSlug($id, $storedSlug, $requestedSlug)
    {
        $storedSlug = (string)$storedSlug;

        if (!preg_match('/^[0-9a-z-]+$/', $storedSlug)) {
            return $requestedSlug;
        }

        return (int)$id . '-' . $storedSlug;
    }

    private function _canonicalUrl($type, $slug, $page)
    {
        return $page === 1 ? $type . '/' . $slug : $type . '/' . $slug . '/page-' . $page;
    }

    private function _pageCache() {
        if ($_ENV['WEBPAGE_CACHE']) {
            $this->cachePage(2592000); // 30 days
        }
    }
}
