<?php include "./view/layout/header.php"; ?>
<h1>Danh sách tiền thuế theo tháng của nhân viên</h1>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên</th>
            <th scope="col">Thời gian</th>
            <th scope="col">Phòng ban</th>
            <th scope="col">Tiền lương</th>
            <th scope="col">Tiền thuế</th>
            <th scope="col">Hoạt động</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($values)) {
            $i = 1;
            foreach ($values as $value) :
        ?>
                <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?= $value->ho .' '.$value->ten ?></td>
                    <td><?= $value->thoi_gian?></td>
                    <td><?= $value->name?></td>
                    <td><?= number_format($value->luong)?></td>
                    <td><?= number_format($value->thue_TNCN)?></td>
                    <td>
                        <a onclick="return Del('<?= $value->ho .' '.$value->ten ?>')" href="/?controller=tax_month&action=delete&id=<?= $value->id_user; ?>">Xóa</a>
                    </td>
                </tr>
        <?php
                $i++;
            endforeach;
        }
        ?>
    </tbody>
</table>
<a href="/?controller=summary&action=index" class="btn btn-primary">Quyết toán</a>
<?php include "./view/layout/footer.php"; ?>