<?php

class Logout extends Controller
{
    public function index()
    {
        // Start session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        //  Remove all session variables related to user
        if (isset($_SESSION['USER'])) {
            unset($_SESSION['USER']);
        }

        //  Destroy session completely
        session_unset();
        session_destroy();

        //  Clear "remember me" cookie if it exists
        if (isset($_COOKIE['remember_token'])) {
            setcookie('remember_token', '', time() - 3600, "/", "", true, true);
        }

        //  Redirect to login or home page
        header("Location: " . ROOT . "home");
        exit;
    }
}
