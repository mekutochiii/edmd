function user_login() {
    const formData = $("#loginForm").serialize();
    $.ajax({
        type: "POST",
        url: "../../src/routes/routes.php",
        data: formData + "&type=login",
        success: function (data) {
            if (data.trim() === "Login successful") {
                $.ajax({
                    type: "POST",
                    url: "../../src/routes/routes.php",
                    data: { type: "get_role" },
                    success: function (role) {
                        role = role.trim();
                        if (role === "1") {
                            window.location.href = "http://localhost/edmd/public/pages/admin/dashboard.php";
                        } else if (role === "2") {
                            window.location.href = "http://localhost/edmd/public/pages/user/home.php";
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: "Unable to determine user role.",
                            });
                        }
                    },
                    error: function () {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Failed to retrieve user role. Please try again.",
                        });
                    },
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Login Failed",
                    text: "Invalid username/email or password.",
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "An error occurred during login. Please try again.",
            });
        },
    });
}

function user_register() {
    const formData = $("#registerForm").serializeArray();
    let isValid = true;

    formData.forEach((field) => {
        if (!field.value.trim()) {
            isValid = false;
            Swal.fire({
                icon: "warning",
                title: "Missing Field",
                text: `Please fill out the ${field.name} field.`,
            });
            return false;
        }
    });

    if (!isValid) return;

    $.ajax({
        type: "POST",
        url: "../../routes/routes.php",
        data: $.param(formData) + "&type=register",
        success: function (data) {
            if (data === "Registration successful") {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "Registration completed! Redirecting to login page.",
                    timer: 3000,
                    showConfirmButton: true,
                }).then(() => {
                    window.location.href = "login.php";
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Registration Failed",
                    text: data,
                });
            }
        },
        error: function (error) {
            console.error("Error:", error);
        },
    });
}

function user_logout() {
    $.ajax({
        type: "POST",
        url: "../../../src/routes/routes.php",
        data: { type: "logout" },
        success: function (data) {
            if (data === "Logout successful") {
                Swal.fire({
                    icon: "success",
                    title: "Logged Out",
                    text: "You have been logged out successfully!",
                    timer: 2000,
                    showConfirmButton: false,
                }).then(() => {
                    window.location.href = "../../view/login.php";
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Logout Failed",
                    text: data,
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "An error occurred during logout. Please try again.",
            });
        },
    });
}

