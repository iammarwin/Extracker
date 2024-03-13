<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, UserService};

class AuthController
{
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validatorService,
        private UserService $userServicer
    ) {
    }

    public function registerView()
    {
        echo $this->view->render("register.php");
    }

    public function register()
    {
        $this->validatorService->validateRegister($_POST);
        $this->userServicer->isEmailTaken($_POST['email']);
        $this->userServicer->create($_POST);

        redirectTo('/');
    }

    public function loginView()
    {
        echo $this->view->render("login.php");
    }

    public function login()
    {
        $this->validatorService->validateLogin($_POST);
        $this->userServicer->login($_POST);
        redirectTo('/');
    }

    public function logout()
    {
        $this->userServicer->logout();
        redirectTo('/login');
    }
}
