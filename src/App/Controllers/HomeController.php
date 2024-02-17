<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;

class HomeController
{
    public TemplateEngine $view;

    public function __construct()
    {
        $this->view = new TemplateEngine();
    }
    public function home()
    {
        dd($this->view);
        echo 'Home Page';
    }
}
