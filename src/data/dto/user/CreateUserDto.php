<?php

namespace App\Dto;

class CreateUserDto{
    public string $name;
    public string $email;
    public function __construct(string $name,string $email) {
        $this->$name=$name;
        $this->$email=$email;
    }
}
