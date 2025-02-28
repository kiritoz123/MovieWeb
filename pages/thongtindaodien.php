<?php



if (isset($_GET['id_daodien'])) {
    $id_daodien = $_GET['id_daodien'];


    $sql_daodien = "SELECT * FROM dao_dien WHERE id_daodien = $id_daodien";
    $result_daodien = $mysqli->query($sql_daodien);


    if ($result_daodien->num_rows > 0) {
        $row_daodien = $result_daodien->fetch_assoc();
        ?>
        <main>
        <section class="tv-series">
            <section class="movie-details">
                <div class="container_123">
                <div class="left-column">
                    <img src="./admin/modules/quanlydaodien/uploads/img/<?php echo $row_daodien['daodien_avatar']; ?>" alt="Avatar đạo diễn">
                    <h2 class="tt_123">Thông tin cá nhân</h2>
                    <h3 class="tt_123"> Nghề nghiệp: <?php echo $row_daodien['nghe_nghiep']; ?></h3>
                    <h3 class="tt_123">Ngày sinh: <?php echo $row_daodien['ngay_sinh']; ?></h3>
                    <h3 class="tt_123">Giới tính: <?php echo $row_daodien['gioi_tinh']; ?></h3>
                    <h3 class="tt_123">Nơi sinh: <?php echo $row_daodien['que_quan']; ?></h3>
                </div>
                <div class="right-column">
                    <div class="movie-detail-contents">
                        <h1 class="h1 detail-title"><?php echo $row_daodien['ten_dao_dien']; ?></h1>
                        <div class="meta-wrappers">
                            <div class="badge-wrappers">
                                <div class="badge badge-fills">Tiểu sử</div>
                            </div>
                        </div>
                        <p class="tt_321"><?php echo $row_daodien['thong_tin']; ?></p>
                        <h3 class="daodien">Các phim đã tham gia</h3>
                        <div class="director-container">
                        <?php

$sql_daodien_phim = "SELECT phim.*, pb.id_phimbo, pl.id_phimle
                    FROM phim
                    LEFT JOIN daodien_phim ON phim.id_phim = daodien_phim.id_phim
                    LEFT JOIN phim_bo pb ON phim.id_phim = pb.id_phim
                    LEFT JOIN phim_le pl ON phim.id_phim = pl.id_phim
                    WHERE (daodien_phim.id_daodien = $id_daodien) AND (phim.loai_phim = 0 OR phim.loai_phim = 1)";

$result_daodien_phim = $mysqli->query($sql_daodien_phim);

if ($result_daodien_phim && $result_daodien_phim->num_rows > 0) {

    while ($row_daodien_phim = $result_daodien_phim->fetch_assoc()) {
        echo '<div class="movie-item">';
        echo '<a href="index.php?quanly=details&id_phim=' . $row_daodien_phim['id_phim'] . '&';
        

        $id_phimle = isset($row_daodien_phim['id_phimle']) ? $row_daodien_phim['id_phimle'] : '';
        $id_phimbo = isset($row_daodien_phim['id_phimbo']) ? $row_daodien_phim['id_phimbo'] : '';
        
        echo ($row_daodien_phim['loai_phim'] == 0 ? 'id_phimle=' . $id_phimle : 'id_phimbo=' . $id_phimbo) . '">';
        
        echo '<img class="anh_avc" src="./admin/modules/quanlyphim/uploads/img/' . $row_daodien_phim['hinh_anh'] . '" alt="Ảnh phim">';
        echo '<h4 class="tenphim321">' . $row_daodien_phim['ten_phim'] . '</h4>';
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
        echo "Không tìm thấy thông tin đạo diễn.";
    }
} else {
    echo "Vui lòng chọn một đạo diễn để xem thông tin.";
}


$mysqli->close();
?>
