
let dbPath = "./include/feed.php";
const newFeed = document.querySelector('.new-feed-wrapper');
console.log(newFeed)
console.log(document.cookie);

fetchAllPhoto(renderFeed)

function fetchAllPhoto(callback) {
    fetch(dbPath, {
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

function renderFeed(data) {
    console.log(data);
    // Idea: load 8 imgs, after certain scroll -> load more
    data.forEach(photo => {
        let photoUrl = "./assets/img/storage/" + photo.photoId + "." + photo.photoExt;
        let html = `
        <div class="card col-lg-12 col-md-12 col-sm-12 pt-0 ps-0 pe-0 rounded-0">
            <img src="${photoUrl}" class="card-img-top" alt="...">
            <div class="card-body">
                <!-- <h5 class="card-title">Card title</h5> -->
                <p class="card-text text-truncate">${photo.photoDesc}</p>
                <a href="#" class="btn btn-primary rounded-pill">Go somewhere</a>
            </div>
        </div>
        `
        let para = document.createRange().createContextualFragment(html);
        newFeed.appendChild(para);
    })

}