<?php

namespace App\UseCase;

use App\RepositoryImpl\UserRepositoryImpl;
use App\Dto\CreateUserDto;
use App\Entity\IUser;

class CreateUser
{
 public function __construct( private readonly UserRepositoryImpl $userRepositoryImpl)
    {
    }

    public function execute(CreateUserDto $createUserDTO): IUser
    {
        $user = new IUser(name: $createUserDTO->name, email: $createUserDTO->email);
        $this->userRepositoryImpl->save(user: $user);
        return $user;
    }
}
