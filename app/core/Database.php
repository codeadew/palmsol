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

   

    // READ: Get records with optional conditions
    public function get($table, $conditions = [], $fields = "*")
    {
        $sql = "SELECT $fields FROM $table";
        if (!empty($conditions)) {
            $where = [];
            foreach ($conditions as $key => $value) {
                $where[] = "$key = :$key";
            }
            $sql .= " WHERE " . implode(" AND ", $where);
        }
        return $this->read($sql, $conditions);
    }

    // UPDATE: Update records with conditions
    public function update($table, $data, $conditions)
    {
        $set = [];
        foreach ($data as $key => $value) {
            $set[] = "$key = :set_$key";
        }
        $where = [];
        foreach ($conditions as $key => $value) {
            $where[] = "$key = :where_$key";
        }
        $sql = "UPDATE $table SET " . implode(", ", $set) . " WHERE " . implode(" AND ", $where);

        // Merge data arrays with prefixes to avoid conflicts
        $params = [];
        foreach ($data as $key => $value) {
            $params["set_$key"] = $value;
        }
        foreach ($conditions as $key => $value) {
            $params["where_$key"] = $value;
        }

        return $this->write($sql, $params);
    }

    // DELETE: Delete records with conditions
    public function delete($table, $conditions)
    {
        $where = [];
        foreach ($conditions as $key => $value) {
            $where[] = "$key = :$key";
        }
        $sql = "DELETE FROM $table WHERE " . implode(" AND ", $where);
        return $this->write($sql, $conditions);
    }
}






