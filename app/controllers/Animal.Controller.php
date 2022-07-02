<?php

class Animal extends Controller
{
    public function __construct()
    {
        if (!isAdminLoggedIn()) {
            redirect('auth/admin');
        }
        $this->adminModel = $this->model('User');
        $this->animalModel = $this->model('Animals');
    }

    public function index()
    {
        $adminProfile = $this->adminModel->getAdminProfileById($_SESSION['admin_id']);
        $animals = $this->animalModel->getAnimals();

        $data = [
            'title' => 'Animals',
            'adminProfile' => $adminProfile,
            'animal' => $animals
        ];

        $this->view('admin/Animal/index', $data);
    }

    // Create animals controller
    public function create()
    {
        $adminProfile = $this->adminModel->getAdminProfileById($_SESSION['admin_id']);

        $data = [
            'title' => 'Create',
            'adminProfile' => $adminProfile,
        ];

        // Function if save button for animal is clicked
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'Animals',
                'adminProfile' => $adminProfile,
                'petName' => $_POST['pet_name'],
                'petNameError' => '',
                'petBreed' => $_POST['pet_breed'],
                'petGender' => $_POST['pet_gender'],
                'petSize' => $_POST['pet_size'],
                'petColor' => $_POST['pet_color'],
                'petVaccinated' => $_POST['pet_vaccinated'],
                'petAge' => $_POST['pet_age'],
                'coatLength' => $_POST['coat_length'],
                'adoptionFee' => $_POST['adoption_fee'],
                'adoptionFeeError' => '',
                'petDescription' => $_POST['pet_description'],
                'path' => ''
            ];

            // Validation for pet name
            if (empty($data['petName'])) {
                $data['petNameError'] = 'Please enter a pet name.';
            }

            // Validation for adoption fee
            // if (empty($data['adoptionFee'])) {
            //     $data['adoptionFeeError'] = 'Please enter an amount for adoption fee.';
            // }

            // Check if there's a image directory
            if (!is_dir(APPROOT . '/../public/assets/img/')) {
                mkdir(APPROOT . '/../public/assets/img/');
            }


            if (empty($data['petNameError']) && empty($data['adoptionFeeError'])) {
                // Execute if all condition is met
                $image = $_FILES['pet_image'] ?? null;
                $imagePath = '';
                if ($image && $image['tmp_name']) {
                    $imagePath = randomString(8) . '/' . $image['name'];
                    mkdir(dirname(APPROOT . '/../public/assets/img/' . $imagePath));
                    move_uploaded_file($image['tmp_name'], APPROOT . '/../public/assets/img/' . $imagePath);
                }

                $data['path'] = $imagePath;

                // Save into database
                if ($this->animalModel->insertAnimal($data)) {
                    header("location: " . URLROOT . "/animal/");
                } else {
                    die("Something went wrong. please try again");
                }
            } else {
                $this->view('admin/Animal/create', $data);
            }
        }

        $this->view('admin/Animal/create', $data);
    }

    // Update animal Record
    public function update($id)
    {
        $animalInformation = $this->animalModel->findAnimalById($id);
        $adminProfile = $this->adminModel->getAdminProfileById($_SESSION['admin_id']);

        $data = [
            'title' => 'Update',
            'animalInformation' => $animalInformation,
            'adminProfile' => $adminProfile,
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'title' => 'Animals',
                'adminProfile' => $adminProfile,
                'petName' => $_POST['pet_name'],
                'petBreed' => $_POST['pet_breed'],
                'petGender' => $_POST['pet_gender'],
                'petSize' => $_POST['pet_size'],
                'petColor' => $_POST['pet_color'],
                'petVaccinated' => $_POST['pet_vaccinated'],
                'petAge' => $_POST['pet_age'],
                'coatLength' => $_POST['coat_length'],
                'adoptionFee' => $_POST['adoption_fee'],
                'petDescription' => $_POST['pet_description'],
                'path' => ''
            ];

            // Execute if all condition is met
            $image = $_FILES['pet_image'] ?? null;
            $imagePath = $animalInformation->image;
            if ($image && $image['tmp_name']) {
                if ($animalInformation->image) {
                    unlink(APPROOT . '/../public/assets/img/' . $animalInformation->image);
                }

                $imagePath = randomString(8) . '/' . $image['name'];
                mkdir(dirname(APPROOT . '/../public/assets/img/' . $imagePath));
                move_uploaded_file($image['tmp_name'], APPROOT . '/../public/assets/img/' . $imagePath);
            }

            $data['path'] = $imagePath;

            // Update animal record to database
            if ($this->animalModel->updateAnimal($data)) {
                header("location: " . URLROOT . "/animal/");
            } else {
                die("Something went wrong. please try again");
            }
        }

        $this->view('admin/Animal/update', $data);
    }

    // Delete animal record
    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if ($this->animalModel->deleteAnimal($id)) {
                header("location: " . URLROOT . "/animal");
            } else {
                die('Something went wrong');
            }
        }
    }
}