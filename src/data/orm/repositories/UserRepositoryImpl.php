<?php
namespace App\RepositoryImpl;
use App\Entity\IUser;
use App\Repository\IUserRepository;
class UserRepositoryImpl implements IUserRepository
{
    public function __construct(private readonly \PDO $db)
    {
    }
    public function save(IUser $user): void
    {
        $stmt = $this->db->prepare(query: "INSERT INTO users (name,email) VALUES(id:,name:,email:,userName:) ");
        $stmt->bindParam(param: "id", var: $user->id);
        $stmt->bindParam(param: "username", var: $user->userName);
        $stmt->bindParam(param: "email", var: $user->email);
        $stmt->bindParam(param: "name", var: $user->name);
        $stmt->execute();
    }
    public function findById(string $userId): ?IUser
    {
        $stmt = $this->db->prepare(query: "SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(param: ':id', var: $userId, type: \PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch(mode: \PDO::FETCH_ASSOC);
        if ($data) {
            return new IUser(name: $data['name'], email: $data['email']);

        }
        return null;
    }

    public function query(IUser $query, int $limit, int $page): array
    {
        $offset = ($page - 1) * $limit;
        $stmt = $this->db->prepare(query: "SELECT * FROM users LIMIT :limit OFFSET :offset");
        $stmt->bindParam(param: ':limit', var: $limit, type: \PDO::PARAM_INT);
        $stmt->bindParam(param: ':offset', var: $offset, type: \PDO::PARAM_INT);
        $stmt->execute();

        $results = [];
        while ($data = $stmt->fetch(mode: \PDO::FETCH_ASSOC)) {
            $results[] = new IUser(name: $data['name'], email: $data['email']);
        }
        return $results;
    }
}