<?php
require_once __DIR__ ."/Database.php";

class UserRepository {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnect();
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT id, full_name, email, password FROM public.customer");
        return $stmt->fetchAll();
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO public.customer(full_name, email, password) VALUES (:name, :email, :password)");
        $stmt->execute([
            ":name" => $data["full_name"],
            ":email" => $data["email"],
            ":password" => $data["password"]
        ]);

        return ["message" => "User created"];
    }

    public function update($data) {
        $stmt = $this->pdo->prepare("UPDATE customer SET full_name= ?, email= ?, password= ? WHERE id= ?");
        $stmt->execute([
             $data["full_name"],
             $data["email"],
             $data["password"],
             $data["id"]
        ]);

        return ["message" => "User updated"];
    }

    public function delete($id) {

        $stmt = $this->pdo->prepare("DELETE FROM customer WHERE id = ? ");
        $stmt->execute([$id]);
        return ["message" => "User deleted"];
    }
}
?>
