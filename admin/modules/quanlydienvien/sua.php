<?php

if ($mysqli->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $mysqli->connect_error);
}


if (isset($_GET['id_dienvien']) && $_GET['id_dienvien'] != '') {
    $id_dienvien = $_GET['id_dienvien'];


    $sql = "SELECT * FROM dien_vien WHERE id_dienvien = $id_dienvien";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();


        echo "
        <form action='index.php?action=quanlydienvien&query=xuly&update=capnhat&id_dienvien={$row['id_dienvien']}' method='post' enctype='multipart/form-data' class='phim-form'>
            <h2 class='mt-4 mb-4'>Sửa Thông Tin Diễn Viên</h2>

            <div class='form-group'>
                <label for='ten_dien_vien'>Tên diễn viên:</label>
                <input type='text' class='form-control' name='ten_dien_vien' value='{$row['ten_dien_vien']}' required>
            </div>

            <div class='form-group'>
                <label for='ngay_sinh'>Ngày sinh:</label>
                <input type='date' class='form-control' name='ngay_sinh' value='{$row['ngay_sinh']}' required>
            </div>

            <div class='form-group'>
                <label for='que_quan'>Quê quán:</label>
                <input type='text' class='form-control' name='que_quan' value='{$row['que_quan']}' required>
            </div>

            <div class='form-group'>
                <label for='gioi_tinh'>Giới tính:</label>
                <select class='form-control' name='gioi_tinh' required>
                    <option value='Nam' " . ($row['gioi_tinh'] == 'Nam' ? 'selected' : '') . ">Nam</option>
                    <option value='Nữ' " . ($row['gioi_tinh'] == 'Nữ' ? 'selected' : '') . ">Nữ</option>
                    <option value='Khác' " . ($row['gioi_tinh'] == 'Khác' ? 'selected' : '') . ">Khác</option>
                </select>
            </div>

            <div class='form-group'>
                <label for='nghe_nghiep'>Nghề nghiệp:</label>
                <input type='text' class='form-control' name='nghe_nghiep' value='{$row['nghe_nghiep']}' required>
            </div>

            <div class='form-group'>
                <label for='thong_tin'>Thông tin:</label>
                <textarea class='form-control' name='thong_tin' rows='4' required>{$row['thong_tin']}</textarea>
            </div>
            <img src='modules/quanlydienvien/uploads/img/{$row['dienvien_avatar']}' style='width:50px;' alt='Ảnh Bìa Cũ' class='img-thumbnail'>

            <div class='form-group'>
                <label for='dienvien_avatar'>Tải Avatar:</label>
                <input type='file' name='dienvien_avatar' accept='image
.containerss {
    max-width: 800px;
    margin: 0 auto;
}


.phim-form {
    margin-top: 20px;
}


.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th, .table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.table th {
    background-color: #f2f2f2;
}


.edit-btn, .delete-btn {
    display: inline-block;
    padding: 6px 12px;
    margin: 4px 0;
    font-size: 14px;
    cursor: pointer;
    text-decoration: none;
    color: #fff;
    border-radius: 4px;
}

.edit-btn {
    background-color: #4CAF50;
}

.delete-btn {
    background-color: #f44336;
}


.phim-form input[type="text"],
.phim-form input[type="date"],
.phim-form textarea,
.phim-form select,
.phim-form input[type="file"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

.phim-form button {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px 15px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}


@media (max-width: 600px) {
    .containerss {
        max-width: 100%;
    }
}

</style>