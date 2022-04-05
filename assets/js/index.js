const createPostBtn = document.querySelector(".create-post-btn");
const postFactory = document.querySelector("#post-factory");
const postBtn = postFactory.querySelector(".post-submit");
console.log(postFactory);

createPostBtn.addEventListener("click", function() {
    postFactory.classList.remove("d-none");
    createPostBtn.classList.add("d-none");
});

postBtn.addEventListener("click", function() {
    postFactory.classList.add("d-none");
    createPostBtn.classList.remove("d-none");
});