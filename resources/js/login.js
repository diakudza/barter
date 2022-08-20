const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");
const container = document.getElementById("authentication");

if (signUpButton) {
    signUpButton.addEventListener("click", () => {
        container.classList.add("right-panel-active");
    });
}

if (signInButton) {
    signInButton.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
    });
}
