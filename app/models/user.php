<?php 

class User extends Controller
{
    protected $db;
    public $error = "";

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function generateUniqueID()
    {
        // stronger random id (120 hex chars ~ 60 bytes)
        try {
            return bin2hex(random_bytes(60));
        } catch (Exception $e) {
            // fallback to previous approach
            $array = array_merge(range(0, 9), range('A', 'Z'), range('a', 'z'));
            $id = "";
            for ($i = 0; $i < 60; $i++) {
                $random = rand(0, count($array) - 1);
                $id .= $array[$random];
            }
            return $id;
        }
    }

    // make validate public and use the declared $error property


        public function validateSignup($data)
        {
            $firstName = isset($data['firstName']) ? trim($data['firstName']) : '';
            $lastName = isset($data['lastName']) ? trim($data['lastName']) : '';
            $email = isset($data['email']) ? trim($data['email']) : '';
            $password = isset($data['password']) ? trim($data['password']) : '';
            $confirmPassword = isset($data['confirmPassword']) ? trim($data['confirmPassword']) : '';

            // Validate first name
            if (empty($firstName) || !preg_match("/^[a-zA-Z'-]+$/", $firstName)) {
                $this->error .= "Please enter a valid first name.<br>";
            }

            // Validate last name
            if (empty($lastName) || !preg_match("/^[a-zA-Z'-]+$/", $lastName)) {
                $this->error .= "Please enter a valid last name.<br>";
            }

            // Validate email
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error .= "Please enter a valid email.<br>";
            } else {
                $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
                $result = $this->db->read($query, ['email' => $email]);
                if (is_array($result) && !empty($result)) {
                    $this->error .= "Email is already registered.<br>";
                }
            }

            // Validate password
            if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/", $password)) {
                $this->error .= "Password must contain at least 8 characters, one uppercase, one lowercase, and one special character.<br>";
            }

            // Confirm password
            if ($password !== $confirmPassword) {
                $this->error .= "Passwords do not match.<br>";
            }
        }


        public function register($data)
        {
           
            $this->validateSignup($data);

            if ($this->error != "") {
                return ['status' => 'error', 'message' => $this->error];
            }

            // Clean and prepare data
            $firstName = htmlspecialchars(trim($data['firstName']));
            $lastName = htmlspecialchars(trim($data['lastName']));
            $email = htmlspecialchars(trim($data['email']));
            $password = password_hash($data['password'], PASSWORD_DEFAULT);
            $user_type = isset($data['user_type']) ? trim($data['user_type']) : 'user';
            $signedon = date("Y-m-d H:i:s");
            $url_address = strtolower($firstName . "." . $lastName . "." . rand(1000, 9999));
            $created_at = date("Y-m-d H:i:s");
            $updated_at = $created_at;

             
            // Database query
            $query = "INSERT INTO users 
                        (first_name, last_name, email, passwords, user_type, signedon, url_address, created_at, updated_at)
                    VALUES 
                        (:first_name, :last_name, :email, :passwords, :user_type, :signedon, :url_address, :created_at, :updated_at)";

            $arr = [
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'passwords' => $password,
                'user_type' => $user_type,
                'signedon' => $signedon,
                'url_address' => $url_address,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ];

            $result = $this->db->write($query, $arr);

            if ($result) {
                return [
                    'status' => 'success',
                    'message' => 'Account created successfully! You can now log in.'
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'An unexpected error occurred. Please try again.'
                ];
            }
        }


      

    
 
   
    
    


################LOGIN #####################

public function validateLogin($data)
{
    $errors = [];

    $email = trim($data['email'] ?? '');
    $password = trim($data['password'] ?? '');

    if (empty($email)) {
        $errors[] = "Email field is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (empty($password)) {
        $errors[] = "Password field is required.";
    }

    return $errors;
}

public function loginUser($email, $password)
{
    $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $result = $this->db->read($query, ['email' => $email]);

    if (is_array($result) && count($result) > 0) {
            $user = $result[0]; // stdClass object

            if (password_verify($password, $user->passwords)) {
                return $user; // valid credentials
            }
        }
         return false; //  invalid
}


