const userDbPath = '?func=adminFeed';
const userList = document.querySelector('.user-list');
const pagination = document.querySelector('.pagination');

let currentPage = 0;
let totalPages = 0;

function fetchAllUsers(callback) {
	fetch(userDbPath, {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json',
		},
	})
		.then((response) => {
			return response.json();
		})
		.then((data) => {
			callback(data);
		});
}

function filterData(data) {
	let result = [];

	let searchValue = searchUserInput.value.toString().toLowerCase();

	data.forEach((user) => {
		let email = user.email.toLowerCase();
		let firstName = user.firstName.toLowerCase();
		let lastName = user.lastName.toLowerCase();
		if (
			email.includes(searchValue) ||
			firstName.includes(searchValue) ||
			lastName.includes(searchValue)
		) {
			result.push(user);
		}
	});
	data = result;

	return result.reverse();
}

function renderPagination(data) {
	data = filterData(data);

	// Reset
	pagination.innerHTML = `
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    `;

	let totalUsers = data.length;

	if (totalUsers < 10) {
		// Disable pagination
		let pageItems = pagination.querySelectorAll('.page-item');
		pageItems[0].classList.add('disabled');
		pageItems[1].classList.add('disabled');
	} else {
		totalPages = Math.ceil(data.length / 10);
		renderPaginationItem(totalPages);
		addEventPagination(data);
		userList.innerHTML = '';
	}

	renderUIUser(data);
}

function renderPaginationItem(totalPages) {
	let allPageItems = pagination.querySelectorAll('.page-item');
	let lastElement = allPageItems[allPageItems.length - 1];
	for (let i = 0; i < totalPages; i++) {
		let currentIndex = i + 1;
		let html = `
            <li class="page-item"><a class="page-link" href="#">${currentIndex}</a></li>
        `;
		let para = document.createRange().createContextualFragment(html);
		pagination.insertBefore(para, lastElement);
	}
}

function addEventPagination(data) {
	let allPageItems = pagination.querySelectorAll('.page-item');
	allPageItems.forEach((item) => {
		item.onclick = (event) => {
			userList.innerHTML = ''; // Reset
			let content = event.target.textContent;
			if (content == 'Previous') {
				if (currentPage != 0) {
					currentPage--;
				}
			} else if (content == 'Next') {
				if (currentPage != totalPages - 1) {
					currentPage++;
				}
			} else {
				currentPage = content - 1;
			}
			renderUIUser(data);
		};
	});
}

function renderUIUser(data) {
	userList.innerHTML = '';
	activeCurrentPagination();
	for (let i = currentPage * 10; i < currentPage * 10 + 10; i++) {
		if (i == data.length) {
			break;
		}
		let id = data[i].id;
		let email = data[i].email;
		let firstName = data[i].firstName
		let lastName = data[i].lastName
		let html = `
            <li class="list-group-item" onclick="window.location.href = '?page=my_account&&id=${id}'">
                <span class="pe-1">
                    Email: ${email} | Name: ${firstName + ' ' + lastName}
                </span>
            </li>
        `;
		let para = document.createRange().createContextualFragment(html);
		userList.appendChild(para);
	}
}

function activeCurrentPagination() {
	if (totalPages > 1) {
		let currentBtn = pagination.querySelectorAll('.page-item');

		let prevBtn = currentBtn[0];
		let nextBtn = currentBtn[currentBtn.length - 1];
		if (prevBtn && prevBtn) {
			prevBtn.classList.remove('disabled');
			nextBtn.classList.remove('disabled');
		}
		currentBtn.forEach((btn) => {
			if (btn.textContent == currentPage + 1) {
				btn.classList.add('active');
			} else {
				btn.classList.remove('active');
			}
		});
		if (currentPage == totalPages - 1) {
			nextBtn.classList.add('disabled');
		} else if (currentPage == 0) {
			prevBtn.classList.add('disabled');
		}
	}
}

////////////////////////////////
const searchUserInput = document.querySelector('.search-user-input');
// const searchUserBtn = document.querySelector(".search-user-btn");

searchUserInput.addEventListener('input', (event) => {
	event.preventDefault();
	isSearching = true;
	currentPage = 0;
	totalPages = 0;
	fetchAllUsers(renderPagination);
});

fetchAllUsers(renderPagination);
