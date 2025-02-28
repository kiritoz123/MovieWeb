<?php


if ($mysqli->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $mysqli->connect_error);
}

if (isset($_POST['themdaodien'])) {

    $ten_dao_dien = $_POST['ten_dao_dien'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $que_quan = $_POST['que_quan'];
    $nghe_nghiep = $_POST['nghe_nghiep'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $thong_tin = $_POST['thong_tin'];


    $avatar_name = $_FILES['daodien_avatar']['name'];
    $avatar_tmp = $_FILES['daodien_avatar']['tmp_name'];
    $avatar_path = "modules/quanlydaodien/uploads/img/" . $avatar_name;

    move_uploaded_file($avatar_tmp, $avatar_path);


    $sql = "INSERT INTO dao_dien (ten_dao_dien, ngay_sinh, que_quan, nghe_nghiep, gioi_tinh, thong_tin, daodien_avatar)
            VALUES ('$ten_dao_dien', '$ngay_sinh', '$que_quan', '$nghe_nghiep', '$gioi_tinh', '$thong_tin', '$avatar_name')";

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Thêm thành công!'); window.location = 'index.php?action=quanlydaodien&query=lietke'</script>";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $mysqli->error;
    }
}
if (isset($_POST['capnhatdaodien'])) {

    $id_daodien = $_GET['id_daodien'];
    $ten_dao_dien = $_POST['ten_dao_dien'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $que_quan = $_POST['que_quan'];
    $nghe_nghiep = $_POST['nghe_nghiep'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $thong_tin = $_POST['thong_tin'];

    if (isset($_FILES['daodien_avatar']['name']) && !empty($_FILES['daodien_avatar']['name'])) {

        if (isset($row['daodien_avatar']) && file_exists("modules/quanlydaodien/uploads/img/" . $row['daodien_avatar'])) {
            unlink("modules/quanlydaodien/uploads/img/" . $row['daodien_avatar']);
        }
    

        $avatar_file = $_FILES['daodien_avatar']['name'];
        move_uploaded_file($_FILES['daodien_avatar']['tmp_name'], "modules/quanlydaodien/uploads/img/$avatar_file");
    

        $avatar_path = "$avatar_file";
        $mysqli->query("UPDATE dao_dien SET daodien_avatar = '$avatar_path' WHERE id_daodien = $id_daodien");
    }
    

    $sql = "UPDATE dao_dien 
            SET ten_dao_dien='$ten_dao_dien', ngay_sinh='$ngay_sinh', que_quan='$que_quan', nghe_nghiep='$nghe_nghiep', gioi_tinh='$gioi_tinh', thong_tin='$thong_tin'
            WHERE id_daodien=$id_daodien";

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Cập nhật thành công!'); window.location = 'index.php?action=quanlydaodien&query=lietke'</script>";
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $mysqli->error;
    }
}




if (isset($_GET['delete']) && $_GET['delete'] == 'xoa' && isset($_GET['id_daodien'])) {
    $id_daodien = $_GET['id_daodien'];


    $sql = "DELETE FROM dao_dien WHERE id_daodien=$id_daodien";

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Xóa thành công!'); window.location = 'index.php?action=quanlydaodien&query=lietke'</script>";
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $mysqli->error;
    }
}

?>
