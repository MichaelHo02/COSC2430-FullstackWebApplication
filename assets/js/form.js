const validEmail = function () {
	const email = String(this.value).toLowerCase();
	if (email.length === 0) {
		return 'Email is empty';
	}

	if (
		email.match(
			/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
		)
	) {
		return '';
	}
	return 'Invalid email';
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
};

const validRetypePassword = function () {
	const retypePassword = String(this.value);
	const password = document.querySelector('#password').value;
	return retypePassword === password
		? ''
		: 'The retype password is not similar!';
};

const validName = function () {
	const n = String(this.value).length;
	return 2 <= n && n <= 20
		? ''
		: 'The name need to be between 2 and 20 characters long';
};

document.querySelector('#password').addEventListener('input', validPassword);
