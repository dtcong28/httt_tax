<?php include "./view/layout/header.php"; ?>
<form method="POST" enctype="multipart/form-data">
    <div class="dsp form-group">
        <h2>Upload File Excel Lương Của Nhân Viên</h2>
        <input type="file" name="file" class="form-control">
    </div>
    <div class="dsp form-group">
        <button type="submit" name="Submit" class="btn btn-success m-4">Upload</button>
    </div>
    
</form>
<?php include "./view/layout/footer.php"; ?>