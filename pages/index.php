
<?php
ini_set('max_execution_time', 300);


?>
<main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">Movie</p>

            <h1 class="h1 hero-title">
              Chào mừng bạn đến với <strong>Movie</strong>, nơi xem phim miễn phí.
            </h1>

          
            

            </div>

            <a href="#upcoming">  <button class="btn btn-primary">
              <ion-icon name="play"></ion-icon>

             <span>Watch now</span>
            </button>
            </a>
          </div>

        </div>
      </section>





      <!-- 
        - #UPCOMING
      -->

    




      <!-- 
        - #CTA
      -->



    </article>
  </main>

<section class="upcoming"id="upcoming">
  
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
                <option value="2022">Trước 2016</option>

                <!-- ... -->
            </select>
        </li>

        <li>
            <label class="loc123" for="thoi_luong">Thời lượng:</label>
            <select class="loc123" name="thoi_luong" id="thoi_luong">
                <option value="all">Tất cả</option>
                <!-- Thêm các tùy chọn thời lượng từ CSDL hoặc cố định trước -->
                <option value="0-90">Dưới 90 phút</option>
                <option value="90-120">90-120 phút</option>
                <option value="120-500">Trên 2 tiếng</option>

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

            let url = 'index.php?quanly=loc';


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
          <div class="flex-wrapper">

            <div class="title-wrapper">

              <h2 class="h2 section-title">PHIM ĐỀ CỬ</h2>
            </div>

            <ul class="filter-list">

              <li>
              <a href="index.php?quanly=loc&loai_phim=0">  <button class="filter-btn">Movies</button></a>
              </li>

              <li>
              <a href="index.php?quanly=loc&loai_phim=1">   <button class="filter-btn">TV Shows</button></a>
              </li>

              <li>
                <button class="filter-btn">Anime</button>
              </li>

            </ul>

          </div>

          <?php



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
WHERE p.loai_phim = 0 OR p.loai_phim = 1
ORDER BY p.diem_danh_gia DESC
LIMIT 8;
";

$result = $mysqli->query($sql);

$movies = [];

if ($result && $result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
}


?>

<ul class="movies-list has-scrollbar">
<?php foreach ($movies as $movie): ?>
    <li>
        <div class="movie-card">
            <a href="index.php?quanly=details&id_phim=<?php echo $movie['id_phim']; ?>&<?php echo $movie['loai_phim'] == 0 ? 'id_phimle=' . $movie['id_phimle'] : 'id_phimbo=' . $movie['id_phimbo']; ?>">
                <figure class="card-banner">
                    <img src="./admin/modules/quanlyphim/uploads/img/<?php echo $movie['hinh_anh']; ?>" alt="<?php echo $movie['ten_phim']; ?> movie poster">
                </figure>
            </a>
            <div class="title-wrapper">
                <a href="index.php?quanly=details&id_phim=<?php echo $movie['id_phim']; ?>&<?php echo $movie['loai_phim'] == 0 ? 'id_phimle=' . $movie['id_phimle'] : 'id_phimbo=' . $movie['id_phimbo']; ?>">
                    <h3 class="card-title"><?php echo $movie['ten_phim']; ?></h3>
                </a>
                <time datetime="<?php echo $movie['nam_san_xuat']; ?>"><?php echo $movie['nam_san_xuat']; ?></time>
            </div>
            <div class="card-meta">
                <div class="badge badge-outline">HD</div>
                <div class="duration"></div>
                <div class="rating">
                    <ion-icon name="star"></ion-icon>
                    <?php echo $movie['diem_danh_gia']; ?>
                </div>
            </div>
        </div>
    </li>
<?php endforeach; ?>


    <?php if (empty($movies)): ?>
        <li>No recommended movies found.</li>
    <?php endif; ?>
</ul>

        </div>
      </section>
      <!-- 
        - #SERVICE
      -->

   





      <!-- 
        - #TOP RATED
      -->

      <section class="top-rated"id="top">
        <div class="container">


          <h2 class="h2 section-title">PHIM LẺ </h2>

          <ul class="filter-list">


    

          </ul>

          <?php


$sql = "SELECT p.*, pl.id_phimle, pl.video_url,  pl.created_at AS phimle_created_at
FROM phim p
LEFT JOIN phim_le pl ON p.id_phim = pl.id_phim
WHERE p.loai_phim = 0
ORDER BY p.created_at DESC
        LIMIT 8";

$result = $mysqli->query($sql);

$movies = [];

if ($result && $result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
}


?>

<ul class="movies-list">
    <?php foreach ($movies as $movie): ?>
        <li>
            <div class="movie-card">

            <a href="index.php?quanly=details&id_phim=<?php echo $movie['id_phim']; ?>&id_phimle=<?php echo $movie['id_phimle']; ?>">
                    <figure class="card-banner">
                        <img src="./admin/modules/quanlyphim/uploads/img/<?php echo $movie['hinh_anh']; ?>" alt="<?php echo $movie['ten_phim']; ?> movie poster">
                    </figure>
                
                <div class="title-wrapper">
                    
                        <h3 class="card-title"><?php echo $movie['ten_phim']; ?></h3>
                    </a>
                    <time datetime="<?php echo $movie['nam_san_xuat']; ?>"><?php echo $movie['nam_san_xuat']; ?></time>
                </div>
                <div class="card-meta">
                    <div class="badge badge-outline">2K</div>
                    <div class="duration">
                    </div>
                    <div class="rating">
                        <ion-icon name="star"></ion-icon>
                        <data><?php echo $movie['diem_danh_gia']; ?></data>
                    </div>
                </div>
            </div>
        </li>
    <?php endforeach; ?>

    <?php if (empty($movies)): ?>
        <li>No odd-numbered movies with loai_phim = 0 found.</li>
    <?php endif; ?>


          </ul>

        </div>
      </section>





      <!-- 
        - #TV SERIES
      -->

      <section class="tv-series"id="series">
        <div class="container">


          <h2 class="h2 section-title">PHIM BỘ</h2>

          <?php



$sql = "SELECT p.*, pb.id_phimbo, pb.so_tap, pb.created_at AS phimbo_created_at
        FROM phim p
        LEFT JOIN phim_bo pb ON p.id_phim = pb.id_phim
        WHERE p.loai_phim = 1
        ORDER BY p.created_at DESC
        LIMIT 8";


$result = $mysqli->query($sql);

$movies = [];

if ($result && $result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
}


?>

<ul class="movies-list">
    <?php foreach ($movies as $movie): ?>
        <li>
            <div class="movie-card">
            <a href="index.php?quanly=details&id_phim=<?php echo $movie['id_phim']; ?>&id_phimbo=<?php echo $movie['id_phimbo']; ?>">
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
                    <div class="duration">
                    </div>
                    <div class="rating">
                        <ion-icon name="star"></ion-icon>
                        <data><?php echo $movie['diem_danh_gia']; ?></data>
                    </div>
                </div>
            </div>
        </li>
    <?php endforeach; ?>

    <?php if (empty($movies)): ?>
        <li>No odd-numbered movies with loai_phim = 0 found.</li>
    <?php endif; ?>
</ul>


        </div>
      </section>
