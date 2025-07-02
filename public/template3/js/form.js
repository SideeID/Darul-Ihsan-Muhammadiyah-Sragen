const username = document.getElementById("username");
const password = document.getElementById("password");
const form = document.getElementById("form");

form.addEventListener("submit", (e) => {
    e.preventDefault();

    if(!validateInput()) e.target.submit();
});

const setError = (element, message) => {
    const inputControl = element.closest(".input-wrap");
    const errorDisplay = inputControl.querySelector(".error");

    errorDisplay.innerText = message;
    inputControl.classList.add("error");
    inputControl.classList.remove("success");
};
const setSuccesss = (element) => {
    const inputControl = element.closest(".input-wrap");
    const errorDisplay = inputControl.querySelector(".error");

    errorDisplay.innerText = "";
    inputControl.classList.add("success");
    inputControl.classList.remove("error");
};

const validateInput = () => {
    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();
    let isError = false;

    if (usernameValue === "") {
        setError(username, "The username field is required.");
        isError = true;
    } else {
        setSuccesss(username);

    }

    if (passwordValue === "") {
        setError(password, "The password field is required.");
        isError = true;
    } else {
        setSuccesss(password);
    }
    return isError;
};

let base_path = `{{ URL::to('/') }}`;

$("#showPassword").click(function () {
    var passwordField = $("#password");
    var passwordFieldType = passwordField.attr("type");
    if (passwordFieldType == "password") {
        passwordField.attr("type", "text");
    } else {
        passwordField.attr("type", "password");
    }
});