################cHECKLOGIN #####################
  public function checkLogin2($redirect = false, $allow = [])
{
    $db = Database::getInstance();

    // 1️⃣ Check Session
    if (isset($_SESSION['URL_ADDRESS'])) {
        $result = $db->read(
            "SELECT * FROM users WHERE url_address = :url_address LIMIT 1",
            ['url_address' => $_SESSION['URL_ADDRESS']]
        );

        if ($result) {
            $user = $result[0];

            if (!empty($allow) && !in_array($user->user_type, $allow)) {
                if ($redirect) {
                    header("Location: " . ROOT . "authuser/login");
                    exit;
                }
                return false;
            }

            return $user;
        }
    }

    // 2️⃣ Check Remember Token
    if (isset($_COOKIE['remember_token'])) {

        $result = $db->read(
            "SELECT * FROM users WHERE remember_token = :token LIMIT 1",
            ['token' => $_COOKIE['remember_token']]
        );

        if ($result) {
            $user = $result[0];

            // Rebuild session
            $_SESSION['USER_ID']     = $user->id;
            $_SESSION['USER_EMAIL']  = $user->email;
            $_SESSION['USER_NAME']   = $user->first_name . ' ' . $user->last_name;
            $_SESSION['USER_TYPE']   = $user->user_type;
            $_SESSION['URL_ADDRESS'] = $user->url_address;
            $_SESSION['logged_in']   = true;

            return $user;
        }
    }

    // 3️⃣ Redirect if required
    if ($redirect) {
        header("Location: " . ROOT . "authuser/login");
        exit;
    }

    return false;
}


################LOGOUT #####################
        public function logout2()
    {
        $db = Database::getInstance();
        session_start();

        // Check if user is logged in
        if (isset($_SESSION['user_id'])) {
            // Remove remember token from DB (optional but secure)
            $db->write("UPDATE users SET remember_token = NULL WHERE id = :id", [
                'id' => $_SESSION['user_id']
            ]);
        }

        // 1️ Clear all session data
        $_SESSION = [];

        // 2️ Destroy session
        if (session_id() !== "" || isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 3600, '/');
        }
        session_destroy();

        // 3️ Clear "Remember Me" cookie
        if (isset($_COOKIE['remember_token'])) {
            setcookie('remember_token', '', time() - 3600, "/", "", true, true);
        }

        // 4️ Redirect to login page
        header("Location: " . ROOT . "login");
        exit;
    }


################RESET PASSWORD #####################
        public function resetPassword()
    {
        $db = Database::getInstance();
        $this->error = "";

        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            return;
        }

        $token = isset($_POST['token']) ? trim($_POST['token']) : '';
        $newPassword = isset($_POST['password']) ? trim($_POST['password']) : '';

        if (empty($token) || empty($newPassword)) {
            $this->error .= "Invalid request.<br>";
        } else {
            $query = "SELECT * FROM users WHERE reset_token = :token AND reset_expires > NOW() LIMIT 1";
            $result = $db->read($query, ['token' => $token]);

            if (is_array($result) && !empty($result)) {
                $user = $result[0];

                $hashed = password_hash($newPassword, PASSWORD_DEFAULT);

                $db->write(
                    "UPDATE users SET passwords = :password, reset_token = NULL, reset_expires = NULL WHERE id = :id",
                    ['password' => $hashed, 'id' => $user->id]
                );

                $_SESSION['message'] = "Password successfully updated. Please login.";
                header("Location: " . ROOT . "login");
                exit;
            } else {
                $this->error .= "Invalid or expired token.<br>";
            }
        }

        $_SESSION['error'] = $this->error;
    }

################FORGET PASSWORD ###############
        public function forgotPassword()
    {
        $db = Database::getInstance();
        $this->error = "";

        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            return;
        }

        $email = isset($_POST['email']) ? trim($_POST['email']) : '';

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error .= "Please enter a valid email.<br>";
        } else {
            $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
            $result = $db->read($query, ['email' => $email]);

            if (is_array($result) && !empty($result)) {
                $user = $result[0];
                $token = bin2hex(random_bytes(32));
                $expires = date("Y-m-d H:i:s", strtotime("+1 hour"));

                $db->write(
                    "UPDATE users SET reset_token = :token, reset_expires = :expires WHERE id = :id",
                    ['token' => $token, 'expires' => $expires, 'id' => $user->id]
                );

                $resetLink = ROOT . "reset-password?token=" . $token;

                // Send Email (pseudo-code)
                mail($email, "Password Reset Request", 
                    "Click this link to reset your password: " . $resetLink,
                    "From: no-reply@" . $_SERVER['SERVER_NAME']
                );

                $_SESSION['message'] = "Password reset link sent to your email.";
            } else {
                $this->error .= "No account found with that email.<br>";
            }
        }

        $_SESSION['error'] = $this->error;
    }

################AUTOLOGIN #####################
    public static function autoLogin()
{
    session_start();
    $db = Database::getInstance();

    // If user already logged in, skip
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        return;
    }

    // If remember token exists, try to log in
    if (isset($_COOKIE['remember_token'])) {
        $token = $_COOKIE['remember_token'];

        $query = "SELECT * FROM users WHERE remember_token = :token LIMIT 1";
        $result = $db->read($query, ['token' => $token]);

        if (is_array($result) && !empty($result)) {
            $user = $result[0];

            // Recreate session
            session_regenerate_id(true);
            $_SESSION['user_id']       = $user->id;
            $_SESSION['user_email']    = $user->email;
            $_SESSION['user_role']     = $user->role;
            $_SESSION['user_address']  = $user->url_address;
            $_SESSION['logged_in']     = true;
        }
    }
}






        
}




