<?php
use App\HTTP\Controllers\UserController;
use App\RepositoryImpl\UserRepositoryImpl;
use App\Config\Database;

$path = $_SERVER['REQUEST_METHOD'];
if ($path !== 'users')
    return

        $request = $_SERVER['REQUEST_METHOD'];

$userRepository = new UserRepositoryImpl(db: new Database('localhost', 'newTests', 'admin', 'admin')->getConnection());
$controllers = new UserController($userRepository);

$controllers->createUser();
