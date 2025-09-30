<?php

namespace App\Controllers;

Use App\Core\Controller;
use App\Core\Database;
Use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user = new User();
        $data = $user->getUserData();

        $this->view("home/index", $data);
        return;
    }

    public function contact()
    {
        $this->view("home/contact");
    }
}