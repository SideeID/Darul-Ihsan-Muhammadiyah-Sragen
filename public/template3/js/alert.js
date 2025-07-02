const alertPassword = document.getElementById("alert-password");
const alertUsername = document.getElementById("alert-username");
const alertDaftar = document.getElementById("alert-daftar");

// Variabel untuk input form
const usernameInput = document.getElementById("username");
const passwordInput = document.getElementById("password");

// // Contoh data username dan password yang valid
// const validUsername = "admin";
// const validPassword = "123";

// Fungsi untuk menampilkan alert
function showAlert(alertElement) {
    alertElement.classList.remove("d-none");
}

// Fungsi untuk menyembunyikan alert
function hideAlert(alertElement) {
    alertElement.classList.add("d-none");
}

function showAlert(alertElement, duration = 4000) {
    alertElement.classList.remove('d-none');

    // Menghilangkan alert setelah durasi yang ditentukan
    setTimeout(() => {
        hideAlert(alertElement);
    }, duration);
}

// document.getElementById("form").addEventListener("submit", function (e) {
    // e.preventDefault();

    // const username = usernameInput.value.trim();
    // const password = passwordInput.value.trim();

    // hideAlert(alertPassword);
    // hideAlert(alertUsername);
    // hideAlert(alertDaftar);

    // // Kondisi ketika password salah dan username benar
    // if (username === validUsername && password !== validPassword) {
    //     showAlert(alertPassword, 4000);
    // }

    // // Kondisi ketika username salah dan password benar
    // else if (username !== validUsername && password === validPassword) {
    //     showAlert(alertUsername, 4000);
    // }

    // // Jika keduanya salah
    // else if (username !== validUsername && password !== validPassword) {
    //     showAlert(alertDaftar, 4000);
    // }

    // // Jika keduanya benar (login berhasil)
    // else {
    //     alert("Login berhasil!");
    // }
// });
