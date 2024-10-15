<?php

namespace App\Entity;

class  IUser{
    public int $id;
    public string $name;
    public string $email;
    public string $userName;
    public function  __construct(string $name,string $email) {
        $this->id=$this->getId();
        $this->$name= $name;
        $this->$email=$email;
        $this->$userName=explode(   separator: "@",string: $email)[0];
    }
    public function getId(): int{
        return random_int(0,20);
    }
}