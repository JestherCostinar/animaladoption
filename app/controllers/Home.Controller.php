<?php

class Home extends Controller{
    public function __construct()
    {
        $this->animalModel = $this->model('Animals');
        $this->userModel = $this->model('User');
    }
    
    public function index() {
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

        $this->view('users/index', $data);
    }
}