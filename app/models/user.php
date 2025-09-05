<?php 

class User extends Controller
{
    public $error = "";

    private function generateUniqueID() 
    {
        $array = array_merge(range(0, 9), range('A', 'Z'), range('a', 'z'));
        $id = "";

        for ($i = 0; $i < 60; $i++) {
            $random = rand(0, count($array) - 1);
            $id .= $array[$random];
        }

        return $id;
    }

    public function signup() 
    {
    
        $db = Database::getInstance();

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
                $data = 
            [
                'first_name'  => isset($_POST['firstName']) ? trim($_POST['firstName']) : '',
                'last_name'   => isset($_POST['lastName']) ? trim($_POST['lastName']) : '',
                'email'       => isset($_POST['email']) ? trim($_POST['email']) : '',
                'password'    => isset($_POST['password']) ? trim($_POST['password']) : '',
                'user_type'   => 'customer',
                'signedon'    => date('Y-m-d H:i:s'),
                'url_address' => $this->generateUniqueID()
            ];

            $password2 = isset($_POST['confirmPassword']) ? trim($_POST['confirmPassword']) : '';
    // Ensure all expected form inputs exist to prevent undefined index errors
            // Validate email
            if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $this->error .= "Please enter a valid email <br>";
            } else {
                // Check if email already exists
                $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
                $arr = ['email' => $data['email']];
                $checkEmailExist = $db->read($query, $arr);
                if (is_array($checkEmailExist)) {
                    $this->error .= "Email already exists. Please use a different email.<br>";
                }
            }

            // Validate first name (letters only)
            if (empty($data['first_name']) || !preg_match("/^[A-Za-z]+$/", $data['first_name'])) {
                $this->error .= "Please enter a valid first name <br>";
            }

            // Validate last name (letters only)
            if (empty($data['last_name']) || !preg_match("/^[A-Za-z]+$/", $data['last_name'])) {
                $this->error .= "Please enter a valid last name <br>";
            }

            // Validate password (at least 8 characters, 1 uppercase, 1 lowercase, 1 special character)
            if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/", $data['password'])) {
                $this->error .= "Password must be at least 8 characters, including 1 uppercase, 1 lowercase, and 1 special character.<br>";
            }

            // Check if passwords match
            if ($data['password'] !== $password2) {
                $this->error .= "Passwords do not match <br>";
            }

            // If no errors, proceed with saving
            if (empty($this->error)) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                $query = "INSERT INTO users (first_name, last_name, email, passwords, user_type, signedon, url_address) 
                          VALUES (:first_name, :last_name, :email, :password, :user_type, :signedon, :url_address)";
                
                $register_user = $db->write($query, $data);

                if ($register_user) {
                    header("Location: " . ROOT . "login");
                    exit;
                }
            } else {

                $_SESSION['error'] = $this->error; 
            }       
        }
        return;
        
    }


     

        public function login() 
    {
        $db = Database::getInstance();

        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            return;
        }



        $this->error = ""; // Initialize error variable

        // Ensure all expected form inputs exist to prevent undefined index errors
        $data = [
            'email'    => isset($_POST['email']) ? trim($_POST['email']) : '',
            'password' => isset($_POST['password']) ? trim($_POST['password']) : '',
        ];

        // Validate email
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->error .= "Please enter a valid email <br>";
        } 

        // Validate password (at least 8 characters, 1 uppercase, 1 lowercase, 1 special character)
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/", $data['password'])) {
            $this->error .= "Password must be at least 8 characters, including 1 uppercase, 1 lowercase, and 1 special character.<br>";
        }

        // If no errors, proceed with login check
        if (empty($this->error)) 
        {
            $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
            $result = $db->read($query, ['email' => $data['email']]);

            if (is_array($result) && !empty($result)) {
                $user = $result[0];

                // Verify hashed password
                if (password_verify($data['password'], $user->passwords)) {
                    $_SESSION['user_address'] = $user->url_address;
                    header("Location: " . ROOT . "home");
                    exit;
                } else {
                    $this->error .= "Invalid email or password. <br>";
                }
            } else {
                $this->error .= "User not found. <br>";
            }
        }

        $_SESSION['error'] = $this->error;
    }

    
 
    public function checkLogin($redirect = false, $allow = array())
    {
        $db = Database::getInstance();
    
        if (count($allow) > 0)
        {
            $arr['url_address'] = $_SESSION['user_address'] ?? null;
    
            if ($arr['url_address']) 
            {
                $query = "SELECT * FROM users WHERE url_address = :url_address LIMIT 1";
                $result = $db->read($query, $arr);
    
                if (is_array($result) && !empty($result)) 
                {
                    $result = $result[0];
    
                    if (in_array($result->user_type, $allow)) 
                    {
                        return $result;
                    } 
                    else 
                    {
                        if ($redirect) {
                            header("Location: " . ROOT . "login");
                            exit;
                        }
                    }
                } 
                else 
                {
                    if ($redirect) 
                    {
                        header("Location: " . ROOT . "login");
                        exit;
                    }
                }
            } 
            else 
            {
                if ($redirect) 
                {
                    header("Location: " . ROOT . "login");
                    exit;
                }
            }
        } 
        else 
        {
            if (isset($_SESSION['user_address'])) 
            {
                $arr = [];
                $arr['url_address'] = $_SESSION['user_address'];
    
                $query = "SELECT url_address, user_type FROM users WHERE url_address = :url_address LIMIT 1";
                $result = $db->read($query, $arr);
    
                if (is_array($result) && !empty($result)) 
                {
                    return $result[0];
                }
            }
    
            if ($redirect) {
                header("Location: " . ROOT . "login");
                exit;
            }
        }
    
        return false;
    }
    
    




     public function logout()
    {
        if (isset($_SESSION['user_address'])) 
        {
            
            unset($_SESSION['user_address']);
        }
        header("Location: " . ROOT . "home");
        die;
     }


        
}








