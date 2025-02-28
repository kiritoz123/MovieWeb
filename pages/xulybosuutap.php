<?php

if (isset($_SESSION['id_nguoidung'])) {
    $id_nguoidung = $_SESSION['id_nguoidung'];

    if (isset($_GET['action']) && $_GET['action'] == 'add_to_collection' && isset($_GET['id_phim'])) {
        $id_phim = $_GET['id_phim'];


        $sql_check_exist = "SELECT * FROM bo_suu_tap WHERE id_nguoidung = $id_nguoidung AND id_phim = $id_phim";
        $result_check_exist = $mysqli->query($sql_check_exist);

        if ($result_check_exist && $result_check_exist->num_rows == 0) {

            $sql_add_to_collection = "INSERT INTO bo_suu_tap (id_nguoidung, id_phim) VALUES ($id_nguoidung, $id_phim)";
            $result_add_to_collection = $mysqli->query($sql_add_to_collection);

            if ($result_add_to_collection) {
                echo '<script>alert("Thêm thành công!");window.location = window.history.go(-1);</script>';
            } else {
                echo "Lỗi khi thêm phim vào bộ sưu tập: " . $mysqli->error;
            }
        } else {
            echo "Phim đã có trong bộ sưu tập!";
        }
    }
}
?>
<?php

if (isset($_SESSION['id_nguoidung'])) {
    $id_nguoidung = $_SESSION['id_nguoidung'];

    if (isset($_GET['action']) && $_GET['action'] == 'remove_from_collection' && isset($_GET['id_phim'])) {
        $id_phim = $_GET['id_phim'];


        $sql_remove_from_collection = "DELETE FROM bo_suu_tap WHERE id_nguoidung = $id_nguoidung AND id_phim = $id_phim";
        $result_remove_from_collection = $mysqli->query($sql_remove_from_collection);

        if ($result_remove_from_collection) {
            echo '<script>alert("Xóa thành công!");window.location = window.history.go(-1);</script>';
        } else {
            echo "Lỗi khi xóa phim khỏi bộ sưu tập: " . $mysqli->error;
        }
    }
}
?>
