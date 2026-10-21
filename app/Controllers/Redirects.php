<?php

namespace App\Controllers;

class Redirects extends BaseController
{
    public function redirect_to_home_page() {
        // 301 redirect to the home page (base_url() avoids the index.php in to('/'))
        return redirect()->to(base_url(), 301);
    }
}