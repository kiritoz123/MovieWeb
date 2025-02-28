<main>
    <section class="tv-series">
        <div class="container">
        <div class="loc1234">
    <ul class="filter-lists" id="filter-form">
        <li>
            <label class="loc123" for="loai_phim">Loại phim:</label>
            <select class="loc123" name="loai_phim" id="loai_phim">
                <option value="all">Tất cả</option>
                <option value="0">Phim Lẻ</option>
                <option value="1">Phim Bộ</option>
            </select>
        </li>

        <?php

$sql = "SELECT id_theloai, ten_the_loai FROM the_loai";
$result = $mysqli->query($sql);


$theLoaiOptions = [];


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $theLoaiOptions[] = "<option value='" . $row['id_theloai'] . "'>" . $row['ten_the_loai'] . "</option>";
    }
}
?>

<li>
    <label class="loc123" for="the_loai">Thể loại:</label>
    <select class="loc123" name="the_loai" id="the_loai">
        <option value="all">Tất cả</option>
        <?php
        foreach ($theLoaiOptions as $option) {
            echo $option;
        }
        ?>
    </select>
</li>



<?php



$sql = "SELECT id_quocgia, ten_quoc_gia FROM quoc_gia";
$result = $mysqli->query($sql);


$quocGiaOptions = [];


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $quocGiaOptions[] = "<option value='" . $row['id_quocgia'] . "'>" . $row['ten_quoc_gia'] . "</option>";
    }
}
?>

<li>
    <label class="loc123" for="quoc_gia">Quốc gia:</label>
    <select class="loc123" name="quoc_gia" id="quoc_gia">
        <option value="all">Tất cả</option>
        <?php
        foreach ($quocGiaOptions as $option) {
            echo $option;
        }
        ?>
    </select>
</li>



        <li>
            <label class="loc123" for="nam_san_xuat">Năm:</label>
            <select class="loc123" name="nam_san_xuat" id="nam_san_xuat">
                <option value="all">Tất cả</option>
                <!-- Thêm các tùy chọn năm từ CSDL hoặc cố định trước -->
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="before2016">Trước 2016</option>

                <!-- ... -->
            </select>
        </li>

        <li>
            <label class="loc123" for="thoi_luong">Thời lượng:</label>
            <select class="loc123" name="thoi_luong" id="thoi_luong">
                <option value="all">Tất cả</option>
                <!-- Thêm các tùy chọn thời lượng từ CSDL hoặc cố định trước -->
                <option value="before30">Dưới 30 phút</option>

                <option value="30-60">30'- 1 tiếng</option>
                <option value="60-90">1 - 1,5 tiếng</option>
                <option value="90-120">1,5 - 2 tiếng</option>
                <option value="120-150">2 - 2,5 tiếng</option>
                <option value="150-180">2,5 - 3 tiếng</option>
                <option value="after180">2 - 2,5 tiếng</option>



                <!-- ... -->
            </select>
        </li>

        <li>
            <label class="loc123" for="sap_xep">Sắp xếp:</label>
            <select class="loc123" name="sap_xep" id="sap_xep">
                <option value="all">Tất cả</option>
                <option value="diem_danh_gia">Điểm đánh giá</option>
                <option value="nam_san_xuat">Năm sản xuất</option>
                <!-- ... -->
            </select>
        </li>
    </ul>
    
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterForm = document.getElementById('filter-form');
        const selectElements = filterForm.querySelectorAll('select');
        const filterButton = document.getElementById('filter-button');


        function keyExists(url, key) {
            return url.indexOf(`${key}=`) !== -1;
        }


        function applyFilters() {

            let url = window.location.href;


            selectElements.forEach((select) => {
                const name = select.name;
                const value = select.value;

                if (value !== 'all') {
                    if (keyExists(url, name)) {

                        const regex = new RegExp(`${name}=[^&]+`);
                        url = url.replace(regex, `${name}=${encodeURIComponent(value)}`);
                    } else {

                        url += `&${name}=${encodeURIComponent(value)}`;
                    }
                } else {

                    const regex = new RegExp(`(?:&|\\?)${name}=[^&]+`);
                    url = url.replace(regex, '');
                }
            });


            window.location.href = url;
        }


        selectElements.forEach((select) => {
            select.addEventListener('change', function () {

                applyFilters();
            });
        });


        filterButton.addEventListener('click', applyFilters);
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const selectElements = document.querySelectorAll('select');


    function addSelectedOptionsToSelect(select) {
        const urlParams = new URLSearchParams(window.location.search);
        const paramValue = urlParams.get(select.name);

        if (paramValue !== null) {
            select.value = paramValue;
        }
    }


    selectElements.forEach((select) => {
        addSelectedOptionsToSelect(select);
    });
});

</script>

<?php

