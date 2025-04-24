<?php
class UserController
{
    public function index()
    {
        include __DIR__ . '/../Views/User/index.php';
    }
    public function register()
    {
       include './App/Views/User/register.php';
    }

}
