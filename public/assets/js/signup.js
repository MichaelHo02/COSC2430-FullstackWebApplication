const validEmail = function () {
	const email = String(this.value).toLowerCase();

	let message = 'Invalid email address';
	if (email.length === 0) {
		message = 'Email cannot be empty';
	}

	if (
		email.match(
			/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
		)
	) {
		message = '';
	}
	if (message.length === 0) {
		this.classList.add('is-valid');
		this.classList.remove('is-invalid');
		const element = $('#emailFeedback');
		element.classList.add('valid-feedback');
		element.classList.remove('invalid-feedback');
		element.innerText = 'Valid Email';
	} else {
		this.classList.add('is-invalid');
		this.classList.remove('is-valid');
		const element = $('#emailFeedback');
		element.classList.add('invalid-feedback');
		element.classList.remove('valid-feedback');
		element.innerText = message;
	}
	updateBtn();
};

const validPassword = function () {
	const password = String(this.value);
	const requirement = document.querySelectorAll('.list-group-item');
	if (password.length === 0) {
		for (let i of requirement) {
			i.classList.remove('list-group-item-danger');
			i.classList.remove('list-group-item-success');
		}
		return;
	}

	if (8 <= password.length && password.length <= 20) {
		requirement[0].classList.add('list-group-item-success');
		requirement[0].classList.remove('list-group-item-danger');
	} else {
		requirement[0].classList.add('list-group-item-danger');
		requirement[0].classList.remove('list-group-item-success');
	}

	if (password.search(/(?=.*[a-z])/) === -1) {
		requirement[1].classList.add('list-group-item-danger');
		requirement[1].classList.remove('list-group-item-success');
	} else {
		requirement[1].classList.add('list-group-item-success');
		requirement[1].classList.remove('list-group-item-danger');
	}

	if (password.search(/(?=.*[A-Z])/) === -1) {
		requirement[2].classList.add('list-group-item-danger');
		requirement[2].classList.remove('list-group-item-success');
	} else {
		requirement[2].classList.add('list-group-item-success');
		requirement[2].classList.remove('list-group-item-danger');
	}

	if (password.search(/(?=.*\d)/) === -1) {
		requirement[3].classList.add('list-group-item-danger');
		requirement[3].classList.remove('list-group-item-success');
	} else {
		requirement[3].classList.add('list-group-item-success');
		requirement[3].classList.remove('list-group-item-danger');
	}

	if (password.search(/(?=.*\s)/) !== -1) {
		requirement[4].classList.add('list-group-item-danger');
		requirement[4].classList.remove('list-group-item-success');
	} else {
		requirement[4].classList.add('list-group-item-success');
		requirement[4].classList.remove('list-group-item-danger');
	}
	updateBtn();
};

const validRetypePassword = function () {
	const retypePassword = String(this.value);
	const password = document.querySelector('#password').value;
	if (retypePassword === password) {
		this.classList.add('is-valid');
		this.classList.remove('is-invalid');
		const element = $('#retypePasswordFeedback');
		element.classList.add('valid-feedback');
		element.classList.remove('invalid-feedback');
		element.innerText = 'Retype password matches password';
	} else {
		this.classList.add('is-invalid');
		this.classList.remove('is-valid');
		const element = $('#retypePasswordFeedback');
		element.classList.add('invalid-feedback');
		element.classList.remove('valid-feedback');
		element.innerText = 'The retype password is not similar!';
	}
	updateBtn();
};

const validName = function () {
	const n = String(this.value).length;
	if (2 <= n && n <= 20) {
		this.classList.add('is-valid');
		this.classList.remove('is-invalid');
		const element = $(`#${this.id}Feedback`);
		element.classList.add('valid-feedback');
		element.classList.remove('invalid-feedback');
		element.innerText = 'Valid name';
	} else {
		this.classList.add('is-invalid');
		this.classList.remove('is-valid');
		const element = $(`#${this.id}Feedback`);
		element.classList.add('invalid-feedback');
		element.classList.remove('valid-feedback');
		element.innerText =
			'The name need to be between 2 and 20 characters long!';
	}
	updateBtn();
};

let isValidQty = 1;
let validFeedbackQty = 1;
let listGroupItemSuccess = 5;

if (!$('.modal')) {
	$('#email').addEventListener('input', validEmail);
	$('#firstName').addEventListener('input', validName);
	$('#lastName').addEventListener('input', validName);
	isValidQty = 4;
	validFeedbackQty = 4;
}

$('#password').addEventListener('input', validPassword);
$('#retypePassword').addEventListener('input', validRetypePassword);

const updateBtn = function () {
	console.log(
		$$('.is-valid').length,
		$$('.valid-feedback').length,
		$$('.list-group-item-success').length
	);
	console.log(
		$$('.is-valid').length < isValidQty ||
			$$('.valid-feedback').length < validFeedbackQty ||
			$$('.list-group-item-success').length < listGroupItemSuccess
	);
	if (
		$$('.is-valid').length < isValidQty ||
		$$('.valid-feedback').length < validFeedbackQty ||
		$$('.list-group-item-success').length < listGroupItemSuccess
	) {
		$('#submit').disabled = true;
	} else {
		$('#submit').disabled = false;
	}
};

$('.form').onsubmit = function () {
	return (
		$$('.is-valid').length === isValidQty &&
		$$('.valid-feedback').length === validFeedbackQty &&
		$$('.list-group-item-success').length === listGroupItemSuccess
	);
};

$('.btn.btn-secondary').onclick = function () {
	$$('.list-group-item').forEach((item) => {
		item.classList.remove(
			'list-group-item-danger',
			'list-group-item-success'
		);
	});

	$$('.form-control').forEach((item) => {
		item.classList.remove('is-valid', 'is-invalid');
	});
};
