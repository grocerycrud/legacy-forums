<?php

namespace App\Controllers;

use App\Models\TopicModel;

class Website extends BaseController
{
    public function index()
    {
        return view('home-page');
    }

    public function topic($slug)
    {
        // the $slug should be in the format of "topic-id-title" with starting of numbers and only english characters lower case and dashes

        if (!preg_match('/^[0-9]+-[0-9a-z-]+$/', $slug)) {
            // throw Codeigniter 404 error
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $topicId = explode('-', $slug)[0];

        $topicModel = new TopicModel();
        $topic = $topicModel->getTopicByTid($topicId);

        return view('topic', [
            'topic' => $topic
        ]);
    }
}
