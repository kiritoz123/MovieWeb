<?php


$itemsPerPage = 20;


$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($current_page - 1) * $itemsPerPage;


$sql = "SELECT
            p.id_phim,
            p.ten_phim,
            p.nam_san_xuat,
            p.mo_ta,
            p.loai_phim,
            p.hinh_anh,
            p.created_at,
            p.diem_danh_gia,
            pb.id_phimbo,
            pl.id_phimle
        FROM phim p
        LEFT JOIN phim_bo pb ON p.id_phim = pb.id_phim
        LEFT JOIN phim_le pl ON p.id_phim = pl.id_phim
        ORDER BY p.created_at DESC
        LIMIT $start, $itemsPerPage;";

$result = $mysqli->query($sql);

$movies = [];

if ($result && $result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
}

$totalItems = $mysqli->query("SELECT COUNT(*) as total FROM phim")->fetch_assoc()['total'];
$totalPages = ceil($totalItems / $itemsPerPage);


$mysqli->close();
?>


    <main>
    <section class="top-rated" id="top">
            <div class="container">
                <h2 class="h2 section-title">Phim Mới</h2>

                <ul class="movies-list">
                    <?php foreach ($movies as $movie): ?>
                        <li>
                            <div class="movie-card">
                                <a href="index.php?quanly=details&id_phim=<?php echo $movie['id_phim']; ?>&<?php echo $movie['loai_phim'] == 0 ? 'id_phimle=' . $movie['id_phimle'] : 'id_phimbo=' . $movie['id_phimbo']; ?>">
                                    <figure class="card-banner">
                                        <img src="./admin/modules/quanlyphim/uploads/img/<?php echo $movie['hinh_anh']; ?>" alt="<?php echo $movie['ten_phim']; ?> movie poster">
                                    </figure>
                                </a>
                                <div class="title-wrapper">
                                    <a href="./movie-details.html">
                                        <h3 class="card-title"><?php echo $movie['ten_phim']; ?></h3>
                                    </a>
                                    <time datetime="<?php echo $movie['nam_san_xuat']; ?>"><?php echo $movie['nam_san_xuat']; ?></time>
                                </div>
                                <div class="card-meta">
                                    <div class="badge badge-outline">2K</div>
                                    <div class="duration"></div>
                                    <div class="rating">
                                        <ion-icon name="star"></ion-icon>
                                        <data><?php echo $movie['diem_danh_gia']; ?></data>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>

                    <?php if (empty($movies)): ?>
                        <li>Không có phim nào.</li>
                    <?php endif; ?>
                </ul>

                <div class="pagination">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="index.php?quanly=phimmoi&page=<?php echo $i; ?>" <?php if ($i == $current_page) echo 'class="active"'; ?>><?php echo $i; ?></a>
                    <?php endfor; ?>
                </div>
            </div>
        </section>
    </main>
    <!-- Bổ sung các tệp JavaScript hoặc thư viện của bạn tại đây -->
