const createPostBtn = document.querySelector(".create-post-btn");
const postFactory = document.querySelector("#post-factory");
const postBtn = postFactory.querySelector(".post-submit");
const cancelBtn = document.querySelector(".post-cancel");

createPostBtn.addEventListener("click", function() {
    postFactory.classList.remove("d-none");
    createPostBtn.classList.add("d-none");
});

postBtn.addEventListener("click", function() {
    postFactory.classList.add("d-none");
    createPostBtn.classList.remove("d-none");
});

cancelBtn.addEventListener("click", function(event) {
    event.preventDefault();
    postFactory.classList.add("d-none");
    createPostBtn.classList.remove("d-none");
})