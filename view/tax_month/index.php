<?php include "./view/layout/header.php"; ?>
<?php if (!isset($thue)): ?>
    <h1>TÍNH THUẾ THU NHẬP CÁ NHÂN THEO THÁNG</h1>
    <form method="post">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Họ</label>
            <div>
                <input type="text" class="form-control" name="first_name" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên</label>
            <div>
                <input type="text" class="form-control" name="last_name" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Thời gian nhận lương</label>
            <div>
                <input type="date" class="form-control" name="time" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Phòng ban</label>
            <div>
                <select name="department" id="department">
                    <option value="">-- Chọn Phòng Ban --</option>
                    <?php
                    if (isset($department)) {
                        foreach ($department as $value) :
                            ?>
                            <option value="<?= $value->id_phong_ban ?>"><?= $value->name ?></option>
                        <?php
                        endforeach;
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Thu nhập cá nhân</label>
            <div>
                <input type="number" class="form-control" name="salary" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Lương đóng bảo hiểm</label>
            <div>
                <input type="number" class="form-control" name="insurrance" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Số người phụ thuộc</label>
            <div>
                <input type="number" class="form-control" name="dependent_person" required>
            </div>
        </div>

        <div class="form-group row pt-3">
            <div>
                <button type="submit" name="calculate" class="btn btn-primary">Tính thuế TNCN</button>
            </div>
        </div>
    </form><br>

<?php else: ?>
    <h2>Thuế Nhân Viên Cần Đóng Là:<?= number_format($thue) ?>VND</h2>

<?php endif; ?>
<?php include "./view/layout/footer.php"; ?>