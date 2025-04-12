<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TopicModel;
use App\Models\ForumModel;

class Sitemap extends Controller
{
    public function generate()
    {
        $sitemapUrls = [];

        $host = 'https://forums.grocerycrud.com';

        $sitemapUrls[] = $host;

        $sitemapTypes = ['forums', 'topics'];

        $forumModel = new ForumModel();
        $topicModel = new TopicModel();

        foreach ($sitemapTypes as $type) {

            if ($type === 'forums') {


                $allForums = $forumModel->getAll();

                foreach ($allForums as $forum) {
                    $sitemapUrls[] = $host . '/forum/' . $forum['id'] . '-' . $forum['name_seo'];
                }
            }

            if ($type === 'topics') {
                $topicModel = new TopicModel();

                $allTopics = $topicModel->getAll();

                foreach ($allTopics as $topic) {
                    $sitemapUrls[] = $host . '/topic/' . $topic['tid'] . '-' . $topic['title_seo'];
                }
            }

        }

        $outputMessage = "\nSitemap generated for " . count($sitemapUrls) . " urls\n\n";

        $sitemapAsString = implode("\n", $sitemapUrls);

        file_put_contents(__DIR__ . '/../../public/sitemap.txt', $sitemapAsString);

        return $outputMessage;
    }
}
