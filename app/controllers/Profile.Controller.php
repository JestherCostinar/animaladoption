<?php

class Profile extends Controller
{
    public function __construct()
    {
        if (!isAdminLoggedIn()) {
            redirect('auth/admin');
        }

        $this->adminModel = $this->model('User');
    }


    public function index()
    {
        $adminProfile = $this->adminModel->getAdminProfileById($_SESSION['admin_id']);

        $data = [
            'title' => 'Profile',
            'adminProfile' => $adminProfile
        ];

        $this->view('admin/Profile/index', $data);
    }

    // Update Admin Profile function
    public function update($id)
    {
        if (isAdminLoggedIn()) {
            $adminProfile = $this->adminModel->getAdminProfileById($_SESSION['admin_id']);
        }
        $data = [
            'title' => 'Profile',
            'adminProfile' => $adminProfile,
            'editProfileMessage' => ''
        ];

        // Save button click
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'title' => 'Profile',
                'adminProfile' => $adminProfile,
                'editProfileMessage' => '',
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'username' => $_POST['username'],
                'contact' => $_POST['contact'],
                'email' => $_POST['email'],
                'editProfileMessage' => '',
                'path' => ''
            ];

            // Check if there's a image directory
            if (!is_dir(APPROOT . '/../public/assets/img/')) {
                mkdir(APPROOT . '/../public/assets/img/');
            }

            // Set up path to store admin profile to image directory
            $image = $_FILES['image'] ?? null;
            $imagePath = $adminProfile->image;
            if ($image && $image['tmp_name']) {
                if ($adminProfile->image) {
                    unlink(APPROOT . '/../public/assets/img/' . $adminProfile->image);
                }

                $imagePath = randomString(8) . '/' . $image['name'];
                mkdir(dirname(APPROOT . '/../public/assets/img/' . $imagePath));
                move_uploaded_file($image['tmp_name'], APPROOT . '/../public/assets/img/' . $imagePath);
            }

            $data['path'] = $imagePath;

            // Check if no error
            if ($this->adminModel->updateAdminProfile($data)) {
                $data['editProfileMessage'] = 'Profile has been successfuly updated';
            } else {
                $data['editProfileMessage'] = 'There is an error while performing update. Please try again.';
            }
            header("location: " . URLROOT . "/profile/");
        }

        $this->view('admin/Profile/update', $data);
    }
}