<?php include "./view/layout/header.php"; ?>


<h1>Chỉnh sửa phòng ban</h1>
<form method="post">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tên phòng ban</label>
        <div>
            <input type="text" class="form-control" name="name" value="<?=$value['name']?>" required>
        </div>
    </div>
    <div class="form-group row pt-3">
        <div>
            <button type="submit" name="submit" class="btn btn-primary">Cập Nhật</button>
        </div>
    </div>
</form>

<?php include "./view/layout/footer.php"; ?>