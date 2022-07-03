<?php

class Pet extends Controller{
    public function __construct()
    {
        $this->animalModel = $this->model('Animals');
        $this->userModel = $this->model('User');
    }
    
    public function index($id) {
        $animals = $this->animalModel->findAnimalById($id);
        if (isUserLoggedIn()) {
            $userProfile = $this->userModel->findUserById($_SESSION['id']);
        } else {
            $userProfile = [];
        }
        
        $data = [
            'title' => 'Home',
            'userProfile' => $userProfile,
            'animal' => $animals
        ];

        $this->view('users/pet', $data);
    }

    public function listOfPets() {
        
    }

    public function adoptedPet($id) {
        
    }
}