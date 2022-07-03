<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require APPROOT . '/PHPMailer-master/PHPMailer-master/src/Exception.php';
require APPROOT . '/PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require APPROOT . '/PHPMailer-master/PHPMailer-master/src/SMTP.php';

class Auth extends Controller
{

    // Constructor
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $this->login();
    }

    // Admin Login/Index function
    public function admin()
    {
        $data = [
            'title' => 'Login',
            'emailError' => '',
            'loginMessage' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'Login',
                'emailError' => '',
                'loginMessage' => '',
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];

            // ============ Input Validation ================= //
            //    for email - accepting a gmail.com only       //
            // =============================================== //
            $emailValidation = '|^[A-Z0-9._%+-]+@gmail\.com$|i';
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
                $data['email'] = '';
            } else {
                if (!preg_match($emailValidation, $data['email'])) {
                    $data['emailError'] = 'Accepting gmail.com email only';
                    $data['email'] = '';
                }
            }

            if (empty($data['emailError'])) {
                $loggedInUser = $this->userModel->adminLogin($data['email'], $data['password']);

                if ($loggedInUser) {
                    $this->createAdminSession($loggedInUser);
                } else {
                    $data['loginMessage'] = 'Invalid Username or Password. Please Try again.';
                    $this->view('admin/login', $data);
                }
            }
        }
        $this->view('admin/login', $data);
    }
    
    // User Login Controller
    public function login() {
        $data = [
            'title' => 'Login',
            'loginMessage' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'login',
                'loginMessage' => '',
                'email' => $_POST['email'],
                'password' => $_POST['password'],
            ];

            $loggedInUser = $this->userModel->login($data['email'], $data['password']);

            if ($loggedInUser) {
                $this->createUserSession($loggedInUser);
            } else {
                $data['loginMessage'] = 'Invalid Username or Password. Please Try again.';
                $this->view('users/login', $data);
            }
        }

        $this->view('users/login', $data);
    }

    // User Registration Controller 
    public function register()
    {
        $data = [
            'title' => "Register",
            'firstname' => '',
            'firstnameError' => '',
            'lastname' => '',
            'lastnameError' => '',
            'middleInitial' => '',
            'middleInitialError' => '',
            'address' => '',
            'addressError' => '',
            'city' => '',
            'cityError' => '',
            'state' => '',
            'stateError' => '',
            'zip' => '',
            'zipError' => '',
            'zip' => '',
            'contact' => '',
            'contactError' => '',
            'email' => '',
            'emailError' => '',
            'password' => '',
            'passwordError' => '',
            'confirmPassword' => '',
            'confirmPasswordError' => '',
            'path' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'Register',
                'firstname' => trim($_POST['firstname']),
                'firstnameError' => '',
                'lastname' => trim($_POST['lastname']),
                'lastnameError' => '',
                'middleInitial' => trim($_POST['middle_initial']),
                'middleInitialError' => '',
                'address' => trim($_POST['address']),
                'addressError' => '',
                'city' => trim($_POST['city']),
                'cityError' => '',
                'state' => trim($_POST['state']),
                'stateError' => '',
                'zip' => trim($_POST['zip']),
                'zipError' => '',
                'contact' => trim($_POST['contact']),
                'contactError' => '',
                'email' => trim($_POST['email']),
                'emailError' => '',
                'password' => trim($_POST['password']),
                'passwordError' => '',
                'confirmPassword' => trim($_POST['confirmPassword']),
                'confirmPasswordError' => '',
                'path' => ''
            ];

            // ===================================== //
            //     User Registration Validation      //
            // ===================================== //

            // Firstname, lastname, middle initial. Accept only a-z and A-Z
            $nameValidation = "/^[a-zA-Z\s]*$/";

            // Firstname Validation
            if (empty($data['firstname'])) {
                $data['firstnameError'] = 'Please enter firstname.';
                $data['firstname'] = '';
            } elseif (!preg_match($nameValidation, $data['firstname'])) {
                $data['firstnameError'] = 'Firstname can only contain letters.';
                $data['firstname'] = '';
            }

            // Lastname Validation
            if (empty($data['lastname'])) {
                $data['lastnameError'] = 'Please enter lastname.';
                $data['lastname'] = '';
            } elseif (!preg_match($nameValidation, $data['lastname'])) {
                $data['lastnameError'] = 'Lastname can only contain letters.';
                $data['lastname'] = '';
            }

            // Middle Initial Validation
            if (!empty($data['middleInitial'])) {
                if (strlen($data['middleInitial']) != 1) {
                    $data['middleInitialError'] = 'Contain only 1 letter';
                    $data['middleInitial'] = '';
                }
            }

            // Address Validation
            if (empty($data['address'])) {
                $data['addressError'] = 'Please enter Address.';
                $data['address'] = '';
            }

            // City Validation
            if (empty($data['city'])) {
                $data['cityError'] = 'Please enter City.';
                $data['city'] = '';
            }

            // State/Region Validation
            if (empty($data['state'])) {
                $data['stateError'] = 'Please enter State/Region.';
                $data['state'] = '';
            }

            // Zip Code Validation
            if (empty($data['zip'])) {
                $data['zipError'] = 'Please enter Zip Code';
                $data['zip'] = '';
            }

            // Phone number validation
            $phoneNumberValidation = '/^[0-9]{11}+$/';
            // Lastname Validation
            if (empty($data['contact'])) {
                $data['contactError'] = 'Please enter contact number.';
                $data['contact'] = '';
            } elseif (!preg_match($phoneNumberValidation, $data['contact'])) {
                $data['contactError'] = 'Invalid format';
                $data['contact'] = '';
            }

            // Validate email. Accept only jru email

            // ============ Accept only my.jru.edu domain ================= //
            // $emailValidation = '|^[A-Z0-9._%+-]+@gmail\.com$|i';       //
            // ============================================================ //

            $emailValidation = '|^[A-Z0-9._%+-]+@gmail\.com$|i';

            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
                $data['email'] = '';
            } elseif (!preg_match($emailValidation, $data['email'])) {
                $data['emailError'] = 'Only accepting gmail.com email.';
                $data['email'] = '';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['emailError'] = 'Email already taken.';
                    $data['email'] = '';
                }
            }


            // Password Validation
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter password address.';
            } elseif (strlen($data['password']) < 6) {
                $data['passwordError'] = 'Password atleast 8 characters.';
            } elseif (preg_match($passwordValidation, $data['password'])) {
                $data['passwordError'] = 'Password must have atleast one numeric value.';
            }

            // Confirm Password Validation
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter password address.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPasswordError'] = 'Please do not match, please try again.';
                }
            }

            // Check if all errors are empty
            if (
                (empty($data['firstnameError'])) && (empty($data['lastnameError'])) && (empty($data['middleInitialError'])) && 
                (empty($data['addressError'])) && (empty($data['cityError'])) && (empty($data['stateError'])) && (empty($data['zipError'])) && 
                (empty($data['contactError']) && (empty($data['emailError'])) && (empty($data['passwordError'])) && (empty($data['confirmPasswordError'])))
            ) {
                // Move Files or Images to the directory 
                $image = $_FILES['profile'] ?? null;
                $imagePath = '';
                if ($image && $image['tmp_name']) {
                    $imagePath = randomString(8) . '/' . $image['name'];
                    mkdir(dirname(APPROOT . '/../public/assets/img/' . $imagePath));
                    move_uploaded_file($image['tmp_name'], APPROOT . '/../public/assets/img/' . $imagePath);
                }
                $data['path'] = $imagePath;

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                // Register user from model function
                $user_id = $this->userModel->register($data);
                if ($this->userModel->oneTimePassword($user_id)) {
                    $_SESSION['account_to_verify'] = $user_id;
                    header('Location: ' . URLROOT . '/auth/verifyAccount');
                } else {
                    die("Something went wrong");
                }
            } else {
                $this->view('users/register', $data);
            }
        }


        $this->view('users/register', $data);
    }

    // Verify account controller 
    public function verifyAccount()
    {
        $verificationCode = $this->userModel->findUserVerificationCodeByID($_SESSION['account_to_verify'])->verification_code;
        $userId = $this->userModel->findUserVerificationCodeByID($_SESSION['account_to_verify'])->user_id;
        $recipient = $this->userModel->findUserById($userId)->email;

        $this->verifyByEmail($recipient, $verificationCode);

        $data = [
            'title' => 'Verify Account',
            'errorMessage' => '',
            'verificationCodeError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'Verify Account',
                'verificationCodeError' => '',
                'verificationCode' => $_POST['verificationCode']
            ];

            if ($data['verificationCode'] == $verificationCode) {
                if ($this->userModel->updateAccountStatus($_SESSION['account_to_verify'])) {
                    unset($_SESSION['account_to_verify']);
                    header('Location: ' . URLROOT . '/auth/');
                }
            } else {
                $data['verificationCodeError'] = 'Invalid Code. Try again.';
            }
        }

        $this->view('users/verify_account', $data);
    }


    // Send verification code to Email
    public function verifyByEmail($recepient, $body)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'accura.find1@gmail.com';
            $mail->Password = 'emviozyeetqehyyb';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            //Recipients
            $mail->setFrom('jesther.jc15@gmail.com', 'Kasmir Blog');

            //Add a recipient
            $mail->addAddress($recepient, 'rasdasd');

            //Set email format to HTML
            $mail->isHTML(true);

            $mail->Subject = 'Email verification';
            $mail->Body    = '<p>To Activate Account, enter verification code: <b style="font-size: 30px;">' . $body . '</b>' . '. NEVER share this code with others under any circumstances.' . '</p>';

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }


    // Session after admin login
    public function createAdminSession($user)
    {
        $_SESSION['admin_id'] = $user->id;
        $_SESSION['admin_username'] = $user->username;
        $_SESSION['admin_email'] = $user->email;
        header('location:' . URLROOT . '/dashboard/index');
    }

    // Unset session after logout
    public function adminLogout()
    {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_username']);
        unset($_SESSION['admin_email']);
        header('location:' . URLROOT . '/auth/admin');
    }

    // Session after admin login
    public function createUserSession($user)
    {
        $_SESSION['id'] = $user->id;
        $_SESSION['email'] = $user->email;
        header('location:' . URLROOT . '/index');
    }
    
    // Unset session after logout
    public function logout()
    {
        unset($_SESSION['id']);
        unset($_SESSION['email']);
        header('location:' . URLROOT . '/auth/login');
    }
}