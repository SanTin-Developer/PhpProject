<?php
require_once __DIR__ ."/UserRepository.php";

class UserController {
    private $repo;

    public function __construct() {
        $this->repo = new UserRepository();
    }

    public function index() {
        echo json_encode($this->repo->getAll());
    }

    public function store() {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $this->repo->create($data);
        echo json_encode($result);
    }

    public function update() {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $this->repo->update($data);
        echo json_encode($result);
    }

    public function delete() {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $this->repo->delete($data["id"]);
        echo json_encode($result);
    }
}
?>
