const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const loginEmailUsername = $('#loginEmailUsername');
const loginPassword = $('#loginPassword');
const loginEmailUsernameWarning = $('#loginEmailUsernameWarning');

loginEmailUsername.addEventListener('blur', () => {
    if (loginEmailUsername.value == '') {
        loginEmailUsernameWarning.innerText = "* Email/Username cannot be empty.";
    } else {
        loginEmailUsernameWarning.innerText = " ";
    }
})
