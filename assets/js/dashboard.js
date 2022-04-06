const userList = document.querySelector(".user-list")
const userDbPath = "./adminFeed.php";
const pagination = document.querySelector(".pagination");
let currentPage = 0;

fetchAllUsers(renderPagination);

function fetchAllUsers(callback) {
    fetch(userDbPath, {
        method: "GET",
        headers: {
        "Content-Type": "application/json"
        }
    })
    .then(response => response.json())
    .then(data => {
        callback(data);
    })
}

function renderPagination(data) {
    // Reset
    pagination.innerHTML = `
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    `;

    let totalUsers = data.length;

    if (totalUsers < 10) { // Disable pagination
        let pageItems = pagination.querySelectorAll('.page-item');
        pageItems.forEach(item => {
            item.classList.add('disabled');
        });
    } else {
        let totalPages = Math.ceil(data.length / 10);
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
        `
        let para = document.createRange().createContextualFragment(html);
        pagination.insertBefore(para, lastElement);
    }


}

function addEventPagination(data) {
    let allPageItems = pagination.querySelectorAll('.page-item');
    allPageItems.forEach(item => {
        item.addEventListener('click', (event) => {
            userList.innerHTML = ''; // Reset
            let content = event.target.textContent;
            if (content == "Previous") {
                currentPage = Math.abs(--currentPage);
            } else if (content == "Next") {
                currentPage = Math.round((currentPage + 1) % (allPageItems.length - 2));
            } else {
                currentPage = content - 1;
            }
            renderUIUser(data)
        })
    })
}

function renderUIUser(data) {

    console.log(data);
    console.log(currentPage)
    activeCurrentPagination();
    for (let i = currentPage * 10; i < currentPage * 10 + 10; i++) {
        if (i == data.length) {
            break;
        }
        let id = data[i].id;
        let email = data[i].email;
        let html = `
        <li class="list-group-item"><span class="pe-1">Id: ${id},</span>Email: ${email}</li>
        `
        let para = document.createRange().createContextualFragment(html);
        userList.appendChild(para);
    }
}

function activeCurrentPagination() {
    let currentBtn = pagination.querySelectorAll('.page-item');
    currentBtn.forEach(btn => {
        if (btn.textContent == currentPage + 1) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }
    })
}