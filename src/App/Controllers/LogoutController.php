<?php

namespace App\Controllers;

class LogoutController
{
    public function logout()
    {
        session_start();
        session_destroy();
    }
    public function displayHome()
    {
        header('Location:action.php?do=home');
    }
}
