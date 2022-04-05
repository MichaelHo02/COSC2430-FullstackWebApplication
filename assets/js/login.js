const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const loginEmailUsername = $('#loginEmailUsername');
const loginPassword = $('#loginPassword');
const loginEmailUsernameWarning = $('#loginUserFeedback');
const passwordWarning = $('#passwordUserFeedback');


// loginEmailUsername.addEventListener('blur', () => {
//     if (loginEmailUsername.value == '') {
//         loginEmailUsernameWarning.innerText = "* Email/Username cannot be empty.";
//     } else {
//         loginEmailUsernameWarning.innerText = " ";
//     }
// })


function handleLoginForm() {
    loginEmailUsername.classList.remove('is-invalid');
    loginPassword.classList.remove('is-invalid');
    if (loginEmailUsername.value == '') {
        loginEmailUsername.classList.add('is-invalid');
        loginEmailUsernameWarning.innerText = 'This field cannot be empty';
        return false;
    } 

    if (loginEmailUsername.value.includes('@') && !loginEmailUsername.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
        loginEmailUsername.classList.add('is-invalid');
        loginEmailUsernameWarning.innerText = 'Invalid email format';
        return false;
    }

    if (loginPassword.value == '') {
        loginPassword.classList.add('is-invalid');
        passwordWarning.innerText = 'This field cannot be empty';
        return false;
    }
    return true;
}