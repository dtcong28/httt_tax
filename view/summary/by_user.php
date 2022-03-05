<?php include "./view/layout/header.php"; ?>
<?php if (isset($filter_data)) : ?>
    <h1>Quyết toán của nhân viên </h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên</th>
                <th scope="col">Thời gian</th>
                <th scope="col">Tiền Lương</th>
                <th scope="col">Tiền thuế</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $tong_thue = 0;
            $i = 1;
            foreach ($filter_data as $value) :
            ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $value->ho . ' ' . $value->ten ?></td>
                    <td><?= $value->thoi_gian ?></td>
                    <td><?= number_format($value->luong) ?> VND</td>
                    <td><?= number_format($value->thue_TNCN) ?> VND</td>
                </tr>
            <?php
                $tong_thue = $tong_thue + $value->thue_TNCN;
                $i++;
            endforeach;

            ?>
        </tbody>
    </table>
    <h3>Tổng thuế thu nhập của nhân viên là: <?= number_format($tong_thue) ?> VND</h3>
<?php else : ?>
    <h1>Quyết toán theo cá nhân</h1>
    <form method="post">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nhân viên</label>
            <div>
                <select name="employee" id="employee">
                    <option value="">-- Chọn Nhân viên --</option>
                    <?php
                    if (isset($data)) {
                        foreach ($data as $value) :
                    ?>
                            <option value="<?= $value->ho . ' ' . $value->ten ?>"><?= $value->ho . ' ' . $value->ten ?></option>
                    <?php
                        endforeach;
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Thời gian bắt đầu</label>
            <div>
                <input type="date" class="form-control" name="start_time" required>
            </div>
            <label class="col-sm-2 col-form-label">Thời gian kết thúc</label>
            <div>
                <input type="date" class="form-control" name="end_time" required>
            </div>
        </div>
        <div class="form-group row pt-3">
            <div>
                <button type="submit" name="submit" class="btn btn-primary">Kết quả</button>
            </div>
        </div>
    </form>
<?php endif; ?>
<?php include "./view/layout/footer.php"; ?>