<?php

class Authuser extends Controller
{
    /**
     * Handle user registration
     */
    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Return JSON for API-style requests
            if (ob_get_level() > 0) ob_end_clean();
            header('Content-Type: application/json; charset=utf-8');

            try {
                // Handle JSON or Form POST
                $input = file_get_contents('php://input');
                $data = [];
                if (!empty($input) && strpos($_SERVER['CONTENT_TYPE'] ?? '', 'application/json') !== false) {
                    $data = json_decode($input, true);
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        throw new Exception("Invalid JSON format.");
                    }
                } else {
                    $data = $_POST;
                }

                $userModel = $this->load_model("User");
                $result = $userModel->register($data);

                echo json_encode($result);
                exit;
            } catch (Throwable $e) {
                http_response_code(400);
                echo json_encode([
                    'status' => 'error',
                    'message' => $e->getMessage()
                ]);
                exit;
            }
        }

        // GET request → show view
        header('Content-Type: text/html; charset=utf-8');
         $data = []; // optional data for the view
        $this->view("palmsol/signup", $data);
    }

    /**
     * Handle user login
        */
        public function login()
    {
        // Handle AJAX POST submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (ob_get_level() > 0) ob_end_clean();
            header('Content-Type: application/json; charset=utf-8');

            try {
                // Sanitize and collect data
                $email = trim($_POST['email'] ?? '');
                $password = trim($_POST['password'] ?? '');

                // Load model
                $userModel = $this->load_model('User');

                // Validate form input
                $errors = $userModel->validateLogin([
                    'email' => $email,
                    'password' => $password
                ]);

                if (!empty($errors)) {
                    echo json_encode([
                        'success' => false,
                        'message' => implode('<br>', $errors)
                    ]);
                    exit;
                }

                // Authenticate
                $user = $userModel->loginUser($email, $password);
                if (!$user) {
                    echo json_encode([
                        'success' => false,
                        'message' => 'Invalid email or password.'
                    ]);
                    exit;
                }

                //  Set user session (session already started globally)
                $_SESSION['USER_ID'] = $user->id;
                $_SESSION['USER_TYPE'] = $user->user_type;
                $_SESSION['URL_ADDRESS'] = $user->url_address;
                $_SESSION['USER_NAME'] = $user->first_name . ' ' . $user->last_name;


                echo json_encode([
                    'success' => true,
                    'message' => 'Login successful now Redirecting...',
                    'redirect' => ROOT . 'home'
                ]);
                exit;

            } catch (Throwable $e) {
                http_response_code(400);
                echo json_encode([
                    'success' => false,
                    'message' => 'Error: ' . $e->getMessage()
                ]);
                exit;
            }
        }

        // ✅ Handle GET (normal page view)
        header('Content-Type: text/html; charset=utf-8');
        $data = [];
        $this->view("palmsol/login", $data);
        $this->view("palmsol/footer", $data);
    }


       



    /**
     * Handle forgot password (send reset link)
     */
    public function forgotPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (ob_get_level() > 0) ob_end_clean();
            header('Content-Type: application/json; charset=utf-8');

            try {
                $input = file_get_contents('php://input');
                $data = [];
                if (!empty($input) && strpos($_SERVER['CONTENT_TYPE'] ?? '', 'application/json') !== false) {
                    $data = json_decode($input, true);
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        throw new Exception("Invalid JSON format.");
                    }
                } else {
                    $data = $_POST;
                }

                $userModel = $this->load_model("User");
                $userModel->forgotPassword($data);

                echo json_encode(['status' => 'success', 'message' => 'Password reset link sent to your email.']);
                exit;
            } catch (Throwable $e) {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
                exit;
            }
        }

        header('Content-Type: text/html; charset=utf-8');
        $this->view("auth/forgot-password", []);
    }

    /**
     * Handle reset password form submission
     */
    public function resetPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (ob_get_level() > 0) ob_end_clean();
            header('Content-Type: application/json; charset=utf-8');

            try {
                $input = file_get_contents('php://input');
                $data = [];
                if (!empty($input) && strpos($_SERVER['CONTENT_TYPE'] ?? '', 'application/json') !== false) {
                    $data = json_decode($input, true);
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        throw new Exception("Invalid JSON format.");
                    }
                } else {
                    $data = $_POST;
                }

                $userModel = $this->load_model("User");
                $userModel->resetPassword($data);

                echo json_encode(['status' => 'success', 'message' => 'Password reset successful.']);
                exit;
            } catch (Throwable $e) {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
                exit;
            }
        }

        header('Content-Type: text/html; charset=utf-8');
        $this->view("auth/reset-password", []);
    }

    /**
     * Handle email verification
     */
    public function verifyEmail()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (ob_get_level() > 0) ob_end_clean();
            header('Content-Type: application/json; charset=utf-8');

            try {
                $input = file_get_contents('php://input');
                $data = [];
                if (!empty($input) && strpos($_SERVER['CONTENT_TYPE'] ?? '', 'application/json') !== false) {
                    $data = json_decode($input, true);
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        throw new Exception("Invalid JSON format.");
                    }
                } else {
                    $data = $_POST;
                }

                if (empty($data['token'])) {
                    throw new Exception("Verification token is required.");
                }

                $userModel = $this->load_model("User");
                $userModel->verifyEmail($data['token']);

                echo json_encode(['status' => 'success', 'message' => 'Email verified successfully.']);
                exit;
            } catch (Throwable $e) {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
                exit;
            }
        }

        header('Content-Type: text/html; charset=utf-8');
        $this->view("auth/verify", []);
    }

    /**
     * Handle logout
     */
     public function logout()
    {
        // Start session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        //  Remove all session variables related to user
        if (isset($_SESSION['USER'])) {
            unset($_SESSION['USER']);
        }

        //  Destroy session completely
        session_unset();
        session_destroy();

        //  Clear "remember me" cookie if it exists
        if (isset($_COOKIE['remember_token'])) {
            setcookie('remember_token', '', time() - 3600, "/", "", true, true);
        }

        //  Redirect to login or home page
        header("Location: " . ROOT . "home");
        exit;
    }
}
