<div class="container mt-3">
    <form action="" method="post">

        <div class="mb-3">
            <label for="imageUpload" class="form-label">Choose image to upload</label>
            <input type="file" name="" id="imageUpload" class="form-control">
        </div>

        <div class="mb-3">
            <label for="post-desc" class="form-label">Photo description</label>
            <textarea class="form-control" id="post-desc" rows="3" style="resize: none;"></textarea>
        </div>

        <div class="mb-3 w-25">
            <label for="sharinglev" class="form-label">Sharing level</label>
            <select id="sharinglev" class="form-select form-select w-50">
                
                <option value="public">Public</option>
                <option value="internal">Internal</option>
                <option value="private">Private</option>
            </select>
        </div>

        <button name="submit" type="submit" class="btn btn-primary post-submit"><i class="bi bi-send me-2"></i>Post</button>
    </form>
</div>