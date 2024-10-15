<?php
namespace App\Repository;
use App\Entity\IUser;

interface IUserRepository
{
  function save(IUser $user): void;
  function findById(string $userId): ?IUser;
  function query(IUser $query, int $limit, int $page): array;
}