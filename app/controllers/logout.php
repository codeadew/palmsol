<?php

class Logout extends Controller
{ 

    public function index()
    {
        $data['page_title'] = 'Logout';
        if ($_SERVER['REQUEST_METHOD'] = "POST") 
        {
            
            $user = $this->load_model('user');
            $user -> logout();
        }
      
    }

}