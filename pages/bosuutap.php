<?php



if (!isset($_SESSION['id_nguoidung'])) {
    header("Location: index.php?quanly=dangnhap");
    exit();
}


$id_nguoidung = $_SESSION['id_nguoidung'];


?>
        <section class="tv-series">
        <div class="container">
        <h2 class="h2 section-title">Bộ Sưu Tập</h2>
<ul class="movies-list">

    <?php

    $sql_bo_suu_tap = "SELECT phim.*, pb.id_phimbo, pl.id_phimle
        FROM phim
        LEFT JOIN bo_suu_tap ON phim.id_phim = bo_suu_tap.id_phim
        LEFT JOIN phim_bo pb ON phim.id_phim = pb.id_phim
        LEFT JOIN phim_le pl ON phim.id_phim = pl.id_phim
        WHERE (bo_suu_tap.id_nguoidung = $id_nguoidung) AND (phim.loai_phim = 0 OR phim.loai_phim = 1)";

    $result_bo_suu_tap = $mysqli->query($sql_bo_suu_tap);

    if ($result_bo_suu_tap && $result_bo_suu_tap->num_rows > 0) {

        while ($row_bo_suu_tap = $result_bo_suu_tap->fetch_assoc()) {
            echo '<div class="movie-card">';
            echo '<a href="index.php?quanly=details&id_phim=' . $row_bo_suu_tap['id_phim'] . '&';
            

            $id_phimle = isset($row_bo_suu_tap['id_phimle']) ? $row_bo_suu_tap['id_phimle'] : '';
            $id_phimbo = isset($row_bo_suu_tap['id_phimbo']) ? $row_bo_suu_tap['id_phimbo'] : '';
            
            echo ($row_bo_suu_tap['loai_phim'] == 0 ? 'id_phimle=' . $id_phimle : 'id_phimbo=' . $id_phimbo) . '">';
            echo '<figure class="card-banner">';
            echo '<img src="./admin/modules/quanlyphim/uploads/img/' . $row_bo_suu_tap['hinh_anh'] . '" alt="Ảnh phim">';
            echo '</figure>';
            echo '</a>';
            echo '<div class="title-wrapper">';
            echo '<a href="index.php?quanly=details&id_phim=' . $row_bo_suu_tap['id_phim'] . '&' . ($row_bo_suu_tap['loai_phim'] == 0 ? 'id_phimle=' . $id_phimle : 'id_phimbo=' . $id_phimbo) . '">';
            echo '<h3 class="card-title">' . $row_bo_suu_tap['ten_phim'] . '</h3>';
            echo '</a>';
            echo '<time datetime="' . $row_bo_suu_tap['nam_san_xuat'] . '">' . $row_bo_suu_tap['nam_san_xuat'] . '</time>';
            echo '</div>';
            echo '<div class="card-meta">';
            echo '<div class="badge badge-outline">2K</div>';
            echo '<div class="duration">';

            echo '</div>';
            echo '<div class="rating">';
            echo '<ion-icon name="star"></ion-icon>';
            echo '<data>' . $row_bo_suu_tap['diem_danh_gia'] . '</data>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            
        }
    } else {
        echo 'Bộ sưu tập của bạn hiện đang trống.';
    }
    ?>
</div>
</ul>
        </div>
        </section>