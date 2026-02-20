    <?php
    require_once __DIR__ . "/../config/Database.php";
    require_once __DIR__ . "/../models/User.php";

    class AuthController {
        private $userModel;

        public function __construct() {
            $db = (new Database())->connect();
            $this->userModel = new User($db);
        }

        public function register() {
            $username = trim($_POST["username"] ?? "");
            $email = trim($_POST["email"] ?? "");
            $password = $_POST["password"] ?? "";
            $confirm_password = $_POST["confirm_password"] ?? "";

            

            // validation: required fields
            if ($username === "" || $email === "" || $password === "" || $confirm_password === "") {
                $_SESSION["message"] = "All fields are required.";
                $_SESSION["message_type"] = "error";
                return;
            }

            // validation: confirm password
            if ($password !== $confirm_password) {
                $_SESSION["message"] = "Passwords do not match.";
                $_SESSION["message_type"] = "error";
                return;
            }

            // validation: email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION["message"] = "Invalid email format.";
                $_SESSION["message_type"] = "error";
                return;
            }

            // validation: email already exists
            $existing = $this->userModel->findByEmail($email);
            if ($existing) {
                $_SESSION["message"] = "Email already exists.";
                $_SESSION["message_type"] = "error";
                return;
            }

            $hash = password_hash($password, PASSWORD_DEFAULT);
            $ok = $this->userModel->create($username, $email, $hash);

            if ($ok) {
            $_SESSION["message"] = "Account created! Please login.";
    

                $_SESSION["message"] = "Account created! Please login.";
                $_SESSION["message_type"] = "success";
            } else {
                $_SESSION["message"] = "Could not create an account.";
                $_SESSION["message_type"] = "error";
            }


        }

        public function login() {
            $email = trim($_POST["email"] ?? "");
            $password = $_POST["password"] ?? "";

            if ($email === "" || $password === "") {
                $_SESSION["message"] = "Email and password are required.";
                $_SESSION["message_type"] = "error";
                return false;
            }

            $user = $this->userModel->findByEmail($email);

            if ($user && password_verify($password, $user["password"])) {
                $_SESSION["logged_in"] = true;
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["username"] = $user["username"];
                $_SESSION["email"] = $user["email"];
                return true;
            }

            $_SESSION["message"] = "Invalid email or password.";
            $_SESSION["message_type"] = "error";
            return false;
        }

        public function logout() {
            session_destroy();
        }
    }
