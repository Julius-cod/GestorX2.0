document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("toggleThemeBtn");
    const body = document.body;

    // Carregar tema salvo
    if (localStorage.getItem("theme")) {
        body.className = localStorage.getItem("theme");
        btn.innerHTML = body.classList.contains("dark") ? "🌙" : "☀️";
    }

    btn.addEventListener("click", () => {
        if (body.classList.contains("dark")) {
            body.classList.replace("dark", "light");
            btn.innerHTML = "☀️";
            localStorage.setItem("theme", "light");
        } else {
            body.classList.replace("light", "dark");
            btn.innerHTML = "🌙";
            localStorage.setItem("theme", "dark");
        }
    });
});
