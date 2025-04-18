<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TopicModel;
use App\Models\ForumModel;
use App\Models\PostModel;

class Sitemap extends Controller
{
    public function generate()
    {
        $sitemapUrls = [];

        $host = 'https://forums.grocerycrud.com';

        $sitemapUrls[] = $host . "/";

        $sitemapTypes = ['forums', 'topics'];

        $forumModel = new ForumModel();
        $topicModel = new TopicModel();
        $postModel = new PostModel();

        foreach ($sitemapTypes as $type) {

            if ($type === 'forums') {
                $perPage = 30;

                $allForums = $forumModel->getAll();

                foreach ($allForums as $forum) {
                    $sitemapUrls[] = $host . '/forum/' . $forum['id'] . '-' . $forum['name_seo'];

                    $totalTopics = $topicModel->getTotalTopicsByForumId($forum['id']);

                    $pages = $totalTopics > 0 ? ceil($totalTopics / $perPage) : 1;
                    if ($pages > 1) {
                        for ($i = 2; $i <= $pages; $i++) {
                            $sitemapUrls[] = $host . '/forum/' . $forum['id'] . '-' . $forum['name_seo'] . '/page-' . $i;
                        }
                    }
                }
            }

            if ($type === 'topics') {
                $perPage = 20;
                $topicModel = new TopicModel();

                $allTopics = $topicModel->getAll();

                foreach ($allTopics as $topic) {

                    // Check if we have any % character in the title. Those are now causing a 404 page and
                    // hence, I am not adding it to the sitemap at the moment
                    if (strpos($topic['title_seo'], '%') === false) {
                        $sitemapUrls[] = $host . '/topic/' . $topic['tid'] . '-' . $topic['title_seo'];
                    } else {
                        // echo $host . '/topic/' . $topic['tid'] . '-' . $topic['title_seo']. "\n";
                    }

                    $pages = 1;
                    if ($topic['posts'] > 10) {
                        // Since in the database we don't have the real post numbers, whenever we have more than 1 post
                        // we are querying the database to get the real number of posts
                        $totalPosts = $postModel->getTotalPosts($topic['tid']);
                        $pages = ceil($totalPosts / $perPage);
                    }

                    if ($pages > 1) {
                        for ($i = 2; $i <= $pages; $i++) {
                            $sitemapUrls[] = $host . '/topic/' . $topic['tid'] . '-' . $topic['title_seo'] . '/page-' . $i;
                        }
                    }
                }
            }

        }

        $outputMessage = "\nSitemap generated for " . count($sitemapUrls) . " urls\n\n";

        $sitemapAsString = implode("\n", $sitemapUrls);

        file_put_contents(__DIR__ . '/../../public/sitemap.txt', $sitemapAsString);

        return $outputMessage;
    }
}
