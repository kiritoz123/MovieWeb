<?php




if (isset($_GET['id_dienvien'])) {
    $id_dienvien = $_GET['id_dienvien'];


    $sql_dienvien = "SELECT * FROM dien_vien WHERE id_dienvien = $id_dienvien";
    $result_dienvien = $mysqli->query($sql_dienvien);


    if ($result_dienvien->num_rows > 0) {
        $row_dienvien = $result_dienvien->fetch_assoc();
        ?>
        <main>
        <section class="tv-series">
            <section class="movie-details">
                <div class="container_123">
                <div class="left-column">
                    <img src="./admin/modules/quanlydienvien/uploads/img/<?php echo $row_dienvien['dienvien_avatar']; ?>" alt="Avatar diễn viên">
                    <h2 class="tt_123">Thông tin cá nhân</h2>
                    <h3 class="tt_123"> Nghề nghiệp: <?php echo $row_dienvien['nghe_nghiep']; ?></h3>
                    <h3 class="tt_123">Ngày sinh: <?php echo $row_dienvien['ngay_sinh']; ?></h3>
                    <h3 class="tt_123">Giới tính: <?php echo $row_dienvien['gioi_tinh']; ?></h3>
                    <h3 class="tt_123">Nơi sinh: <?php echo $row_dienvien['que_quan']; ?></h3>
                </div>
                <div class="right-column">
                    <div class="movie-detail-contents">
                        <h1 class="h1 detail-title"><?php echo $row_dienvien['ten_dien_vien']; ?></h1>
                        <div class="meta-wrappers">
                            <div class="badge-wrappers">
                                <div class="badge badge-fills">Tiểu sử</div>
                            </div>

                        </div>
                        <p class="tt_321"><?php echo $row_dienvien['thong_tin']; ?></p>
                        <h3 class="daodien">Các phim đã tham gia</h3>
                        <div class="director-container">
    <?php

    $sql_dienvien_phim = "SELECT phim.*, pb.id_phimbo, pl.id_phimle
        FROM phim
        LEFT JOIN dienvien_phim ON phim.id_phim = dienvien_phim.id_phim
        LEFT JOIN phim_bo pb ON phim.id_phim = pb.id_phim
        LEFT JOIN phim_le pl ON phim.id_phim = pl.id_phim
        WHERE (dienvien_phim.id_dienvien = $id_dienvien) AND (phim.loai_phim = 0 OR phim.loai_phim = 1)";

    $result_dienvien_phim = $mysqli->query($sql_dienvien_phim);

    if ($result_dienvien_phim && $result_dienvien_phim->num_rows > 0) {

        while ($row_dienvien_phim = $result_dienvien_phim->fetch_assoc()) {
            echo '<div class="movie-item">';
            echo '<a href="index.php?quanly=details&id_phim=' . $row_dienvien_phim['id_phim'] . '&';
            

            $id_phimle = isset($row_dienvien_phim['id_phimle']) ? $row_dienvien_phim['id_phimle'] : '';
            $id_phimbo = isset($row_dienvien_phim['id_phimbo']) ? $row_dienvien_phim['id_phimbo'] : '';
            
            echo ($row_dienvien_phim['loai_phim'] == 0 ? 'id_phimle=' . $id_phimle : 'id_phimbo=' . $id_phimbo) . '">';
            
            echo '<img class="anh_avc" src="./admin/modules/quanlyphim/uploads/img/' . $row_dienvien_phim['hinh_anh'] . '" alt="Ảnh phim">';
            echo '<h4 class="tenphim321">' . $row_dienvien_phim['ten_phim'] . '</h4>';
            echo '</a>';
            echo '</div>';
        }
    } else {
        echo 'Không có phim nào.';
    }
    ?>
</div>

                    </div>

                </div>
                </div>
                <!-- #region -->
            </section>
        </section>
        </main>
        <?php
    } else {
        echo "Không tìm thấy thông tin diễn viên.";
    }
} else {
    echo "Vui lòng chọn một diễn viên để xem thông tin.";
}


$mysqli->close();
?>
