<div class="container mt-3 d-none" id="post-factory">
    <form class="col-sm-12 col-lg-6 ms-auto me-auto" action="./include/post_factory_handler.php" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="imageUpload" name="uploadImg" class="form-label">Choose image to upload</label>
            <input type="file" name="uploadImg" id="imageUpload" class="form-control">
        </div>

        <div class="mb-3">
            <label for="photoDesc" name="photoDesc" class="form-label">Photo description</label>
            <textarea class="form-control" name="photoDesc" id="photoDesc" rows="2" style="resize: none;"></textarea>
        </div>

        <div class="mb-3 w-50">
            <label for="sharinglev" class="form-label">Sharing level</label>
            <select id="sharinglev" name="sharingLev" class="form-select form-select w-50">
                <option value="public">Public</option>
                <option value="internal">Internal</option>
                <option value="private">Private</option>
            </select>
        </div>

        <button name="submit" type="submit" class="btn btn-primary post-submit"><i class="bi bi-send me-2"></i>Post</button>
    </form>
</div>