<?php


$action = isset($_GET['action']) ? $_GET['action'] : '';
if ($action == 'quanlyquocgia' && isset($_GET['query']) && $_GET['query'] == 'xuly') {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['suaquocgia'])) {
        $quoc_gia_id = $_GET['id'];
        $new_country_name = $_POST['ten_quoc_gia'];


        $update_query = "UPDATE quoc_gia SET ten_quoc_gia = '$new_country_name' WHERE id_quocgia = $quoc_gia_id";
        $update_result = $mysqli->query($update_query);

        if ($update_result) {
            echo "<script>alert('Sửa thành công!'); window.location = 'index.php?action=quanlyquocgia&query=lietke'</script>";
        } else {
            echo 'Lỗi cập nhật: ' . $mysqli->error;
        }
    }
}

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'quanlyquocgia' && isset($_GET['query']) && $_GET['query'] == 'xuly') {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['themquocgia'])) {
        $ten_quoc_gia = $_POST["ten_quoc_gia"];


        if (empty($ten_quoc_gia)) {
            echo "Vui lòng nhập tên quốc gia.";
        } else {

            $query = "INSERT INTO quoc_gia (ten_quoc_gia) VALUES ('$ten_quoc_gia')";


            if ($mysqli->query($query)) {
                echo "<script>alert('Thêm thành công!'); window.location = 'index.php?action=quanlyquocgia&query=lietke'</script>";
            } else {
                echo "Lỗi: " . $mysqli->error;
            }
        }
    }
}

$action = isset($_GET['action']) ? $_GET['action'] : '';
if ($action == 'quanlyquocgia' && isset($_GET['query'])) {
    if ($_GET['query'] == 'xuly') {

        if (isset($_GET['id']) && isset($_GET['xoa']) && $_GET['xoa'] == 1) {
            $quoc_gia_id = $_GET['id'];


            $delete_query = "DELETE FROM quoc_gia WHERE id_quocgia = $quoc_gia_id";
            $delete_result = $mysqli->query($delete_query);

            if ($delete_result) {
                echo "<script>alert('Xóa thành công!'); window.location = 'index.php?action=quanlyquocgia&query=lietke'</script>";
            } else {
                echo 'Lỗi xóa: ' . $mysqli->error;
            }
        }
    }
}

?>
