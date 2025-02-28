<?php

$id_phim = isset($_GET['id_phim']) ? $_GET['id_phim'] : null;
$id_phimle = isset($_GET['id_phimle']) ? $_GET['id_phimle'] : null;



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['capnhat'])) {

$result_phimle = $mysqli->query("SELECT * FROM phim_le WHERE id_phimle = $id_phimle");
if ($result_phimle && $result_phimle->num_rows > 0) {
    $phimle = $result_phimle->fetch_assoc();
} else {

    echo "Phimle data not found!";
    exit();
}

    $ten_phim = $_POST['ten_phim'];
    $nam_san_xuat = $_POST['nam_san_xuat'];
    $mo_ta = $_POST['mo_ta'];
    $quoc_gia_id = $_POST['quoc_gia_id'];
    $the_loai_ids = $_POST['the_loai_id'];
    $dao_dien_ids = $_POST['dao_dien'];
    $dien_vien_ids = $_POST['dien_vien'];
    $diem_danh_gia = $_POST['diem_danh_gia'];
    $link_trailer = $_POST['link_trailer'];
    $thoi_luong = $_POST['thoi_luong'];



    if (isset($_FILES['hinhanh']['name']) && !empty($_FILES['hinhanh']['name'])) {

        if (isset($phimle['hinh_anh']) && file_exists("modules/quanlyphim/uploads/img/" . $phimle['hinh_anh'])) {
            unlink("modules/quanlyphim/uploads/img/" . $phimle['hinh_anh']);
        }


        $hinhanh_file = $_FILES['hinhanh']['name'];
        move_uploaded_file($_FILES['hinhanh']['tmp_name'], "modules/quanlyphim/uploads/img/$hinhanh_file");


        $hinhanh_path = "$hinhanh_file";
        $mysqli->query("UPDATE phim SET hinh_anh = '$hinhanh_path' WHERE id_phim = $id_phim");
    }
    if (isset($_FILES['anh_bia']['name']) && !empty($_FILES['anh_bia']['name'])) {

        if (isset($phimbo['anh_bia']) && file_exists("modules/quanlyphim/uploads/img/" . $phimbo['anh_bia'])) {
            unlink("modules/quanlyphim/uploads/img/" . $phimbo['anh_bia']);
        }
    

        $anh_bia_file = $_FILES['anh_bia']['name'];
        move_uploaded_file($_FILES['anh_bia']['tmp_name'], "modules/quanlyphim/uploads/img/$anh_bia_file");
    

        $anh_bia_path = "$anh_bia_file";
        $mysqli->query("UPDATE phim SET anh_bia = '$anh_bia_path' WHERE id_phim = $id_phim");
    }

    if (isset($_FILES['video_file']['name']) && !empty($_FILES['video_file']['name'])) {

        if (isset($phimle['video_url']) && file_exists("modules/quanlyphim/quanlyphimle/uploads/video/" . $phimle['video_url'])) {
            unlink("modules/quanlyphim/quanlyphimle/uploads/video/" . $phimle['video_url']);
        }


        $video_file = $_FILES['video_file']['name'];
        $destination_directory = "modules/quanlyphim/quanlyphimle/uploads/video/";

        if (!file_exists($destination_directory)) {
            mkdir($destination_directory, 0777, true);
        }

        if (move_uploaded_file($_FILES['video_file']['tmp_name'], $destination_directory . $video_file)) {

            $video_url = $destination_directory . $video_file;
            $mysqli->query("UPDATE phim_le SET video_url = '$video_file' WHERE id_phimle = $id_phimle");
        } else {
            echo "Không thể tải lên tập tin video!";
            exit();
        }
    }


    $update_phim_query = "UPDATE phim SET
    ten_phim = '$ten_phim',
    nam_san_xuat = '$nam_san_xuat',
    mo_ta = '$mo_ta',
    diem_danh_gia = '$diem_danh_gia',
    link_trailer = '$link_trailer',
    thoi_luong = '$thoi_luong'
    WHERE id_phim = $id_phim";




    if ($mysqli->query($update_phim_query)) {

        $update_quocgia_phim_query = "UPDATE quocgia_phim SET id_quocgia = $quoc_gia_id WHERE id_phim = $id_phim";
        $mysqli->query($update_quocgia_phim_query);


        $mysqli->query("DELETE FROM theloai_phim WHERE id_phim = $id_phim");
        foreach ($the_loai_ids as $the_loai_id) {
            $mysqli->query("INSERT INTO theloai_phim (id_theloai, id_phim) VALUES ($the_loai_id, $id_phim)");
        }


        $mysqli->query("DELETE FROM daodien_phim WHERE id_phim = $id_phim");
        foreach ($dao_dien_ids as $dao_dien_id) {
            $mysqli->query("INSERT INTO daodien_phim (id_daodien, id_phim) VALUES ($dao_dien_id, $id_phim)");
        }


        $mysqli->query("DELETE FROM dienvien_phim WHERE id_phim = $id_phim");
        foreach ($dien_vien_ids as $dien_vien_id) {
            $mysqli->query("INSERT INTO dienvien_phim (id_dienvien, id_phim) VALUES ($dien_vien_id, $id_phim)");
        }


        echo "<script>alert('Thêm phim thành công!'); window.location = 'index.php?action=quanlyphimle&query=sua&id_phim=$id_phim&id_phimle=$id_phimle';</script>";
        exit();
    } else {

        echo "Có lỗi xảy ra khi cập nhật thông tin phim. Lỗi chi tiết: " . $mysqli->error;
    }
}

?>
<?php


if (isset($_GET['delete']) && $_GET['delete'] == 'xoa') {

    $id_phim = isset($_GET['id_phim']) ? $_GET['id_phim'] : null;
    $id_phimle = isset($_GET['id_phimle']) ? $_GET['id_phimle'] : null;


    $result_phimle = $mysqli->query("SELECT * FROM phim_le WHERE id_phimle = $id_phimle");
    if ($result_phimle && $result_phimle->num_rows > 0) {
        $phimle = $result_phimle->fetch_assoc();


        if (isset($phimle['hinh_anh']) && file_exists("modules/quanlyphim/uploads/img/" . $phimle['hinh_anh'])) {
            unlink("modules/quanlyphim/uploads/img/" . $phimle['hinh_anh']);
        }


        if (isset($phimle['video_url']) && file_exists("modules/quanlyphim/quanlyphimle/uploads/video/" . $phimle['video_url'])) {
            unlink("modules/quanlyphim/quanlyphimle/uploads/video/" . $phimle['video_url']);
        }
    }


    $mysqli->query("DELETE FROM theloai_phim WHERE id_phim = $id_phim");


    $mysqli->query("DELETE FROM daodien_phim WHERE id_phim = $id_phim");


    $mysqli->query("DELETE FROM dienvien_phim WHERE id_phim = $id_phim");


    $mysqli->query("DELETE FROM quocgia_phim WHERE id_phim = $id_phim");


    $mysqli->query("DELETE FROM phim_le WHERE id_phimle = $id_phimle");


    $mysqli->query("DELETE FROM phim WHERE id_phim = $id_phim");


    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit();
} else {
    echo "lỗi";
}

?>
