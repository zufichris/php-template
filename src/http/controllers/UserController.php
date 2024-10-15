<?php
namespace App\HTTP\Controllers;
use App\RepositoryImpl\UserRepositoryImpl;
use App\UseCase\CreateUser;

class UserController
{
    private CreateUser $create;
    public function __construct(private readonly UserRepositoryImpl $userRepositoryImpl)
    {
        $this->create = new CreateUser(userRepositoryImpl: $userRepositoryImpl);
    }
    public function createUser()
    {
        $name = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;

        if ($name && $email) {
            $user = $this->create($name, $email);
            http_response_code(200);
            return json_encode(['user' => $user]);
        } else {
            http_response_code(400);
            return json_encode(['error' => 'Name and email are required.']);
        }
    }

}