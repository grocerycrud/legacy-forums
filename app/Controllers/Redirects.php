<?php

namespace App\Controllers;

class Redirects extends BaseController
{
    public function redirect_to_home_page() {
        // 301 redirect to /
        return redirect()->to('/',  301);
    }
}