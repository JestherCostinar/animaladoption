<?php

class Controller
{
    // load model    
    public function model($model)
    {
        $model = ucwords($model);
        if (file_exists('../app/models/' . $model . '.Model.php')) {
            require_once('../app/models/' . $model . '.Model.php');
            return new $model();
        } else
            throw new Exception("Model: '" . $model . "' does not Exists");
    }

    // load view
    public function view($view, $data = [])
    {
        $view = str_replace(".", "/", $view);
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once('../app/views/' . $view . '.php');
        } else
            throw new Exception("View: '" . $view . "' does not Exists");
    }

    // load the 404 page
    public function errorRedirect()
    {
        $this->view("front.404");
    }

    // load the 404 page in admin section
    public function adminErrorRedirect()
    {
        $this->view("admin.404");
    }
}