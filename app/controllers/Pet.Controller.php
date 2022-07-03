<?php

class Pet extends Controller{
    
    public function __construct()
    {
        $this->animalModel = $this->model('Animals');
        $this->userModel = $this->model('User');
        $data = [
            'sample' => 'asdsad',
        ];
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
        $animals = $this->animalModel->getAnimals();
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


        $this->view('users/listOfPets', $data);
    }

    public function adoptedPet($id) {
        
    }
}