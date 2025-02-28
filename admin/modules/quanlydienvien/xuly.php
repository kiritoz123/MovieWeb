<?php

if ($mysqli->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $mysqli->connect_error);
}


if (isset($_POST['themdienvien'])) {

    $ten_dien_vien = $_POST['ten_dien_vien'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $que_quan = $_POST['que_quan'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $nghe_nghiep = $_POST['nghe_nghiep'];
    $thong_tin = $_POST['thong_tin'];


    $avatar_name = $_FILES['dienvien_avatar']['name'];
    $avatar_tmp = $_FILES['dienvien_avatar']['tmp_name'];
    $avatar_path = "modules/quanlydienvien/uploads/img/" . $avatar_name;

    move_uploaded_file($avatar_tmp, $avatar_path);


    $sql = "INSERT INTO dien_vien (ten_dien_vien, ngay_sinh, que_quan, gioi_tinh, nghe_nghiep, thong_tin, dienvien_avatar)
            VALUES ('$ten_dien_vien', '$ngay_sinh', '$que_quan', '$gioi_tinh', '$nghe_nghiep', '$thong_tin', '$avatar_name')";

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Thêm thành công!'); window.location = 'index.php?action=quanlydienvien&query=lietke'</script>";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $mysqli->error;
    }
}


if (isset($_POST['capnhatdienvien'])) {

    $id_dienvien = $_GET['id_dienvien'];
    $ten_dien_vien = $_POST['ten_dien_vien'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $que_quan = $_POST['que_quan'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $nghe_nghiep = $_POST['nghe_nghiep'];
    $thong_tin = $_POST['thong_tin'];

    if (isset($_FILES['dienvien_avatar']['name']) && !empty($_FILES['dienvien_avatar']['name'])) {

        if (isset($row['dienvien_avatar']) && file_exists("modules/quanlydienvien/uploads/img/" . $row['dienvien_avatar'])) {
            unlink("modules/quanlydienvien/uploads/img/" . $row['dienvien_avatar']);
        }
    

        $avatar_file = $_FILES['dienvien_avatar']['name'];
        move_uploaded_file($_FILES['dienvien_avatar']['tmp_name'], "modules/quanlydienvien/uploads/img/$avatar_file");
    

        $avatar_path = "$avatar_file";
        $mysqli->query("UPDATE dien_vien SET dienvien_avatar = '$avatar_path' WHERE id_dienvien = $id_dienvien");
    }
    

    $sql = "UPDATE dien_vien 
            SET ten_dien_vien='$ten_dien_vien', ngay_sinh='$ngay_sinh', que_quan='$que_quan', gioi_tinh='$gioi_tinh', nghe_nghiep='$nghe_nghiep', thong_tin='$thong_tin'
            WHERE id_dienvien=$id_dienvien";

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Cập nhật thành công!'); window.location = 'index.php?action=quanlydienvien&query=lietke'</script>";
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $mysqli->error;
    }
}


if (isset($_GET['delete']) && $_GET['delete'] == 'xoa' && isset($_GET['id_dienvien'])) {
    $id_dienvien = $_GET['id_dienvien'];


    $sql = "DELETE FROM dien_vien WHERE id_dienvien=$id_dienvien";

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Xóa thành công!'); window.location = 'index.php?action=quanlydienvien&query=lietke'</script>";
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $mysqli->error;
    }
}


$mysqli->close();
?>
