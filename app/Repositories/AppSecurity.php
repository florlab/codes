<?php

namespace App\Repositories;

class AppSecurity
{
    public function encryptedPassword($encryptedPassword)
    {
        return md5($encryptedPassword);
    }
}