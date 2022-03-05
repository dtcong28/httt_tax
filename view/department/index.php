<?php include "./view/layout/header.php"; ?>
<h1>Danh sách phòng ban</h1><br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Phòng Ban</th>
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
                    <th scope="row"><?= $i ?></th>
                    <td><?= $value->name ?></td>
                    <td>
                        <a href="/?controller=department&action=edit&id=<?= $value->id_phong_ban; ?>">Sửa</a>
                    </td>
                    <td>
                        <a onclick="return Del('<?= $value->name; ?>')" href="/?controller=department&action=delete&id=<?= $value->id_phong_ban; ?>">Xóa</a>
                    </td>
                </tr>
        <?php
                $i++;
            endforeach;
        }
        ?>
    </tbody>
</table>
<a href="/?controller=department&action=add" class="btn btn-primary">Thêm mới</a>
<?php include "./view/layout/footer.php"; ?>