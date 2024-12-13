function totalUsers() {
    $.ajax({
        type: "POST",
        url: "../../../src/routes/routes.php",
        data: { type: "total_users" },
        success: function (data) {
            const result = JSON.parse(data);
            $("#totalUsers").text(result.total_users);
        },
        error: function (error) {
            console.error("Error fetching total users:", error);
        },
    });
}

$(document).ready(function () {
    totalUsers();
});