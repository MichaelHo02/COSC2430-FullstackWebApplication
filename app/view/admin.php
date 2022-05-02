<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-10 col-sm-12 mt-4">
            <h2>User list</h2>
            <ul class="list-group user-list">
            </ul>
        </div>
        <div aria-label="Page navigation" class="d-flex mt-2 mb-3 justify-content-center">
            <ul class="pagination">
                <li class="page-item prev-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item next-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>
    </div>
</div>

<script src="./assets/js/dashboard.js" defer></script>

<?php
configComponent($postDB, $userDB, $page, 'assets/img/');
?>