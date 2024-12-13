<?php
class noteModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function createNote($title, $content) {
        $query = noteQuery::CREATE_NOTE_QUERY();
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        return $stmt->execute();
    }

    public function getNotes() {
        $query = noteQuery::READ_NOTES_QUERY();
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateNote($id, $title, $content) {
        $query = noteQuery::UPDATE_NOTE_QUERY();
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        return $stmt->execute();
    }

    public function deleteNote($id) {
        $query = noteQuery::DELETE_NOTE_QUERY();
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
