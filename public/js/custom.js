
function togglePassword() {
    const passwordInput = document.querySelectorAll("#password, #password_confirmation");
    const checkPassword=document.getElementById('check_password');
    passwordInput.forEach(input => {
        if (input.type === "password") {
            input.type = "text";
            checkPassword.textContent = "Hide";
        } else {
            input.type = "password";
            checkPassword.textContent = "Show";
        }
    })
}