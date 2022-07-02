<?php

class Dashboard extends Controller
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
            'title' => 'Dashboard',
            'adminProfile' => $adminProfile
        ];

        $this->view('admin/dashboard', $data);
    }
}