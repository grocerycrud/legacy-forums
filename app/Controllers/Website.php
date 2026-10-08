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

        $this->_pageCache();

        $topicId = explode('-', $slug)[0];
        $page = $this->_pageNumber($pageSlug);

        $topicModel = new TopicModel();
        $topic = $topicModel->getTopicByTid($topicId);

        if ($topic === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $slug = $this->_canonicalSlug($topicId, $topic['title_seo'], $slug);
        $canonicalUrl = $this->_canonicalUrl('topic', $slug, $page);

        $postModel = new PostModel();
        $paginationData = $postModel->getPaginationLinksForPosts($topicId, $slug, $page);

        if ($paginationData === false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if ($pageSlug !== 'page-' . $page) {
            return $this->_redirectTo($canonicalUrl);
        }

        $forumModel = new ForumModel();
        $forum = $forumModel->getForumById($topic['forum_id']);

        $posts = $postModel->getPosts($topicId, $page);

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

        $this->_pageCache();

        $forumId = explode('-', $slug)[0];
        $page = $this->_pageNumber($pageSlug);

        $forumModel = new ForumModel();
        $forum = $forumModel->getForumById($forumId);

        if ($forum === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $slug = $this->_canonicalSlug($forumId, $forum['name_seo'], $slug);
        $canonicalUrl = $this->_canonicalUrl('forum', $slug, $page);

        $paginationData = $forumModel->getPaginationLinksForTopics($forumId, $slug, $page);

        if ($paginationData === false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if ($pageSlug !== 'page-' . $page) {
            return $this->_redirectTo($canonicalUrl);
        }

        $topics = $forumModel->getTopics($forumId, $page);

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

    /**
     * Reads the page number from a "page-N" URL part. Anything else, such as
     * "page-01", "page-0" or "garbage", gives the page it most likely meant, and
     * the caller 301s to the clean URL of that page.
     */
    private function _pageNumber($pageSlug)
    {
        if (preg_match('/^page-([0-9]+)$/', $pageSlug, $matches)) {
            return max(1, (int)$matches[1]);
        }

        return 1;
    }

    /**
     * A permanent redirect to one of our pages. base_url() rather than
     * redirect()->to('/...'), which would put index.php in the URL.
     */
    private function _redirectTo($path)
    {
        return redirect()->to(base_url($path), 301);
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
