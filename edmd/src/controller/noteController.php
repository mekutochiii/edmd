<?php
class noteController {
    private $model;

    public function __construct() {
        $db = new Database();
        $con = $db->initDatabase();
        $this->model = new noteModel($con);
    }

    public function create($data) {
        return $this->model->createNote($data['title'], $data['content']);
    }

    public function read() {
        return $this->model->getNotes();
    }

    public function update($data) {
        return $this->model->updateNote($data['id'], $data['title'], $data['content']);
    }

    public function delete($id) {
        return $this->model->deleteNote($id);
    }
}
