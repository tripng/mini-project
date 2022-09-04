<?php 

namespace App\Services;

interface UserService{
    public function login(string $nim, string $password);
}