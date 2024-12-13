function createNote(noteData) {
    $.ajax({
        type: "POST",
        url: "../../src/services/noteService.php",
        data: { type: "create_note", ...noteData },
        success: function (response) {
            console.log("Note created:", response);
        },
        error: function (error) {
            console.error("Error creating note:", error);
        },
    });
}

function readNotes() {
    $.ajax({
        type: "POST",
        url: "../../src/services/noteService.php",
        data: { type: "read_notes" },
        success: function (response) {
            console.log("Notes:", response);
        },
        error: function (error) {
            console.error("Error fetching notes:", error);
        },
    });
}

function updateNote(noteData) {
    $.ajax({
        type: "POST",
        url: "../../src/services/noteService.php",
        data: { type: "update_note", ...noteData },
        success: function (response) {
            console.log("Note updated:", response);
        },
        error: function (error) {
            console.error("Error updating note:", error);
        },
    });
}

function deleteNote(noteId) {
    $.ajax({
        type: "POST",
        url: "../../src/services/noteService.php",
        data: { type: "delete_note", id: noteId },
        success: function (response) {
            console.log("Note deleted:", response);
        },
        error: function (error) {
            console.error("Error deleting note:", error);
        },
    });
}
