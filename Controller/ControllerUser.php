<?php
require __DIR__."/../Model/DataUser.php";
class ControllerUser{
    public function getAllUser(){
        $a = getLengthUser();
        return getUsers(0, $a);
    }

    public function checkLogin($email, $password){
        $password1 = getPassword($email);
        if ($password1 == false) return false;
        return strcmp(md5($password), $password1) == 0;
    }

    public function getUserFromEmail($email){
        return getUser($email);
    }
}