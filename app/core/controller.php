<?php

class Controller
{

		public function view($path, $data = [])
	{
	    $viewpath = $viewpath = "app/view/" . $path . ".php";
	    if (file_exists($viewpath))
	    {
	        extract($data); // Extract array keys as variables
	        require_once $viewpath; // Use require_once to ensure the file is included only once
	    }
	}


    public function load_model($model)
	{
	    $modelPath = "app/models/" . strtolower($model) . ".php";

	    if (file_exists($modelPath)) {
	        require_once $modelPath;

	        // Instantiate the correct model class dynamically
	        if (class_exists($model)) {
	            return new $model();
	        } else {
	            die("Error: Class not found");
	        }
	    }
	    return false;
	}
}    


