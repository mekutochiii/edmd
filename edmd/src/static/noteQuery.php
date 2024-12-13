<?php
class noteQuery {
    public static function CREATE_NOTE_QUERY() {
        return "INSERT INTO notes (title, content) VALUES (:title, :content)";
    }

    public static function READ_NOTES_QUERY() {
        return "SELECT * FROM notes ORDER BY created_at DESC";
    }

    public static function UPDATE_NOTE_QUERY() {
        return "UPDATE notes SET title = :title, content = :content WHERE id = :id";
    }

    public static function DELETE_NOTE_QUERY() {
        return "DELETE FROM notes WHERE id = :id";
    }
}
