<?php
class User
{
    public function login ($login, $password) {
        if ($this->isValidCredentials ($login, $password)) {
            $_SESSION['session'] = true;
            $_SESSION['name'] = $login;
            return true;
        }
        return false;
    }

    public function redirectToLogin () {
        header("Location: login.php");
    }

    public function isValidCredentials ($login, $password) {
        if ($login == 'admin' && $password == '12345') {
            return true;
        }
        return false;
    }
    
    public function getName () {
        if(isset($_SESSION['name'])) {
            return $_SESSION['name'];
        }
        return false;
    }

    public function isLogged () {
        return isset($_SESSION['session']) && $_SESSION['session'];
    }
}