$loaiPhim = isset($_GET['loai_phim']) ? $_GET['loai_phim'] : 'all';
$theLoai = isset($_GET['the_loai']) ? $_GET['the_loai'] : 'all';
$quocGia = isset($_GET['quoc_gia']) ? $_GET['quoc_gia'] : 'all';
$namSanXuat = isset($_GET['nam_san_xuat']) ? $_GET['nam_san_xuat'] : 'all';
$thoiLuong = isset($_GET['thoi_luong']) ? $_GET['thoi_luong'] : 'all';
$sapXep = isset($_GET['sap_xep']) ? $_GET['sap_xep'] : 'all';


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
            p.thoi_luong,
            p.diem_danh_gia,
            pb.id_phimbo,
                pl.id_phimle,
            (
        SELECT MAX(tl_main.ten_the_loai)
        FROM theloai_phim tl_sub
        JOIN the_loai tl_main ON tl_sub.id_theloai = tl_main.id_theloai
        WHERE tl_sub.id_phim = p.id_phim
    ) AS the_loai
       
        FROM phim p";


$leftJoins = [
    "LEFT JOIN phim_bo pb ON p.id_phim = pb.id_phim",
    "LEFT JOIN phim_le pl ON p.id_phim = pl.id_phim",
    "LEFT JOIN quocgia_phim ql ON p.id_phim = ql.id_phim"
];


$wheres = [];


if ($loaiPhim != 'all') {
    $wheres[] = "p.loai_phim = $loaiPhim";
}

if ($theLoai != 'all') {

    $leftJoins[] = "LEFT JOIN theloai_phim tl ON p.id_phim = tl.id_phim AND tl.id_theloai = $theLoai";
    $wheres[] = "tl.id_theloai = $theLoai";
}

if ($quocGia != 'all') {
    $wheres[] = "ql.id_quocgia = $quocGia";
}

if ($namSanXuat != 'all') {

    if ($namSanXuat == 'before2016') {
        $wheres[] = "p.nam_san_xuat < 2016";
    } else {

        $wheres[] = "p.nam_san_xuat = $namSanXuat";
    }
}



if ($thoiLuong != 'all') {
    $thoiLuongConditions = [
        'before30' => 'p.thoi_luong <= 30',
        '30-60' => 'p.thoi_luong > 30 AND p.thoi_luong <= 60',
        '60-90' => 'p.thoi_luong > 60 AND p.thoi_luong <= 90',

        '90-120' => 'p.thoi_luong > 90 AND p.thoi_luong <= 120',
        '120-150' => 'p.thoi_luong > 120 AND p.thoi_luong <= 150',
        '150-180' => 'p.thoi_luong > 150 AND p.thoi_luong <= 180',

        'after180' => 'p.thoi_luong > 180'
    ];

    $wheres[] = $thoiLuongConditions[$thoiLuong];
}


$leftJoinClause = implode(' ', $leftJoins);
$whereClause = !empty($wheres) ? "WHERE " . implode(' AND ', $wheres) : '';


$orderLimitClause = "ORDER BY
            CASE
                WHEN '$sapXep' = 'diem_danh_gia' THEN p.diem_danh_gia
                WHEN '$sapXep' = 'nam_san_xuat' THEN p.nam_san_xuat
                ELSE p.created_at
            END DESC
        LIMIT $start, $itemsPerPage;";


$sql = "$sql $leftJoinClause $whereClause $orderLimitClause";

$result = $mysqli->query($sql);

$movies = [];

if ($result && $result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
}

$totalItems = $mysqli->query("SELECT COUNT(DISTINCT p.id_phim) as total FROM phim p $leftJoinClause $whereClause")->fetch_assoc()['total'];
$totalPages = ceil($totalItems / $itemsPerPage);
?>



<ul class="movies-list" id="movies-list">
                    <?php foreach ($movies as $movie): ?>
                    <li>
                        <div class="movie-card">
                            <a href="index.php?quanly=details&id_phim=<?php echo $movie['id_phim']; ?>&<?php echo $movie['loai_phim'] == 0 ? 'id_phimle=' . $movie['id_phimle'] : 'id_phimbo=' . $movie['id_phimbo']; ?>">
                                <figure class="card-banner">
                                    <img src="./admin/modules/quanlyphim/uploads/img/<?php echo $movie['hinh_anh']; ?>" alt="<?php echo $movie['ten_phim']; ?> movie poster">
                                </figure>
                            </a>
                            <div class="title-wrapper">
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
                    <li>No movies found.</li>
                <?php endif; ?>
            </ul>
            <div class="pagination" id="pagination">
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="index.php?quanly=hot&page=<?php echo $i; ?>" <?php if ($i == $current_page) echo 'class="active"'; ?>><?php echo $i; ?></a>
                <?php endfor; ?>
            </div>
        </div>
    </section>
</main>
<!-- ... (phần HTML của bạn) ... -->


