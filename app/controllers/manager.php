<?php

class Manager extends Controller
{ 
    public function index()
    {       
       
         $user = $this->load_model("User");
         $user->checkLogin2(true, ["super_admin"]);

        // Now pass the logged-in user to the views
        $this->view("palmsol_blog/topbar", ['user' => $user]); 
        $this->view("palmsol_blog/leftsidebar", ['user' => $user]); 
        $this->view("palmsol_blog/maincontent", ['user' => $user]);
        $this->view("palmsol_blog/footer", ['user' => $user]);
    }    
}









