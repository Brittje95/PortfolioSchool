const checkBtn = document.getElementById("checkBtn");

const username = document.getElementById("username");
const usernameMsg = document.getElementById("username-msg");

// const email = document.getElementById("email");
// const emailMsg = document.getElementById("email-msg");

username.addEventListener("keyup", (event) => {
  if (username.value.length < 6 || username.value.length > 64) {
    console.log("moet 6-64 karakters hebben");
    username.style.backgroundColor = "red";
    usernameMsg.innerText = "Username moet tussen de 6 en 64 karakters hebben!";
  } else {
    username.style.backgroundColor = "white";
    usernameMsg.innerText = "";
  }
});

const password = document.getElementById("password");
const letter = document.getElementById("letter");
const capital = document.getElementById("capital");
const number = document.getElementById("number");
const length = document.getElementById("length");

// Bij aanklikken, requirements tonen
password.onfocus = function () {
  document.getElementById("message").style.display = "block";
};

// Bij wegklikken, requirements verbergen
password.onblur = function () {
  document.getElementById("message").style.display = "none";
};

password.onkeyup = function () {
  // Valideren kleine letters
  const lowerCaseLetters = /[a-z]/g;
  if (password.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }

  // Valideren hoofdletters
  const upperCaseLetters = /[A-Z]/g;
  if (password.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Valideren nummers
  const numbers = /[0-9]/g;
  if (password.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Valideren lengte
  if (password.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
};

// password.addEventListener("keyup", (event) => {
//   if (password.value.length < 8) {
//     console.log("te kort");
//     password.style.backgroundColor = "red";
//     passwordMsg.innerText = "Password moet minimaal 8 karakters hebben!";
//   } else {
//     password.style.backgroundColor = "white";
//     passwordMsg.innerText = "";
//   }
// });
