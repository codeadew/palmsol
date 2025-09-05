<?php

class Signup extends controller
{ 

	public function index()
	{
		$data['page_title'] = 'Signup';
		if ($_SERVER['REQUEST_METHOD'] = "POST") 
		{
			
			$user = $this->load_model('user');
			$user -> signup($_POST);
		}
		
		$this->view("aradi/signup", $data);
	}

}	