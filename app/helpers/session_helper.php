<?php

session_start();

function redirect($page)
{
    header('location: ' . URLROOT . '/' . $page);
}

function isAdminLoggedIn()
{
    if (isset($_SESSION['admin_id'])) {
        return true;
    } else {
        return false;
    }
}

function isUserLoggedIn()
{
    if (isset($_SESSION['id'])) {
        return true;
    } else {
        return false;
    }
}