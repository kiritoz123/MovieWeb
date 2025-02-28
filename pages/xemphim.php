<?php

$id_phim = isset($_GET['id_phim']) ? (int)$_GET['id_phim'] : null;
$id_phimbo = isset($_GET['id_phimbo']) ? (int)$_GET['id_phimbo'] : null;
$id_phimle = isset($_GET['id_phimle']) ? (int)$_GET['id_phimle'] : null;
$tap_phim = isset($_GET['tap']) ? (int)$_GET['tap'] : null;
if (isset($_GET['id_phim'])) {

    $id_phim = $_GET['id_phim'];
    $queryUpdate = "UPDATE phim SET luot_xem = luot_xem + 1 WHERE id_phim = $id_phim";
    $resultUpdate = $mysqli->query($queryUpdate);
}
function getMovieDetails($mysqli, $id_phim, $id_phimbo = null, $id_phimle = null, $tap_phim = null) {
    $details = [];

    if ($id_phimbo !== null) {
        $sql = "SELECT pb.*, p.ten_phim, p.nam_san_xuat, p.mo_ta, p.loai_phim, p.hinh_anh, p.diem_danh_gia, p.link_trailer,
        GROUP_CONCAT(DISTINCT tl.ten_the_loai SEPARATOR ', ') as the_loai,
        GROUP_CONCAT(DISTINCT dv.ten_dien_vien SEPARATOR ', ') as dien_vien,
        'phim_bo' as loai,
        GROUP_CONCAT(DISTINCT tp.tap ORDER BY tp.tap ASC SEPARATOR ', ') as tap_phim,
        tp.url_video
FROM phim_bo pb
JOIN phim p ON pb.id_phim = p.id_phim
LEFT JOIN theloai_phim tpl ON pb.id_phim = tpl.id_phim
LEFT JOIN the_loai tl ON tpl.id_theloai = tl.id_theloai
LEFT JOIN dienvien_phim dp ON pb.id_phim = dp.id_phim
LEFT JOIN dien_vien dv ON dp.id_dienvien = dv.id_dienvien
LEFT JOIN daodien_phim ddp ON pb.id_phim = ddp.id_phim
LEFT JOIN dao_dien dd ON ddp.id_daodien = dd.id_daodien
LEFT JOIN tap_phim tp ON pb.id_phimbo = tp.id_phimbo
WHERE pb.id_phimbo = $id_phimbo
AND tp.tap = $tap_phim";

    } elseif ($id_phimle !== null) {
        $sql = "SELECT pl.*, p.ten_phim, p.nam_san_xuat, p.mo_ta, p.loai_phim, p.hinh_anh, p.diem_danh_gia, p.link_trailer,
                       GROUP_CONCAT(DISTINCT tl.ten_the_loai SEPARATOR ', ') as the_loai,
                       GROUP_CONCAT(DISTINCT dv.ten_dien_vien SEPARATOR ', ') as dien_vien,
                       'phim_le' as loai
                FROM phim_le pl
                JOIN phim p ON pl.id_phim = p.id_phim
                LEFT JOIN theloai_phim tpl ON pl.id_phim = tpl.id_phim
                LEFT JOIN the_loai tl ON tpl.id_theloai = tl.id_theloai
                LEFT JOIN dienvien_phim dp ON pl.id_phim = dp.id_phim
                LEFT JOIN dien_vien dv ON dp.id_dienvien = dv.id_dienvien
                LEFT JOIN daodien_phim ddp ON pl.id_phim = ddp.id_phim
                LEFT JOIN dao_dien dd ON ddp.id_daodien = dd.id_daodien
                WHERE pl.id_phimle = $id_phimle";

    } else {
        $sql = "SELECT p.*, 
                       GROUP_CONCAT(DISTINCT tl.ten_the_loai SEPARATOR ', ') as the_loai,
                       GROUP_CONCAT(DISTINCT dv.ten_dien_vien SEPARATOR ', ') as dien_vien,
                       'phim_le' as loai,
                       p.id_phim as id
                FROM phim p
                LEFT JOIN theloai_phim tpl ON p.id_phim = tpl.id_phim
                LEFT JOIN the_loai tl ON tpl.id_theloai = tl.id_theloai
                LEFT JOIN dienvien_phim dp ON p.id_phim = dp.id_phim
                LEFT JOIN dien_vien dv ON dp.id_dienvien = dv.id_dienvien
                LEFT JOIN daodien_phim ddp ON p.id_phim = ddp.id_phim
                LEFT JOIN dao_dien dd ON ddp.id_daodien = dd.id_daodien
                WHERE p.id_phim = $id_phim";
    }

    $result = $mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
        $details = $result->fetch_assoc();
    }

    return $details;
}

$movieDetails = getMovieDetails($mysqli, $id_phim, $id_phimbo, $id_phimle, $tap_phim);

