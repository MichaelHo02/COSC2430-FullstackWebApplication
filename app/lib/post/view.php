<div class="container mt-3 d-none" id="post-factory">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-2">
        <form class="col w-75 ms-auto me-auto position-relative" action="?page=home" method="post" enctype="multipart/form-data">
    
            <div class="mb-3">
                <label for="imageUpload" name="uploadImg" class="form-label">Choose image to upload</label>
                <input type="file" name="uploadImg" id="imageUpload" class="form-control">
            </div>
    
            <div class="mb-3">
                <label for="postDesc" name="postDesc" class="form-label">Post description</label>
                <textarea class="form-control" name="postDesc" id="postDesc" rows="2" style="resize: none;"></textarea>
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
            <button name="submit" type="submit" class="btn btn-secondary post-submit post-cancel"><i class="bi bi-x-lg"></i></button>
        </form>

    </div>
</div>