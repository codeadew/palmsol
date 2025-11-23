<?php

function show($data)
{
	
	echo "<pre>";
	 print_r($data);
	echo"</pre>";
}


function show_error()
{
	
	
		if (isset($_SESSION['error']) && !empty($_SESSION['error'])	) {
			$session_error = $_SESSION['error']; // Assign session error to variable
			show($session_error); // Display the error
			unset($_SESSION['error']); // Clear the error after displaying
		}
	
}

 function generateUniqueID() 
    {
        $array = array_merge(range(0, 9), range('A', 'Z'), range('a', 'z'));
        $id = "";

        for ($i = 0; $i < 60; $i++) {
            $random = rand(0, count($array) - 1);
            $id .= $array[$random];
        }

        return $id;
    }

    function redirect($path)
{
    header('Location: ' . ROOT . trim($path, '/'));
    exit;
}

function set_flash($key, $message)
{
    $_SESSION[$key] = $message;
}

function is_ajax(): bool
{
    return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
           strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}