?>
<main>
    <div class="container1234">
        <?php
        if (!empty($movieDetails)) {

            echo '<div class="video-container">';

            echo '<video class="responsive-video" controls autoplay loop preload="auto">';            
            if ($movieDetails["loai"] == 'phim_bo' && !empty($movieDetails["tap_phim"])) {
                echo '<source src="./admin/modules/quanlyphim/quanlyphimbo/uploads/video/' . $movieDetails["url_video"] . '" type="video/mp4">';
            } elseif ($movieDetails["loai"] == 'phim_le') {
                echo '<source src="./admin/modules/quanlyphim/quanlyphimle/uploads/video/' . $movieDetails["video_url"] . '" type="video/mp4">';
            }

            echo 'Your browser does not support the video tag.';
            echo '</video>';
            echo '<div class="server-list">';
            echo '<a href="" class="server123">Server 1</a>';

            echo '<a href="" class="server123">Server 2</a>';

            echo '<a href="" class="server123">Server 3</a>';

            echo '</div>';
            echo '<div class="thongtinphim123">';


            echo '<h1 class="tenpphim1234">' . $movieDetails["ten_phim"] . ' (' . $movieDetails["nam_san_xuat"] . ')</h1>';
            

            if ($movieDetails["loai"] == 'phim_bo' && !empty($movieDetails["id_phimbo"])) {

                $sql = "SELECT tap FROM tap_phim WHERE id_phimbo = " . $movieDetails["id_phimbo"];
                $result = $mysqli->query($sql);
            
                if ($result && $result->num_rows > 0) {
                    echo '<div class="tap-phim-container">';
                    echo '<ul class="tap-phim-list">';
            

                    while ($row = $result->fetch_assoc()) {
                        $tap = $row['tap'];
                        $tapLink = 'index.php?quanly=xemphim&id_phim=' . $id_phim . '&id_phimbo=' . $id_phimbo . '&tap=' . $tap;
                        

                        $activeClass = ($tap == $_GET['tap']) ? 'active' : '';
            
                        echo '<li class="tap-phim-item ' . $activeClass . '"><a href="' . $tapLink . '">Tập ' . $tap . '</a></li>';
                    }
            
                    echo '</ul>';
                    echo '</div>';
                }
            }
            
            
            

            echo '<p style="color:#fff; margin-top:20px;">Dưới đây là các phụ đề của phim này được hệ thống lấy tự động từ subscene.com. Nếu chọn được một phụ đề vừa ý (khớp thời gian & dịch chuẩn), hãy chọn phụ đề đó để lần sau xem lại phim, hệ thống sẽ tự động sử dụng phụ đề đó cho bạn!</p>';

            echo '<h1 class="binhluan321"><i class="fa-regular fa-comments"></i> Bình Luận Phim</h1>';
            
            if (isset($_SESSION['id_nguoidung'])) {
                echo '<form class="binhluan" action="index.php?quanly=binhluan&id_phim=' . $id_phim . '" method="post">';
                echo '    <textarea class="noidung_binhluan" name="noidung_binhluan" placeholder="Viết bình luận của bạn..."></textarea>';
                echo '    <input class="input_binhluan" type="hidden" name="id_phim" value="' . $id_phim . '">';
                echo '    <input class="input_binhluan123" type="submit" value="Gửi Bình Luận">';
                echo '</form>';
            } else {
                echo '<p style="color:#fff; margin-top:20px;">Vui lòng đăng nhập để bình luận. <a style="color:#ccc; margin-top:20px; border:1px solid #fff; padding:5px;width:140px;" href="index.php?quanly=dangnhap">Đăng nhập</a></p>';
            }
            ?>
            

<div class="binh-luan-container">
    <?php

    $sql_comments = "SELECT binh_luan.*, nguoi_dung.ten_nguoi_dung, nguoi_dung.avatar 
                     FROM binh_luan 
                     LEFT JOIN nguoi_dung ON binh_luan.id_nguoidung = nguoi_dung.id_nguoidung 
                     WHERE binh_luan.id_phim = $id_phim ORDER BY binh_luan.ngaybinhluan DESC";
    $result_comments = $mysqli->query($sql_comments);

    if ($result_comments && $result_comments->num_rows > 0) {
        while ($comment = $result_comments->fetch_assoc()) {
            echo '<div class="binh-luan-item">';
            echo '    <img src="./assets/images/' . $comment['avatar'] . '" alt="Avatar" class="avatar">';
            echo '    <div class="comment-content">';
            echo '    <p style="color:#fff;margin-bottom:10px;"><strong>' . $comment['ten_nguoi_dung'] . '</strong> - ' . $comment['ngaybinhluan'] . '</p>';
                        echo '        <p>' . $comment['noidung'] . '</p>';
            echo '    </div>';
            echo '</div>';
            
        }
    } else {
        echo '<p style="color:#fff; margin-top:20px;">Chưa có bình luận nào cho phim này.</p>';
    }}
    ?>
</div>
    </div>
</main>
