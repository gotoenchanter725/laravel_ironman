function viewPassword_old_password() {
    let x = document.getElementById("input-old_password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
function viewPassword_password() {
    let x = document.getElementById("input-password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
function viewPassword_password_confirmation() {
    let x = document.getElementById("input-password_confirmation");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
