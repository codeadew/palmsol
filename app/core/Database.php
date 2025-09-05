<?php

class Database 
{
 public static $con;

    public function __construct()
    {
    	
        try
        {
            $string = DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME; 
			self::$con = new PDO($string, DB_USER, DB_PASS);

            // Set error mode to exception (best practice)
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e)  
        {
            die($e->getMessage()); //error handling
        }
    }

    public static function getInstance()
    {
        if (self::$con) 
        {
            return new self();
        }
        $a = new self(); // Create instance to initialize connection
        return new self();
    }


    public function lastInsertId() {
        return self::$con->lastInsertId(); 
    }

	   public function read($query, $data = [])
	{
	    $stm = self::$con->prepare($query);
	    $result = $stm->execute($data);

	    if ($result) 
	    {
	        $data = $stm->fetchAll(PDO::FETCH_OBJ);
            if (is_array($data) && count($data) > 0) {
                return $data;
            }
	       
	    }
	    
	    return false;
	}

       public function write($query, $data = [])
    {
        try {
            $stm = self::$con->prepare($query);

            // Execute with data binding
            $result = $stm->execute($data);

            return $result;
        } catch (PDOException $e) {
            die("Database error: " . $e->getMessage()); // Debugging message
        }
    }
}    


   



