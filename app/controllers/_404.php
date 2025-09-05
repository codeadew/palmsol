<?php

class _404 extends Controller
{ 

		public function index()
    {
        $data['page_title'] = '404';

        $this->view("aradi/404", $data);
    }

}