<?php



if (!isset($_SESSION['id_nguoidung'])) {

    header("Location: index.php?quanly=dangnhap");
    exit();
}


$id_phim = isset($_POST['id_phim']) ? (int)$_POST['id_phim'] : null;
$noidung_binhluan = isset($_POST['noidung_binhluan']) ? $_POST['noidung_binhluan'] : null;
$id_nguoidung = $_SESSION['id_nguoidung'];


if (!$id_phim || !$noidung_binhluan) {

    header("Location: index.php");
    exit();
}






$sql_insert_comment = "INSERT INTO binh_luan (id_phim, id_nguoidung, noidung) VALUES (?, ?, ?)";
$stmt = $mysqli->prepare($sql_insert_comment);


if ($stmt === false) {
    die("Lỗi câu truy vấn: " . $mysqli->error);
}


$stmt->bind_param("iis", $id_phim, $id_nguoidung, $noidung_binhluan);


$result = $stmt->execute();


if ($result) {


echo '<script>window.history.go(-1);</script>';
} else {

    echo "Lỗi: " . $stmt->error;
}


$stmt->close();
$mysqli->close();
?>
