<?php

class Signup extends Controller
{ 

    public function index()
    {
        // Provide a default array so Controller->view() extract() receives an array
        $data = [
            'page_title' => 'Signup | palmsol Technology',
            'meta_description' => 'Create an account',
            'meta_keywords' => 'signup, register',
            'schema' => []
        ];

        $message = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
             $message = [];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $user = $this-> load_model("User");
                $message = $user->register($_POST);
            }
        }

        $this->view("palmsol/signup",['message' => $message]);
    }


    

}








