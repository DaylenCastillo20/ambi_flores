// ===========================
// MOSTRAR / OCULTAR PASSWORD
// ===========================
document.getElementById("togglePassword").addEventListener("click", function() {
    const pwd = document.getElementById("pwd");
    const icon = document.getElementById("icono-ojo");

    if (pwd.type === "password") {
        pwd.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        pwd.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
});


// ===========================
// CARGAR USUARIO RECORDADO
// ===========================
document.addEventListener("DOMContentLoaded", function() {
    const savedUser = localStorage.getItem("rememberUser");

    if (savedUser) {
        document.getElementById("usuario").value = savedUser;
        document.getElementById("remember").checked = true;
    }
});