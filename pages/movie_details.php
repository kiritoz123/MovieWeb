<?php
function getMovieDetails($mysqli, $id_phim, $id_phimbo = null, $id_phimle = null) {
    $details = [];

    if ($id_phimbo !== null) {
        $sql = "SELECT
        pb.*, p.*,
        GROUP_CONCAT(DISTINCT tl.ten_the_loai SEPARATOR ', ') as the_loai
    FROM phim_bo pb
    LEFT JOIN phim p ON pb.id_phim = p.id_phim
    LEFT JOIN theloai_phim tpl ON pb.id_phim = tpl.id_phim
    LEFT JOIN the_loai tl ON tpl.id_theloai = tl.id_theloai
    WHERE pb.id_phimbo = $id_phimbo
    GROUP BY pb.id_phimbo";
    } elseif ($id_phimle !== null) {
        $sql = "SELECT pl.*, p.*,
                       GROUP_CONCAT(DISTINCT tl.ten_the_loai SEPARATOR ', ') as the_loai
                FROM phim_le pl
                JOIN phim p ON pl.id_phim = p.id_phim
                LEFT JOIN theloai_phim tpl ON pl.id_phim = tpl.id_phim
                LEFT JOIN the_loai tl ON tpl.id_theloai = tl.id_theloai
                WHERE pl.id_phimle = $id_phimle
                GROUP BY pl.id_phimle";
    } else {
        $sql = "SELECT p.*, 
                       GROUP_CONCAT(DISTINCT tl.ten_the_loai SEPARATOR ', ') as the_loai
                FROM phim p
                LEFT JOIN theloai_phim tpl ON p.id_phim = tpl.id_phim
                LEFT JOIN the_loai tl ON tpl.id_theloai = tl.id_theloai
                WHERE p.id_phim = $id_phim
                GROUP BY p.id_phim";
    }
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
        $details = $result->fetch_assoc();
    }

    return $details;


}




$id_phim = isset($_GET['id_phim']) ? (int)$_GET['id_phim'] : null;
$id_phimbo = isset($_GET['id_phimbo']) ? (int)$_GET['id_phimbo'] : null;
$id_phimle = isset($_GET['id_phimle']) ? (int)$_GET['id_phimle'] : null;


$movieDetails = getMovieDetails($mysqli, $id_phim, $id_phimbo, $id_phimle);


?>



    <main>
        <section class="movie-detail">
            
            <div class="container">
                <figure class="movie-detail-banner">
                    <img src="./admin/modules/quanlyphim/uploads/img/<?php echo $movieDetails['hinh_anh']; ?>" alt="<?php echo $movieDetails['ten_phim']; ?> movie poster">
                    <a href="index.php?quanly=xemphim&id_phim=<?php echo $movieDetails['id_phim']; ?>&<?php echo $movieDetails['loai_phim'] == 0 ? 'id_phimle=' . $movieDetails['id_phimle'] : 'id_phimbo=' . $movieDetails['id_phimbo']. '&tap=1' ; ?>"><button class="play-btn">
                        <ion-icon name="play-circle-outline"></ion-icon>
                    </button></a> 
                    
                </figure>

                <div class="movie-detail-content">
                    <h1 class="h1 detail-title">
                        <?php echo $movieDetails['ten_phim']; ?>
                    </h1>
                    <div class="meta-wrapper">
                        <div class="badge-wrapper">
                            <div class="badge badge-fill">PG 13</div>
                            <div class="badge badge-outline">HD</div>
                        </div>
                        <div class="ganre-wrapper">

                        <?php
$theLoaiArray = explode(', ', $movieDetails['the_loai']);
foreach ($theLoaiArray as $theLoai) {
    echo '<a class="theloai123" href="#">' . $theLoai . '</a>';
}
?>

                        </div>
                        <div class="date-time">
                            <div>
                                <ion-icon name="calendar-outline"></ion-icon>
                                <time datetime="<?php echo $movieDetails['nam_san_xuat']; ?>"><?php echo $movieDetails['nam_san_xuat']; ?></time>
                            </div>
                            <div>
                                <ion-icon name="time-outline"></ion-icon>
                                <time datetime="PT<?php echo $movieDetails['thoi_luong']; ?>M"><?php echo $movieDetails['thoi_luong']; ?> min</time>
                            </div>
                        </div>
                    </div>
                    <?php

if (isset($_SESSION['id_nguoidung'])) {
    $id_nguoidung = $_SESSION['id_nguoidung'];
    

    $sql_check_collection = "SELECT * FROM bo_suu_tap WHERE id_nguoidung = $id_nguoidung AND id_phim = " . $movieDetails['id_phim'];
    $result_check_collection = $mysqli->query($sql_check_collection);

    $isAddedToCollection = $result_check_collection && $result_check_collection->num_rows > 0;


    echo '<a href="index.php?quanly=xulybosuutap&action=' . ($isAddedToCollection ? 'remove_from_collection' : 'add_to_collection') . '&id_phim=' . $movieDetails['id_phim'] . '">';
    echo '<p class="acv123"><i class="fa-solid ' . ($isAddedToCollection ? 'fa-trash' : 'fa-plus') . '"></i> ' . ($isAddedToCollection ? ' Bộ sưu tập' : 'Bộ sưu tập') . '</p></a>';
}
?>

                    <p class="storyline">
                        <?php echo $movieDetails['mo_ta']; ?>
                    </p>
                    <div class="details-actions" id="video-container">
    <button class="share">
        <ion-icon name="share-social"></ion-icon>
        <span>Share</span>
    </button>
    <div class="title-wrapper">
        <p class="title">Trailer</p>
        <p class="text">Streaming Channels</p>
    </div>
    <button class="btn btn-primary" onclick="playTrailer()">
        <ion-icon name="play"></ion-icon>
        <span>Watch Now</span>
    </button>

    <!-- Thẻ Modal chứa video -->
    <div id="trailerModals" class="modalss">
        <span id="closeSpan" class="close" onclick="closeVideo()">&times;</span>
        <div id="youtubePlayer"></div>
    </div>
   
</div>


<?php 
function getDirectorsAndActors($mysqli, $id_phim) {
    $details = [];


    $directorSql = "SELECT dd.*, dp.id_daodien_phim
                    FROM dao_dien dd
                    JOIN daodien_phim dp ON dd.id_daodien = dp.id_daodien
                    WHERE dp.id_phim = $id_phim";

    $directorResult = $mysqli->query($directorSql);

    if ($directorResult && $directorResult->num_rows > 0) {
        while ($directorRow = $directorResult->fetch_assoc()) {
            $details['directors'][] = $directorRow;
        }
    }


    $actorSql = "SELECT dv.*, dp.id_dienvien_phim
                 FROM dien_vien dv
                 JOIN dienvien_phim dp ON dv.id_dienvien = dp.id_dienvien
                 WHERE dp.id_phim = $id_phim";

    $actorResult = $mysqli->query($actorSql);

    if ($actorResult && $actorResult->num_rows > 0) {
        while ($actorRow = $actorResult->fetch_assoc()) {
            $details['actors'][] = $actorRow;
        }
    }

    return $details;
}


$movieDetails = getMovieDetails($mysqli, $id_phim);
$directorsAndActors = getDirectorsAndActors($mysqli, $id_phim);


echo '<h3 class="daodien">Đạo diễn</h3>';
echo '<div class="director-container">';
if (isset($directorsAndActors['directors'])) {
    foreach ($directorsAndActors['directors'] as $director) {
        echo '<div class="person-container">';
        echo '<a href="index.php?quanly=thongtindaodien&id_daodien=' . $director['id_daodien'] . '">';
        echo '<img src="./admin/modules/quanlydaodien/uploads/img/' . $director['daodien_avatar'] . '" alt="' . $director['ten_dao_dien'] . '" class="rounded-image">';
        echo '<p class="person-name">' . $director['ten_dao_dien'] . '</p>';
        echo '</a>';
        echo '</div>';
    }
}
echo '</div>';


echo '<h3 class="daodien">Diễn viên</h3>';
echo '<div class="actors-container">';
if (isset($directorsAndActors['actors'])) {
    foreach ($directorsAndActors['actors'] as $actor) {
        echo '<div class="person-container">';
        echo '<a href="index.php?quanly=thongtindienvien&id_dienvien=' . $actor['id_dienvien'] . '">';
        echo '<img src="./admin/modules/quanlydienvien/uploads/img/' . $actor['dienvien_avatar'] . '" alt="' . $actor['ten_dien_vien'] . '" class="rounded-image">';
        echo '<p class="person-name">' . $actor['ten_dien_vien'] . '</p>';
        echo '</a>';
        echo '</div>';
    }
}
echo '</div>';

?>







                    </div>
                </div>
            </div>
        </section>
        <section class="tv-series">
        <div class="container">


          <h2 class="h2 section-title">Gợi ý cho bạn</h2>

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
LIMIT 4;
";


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
    </main>
    <script src="https:
    <script>
        let player;

        function openVideo() {

            document.getElementById('video-container').classList.add('open-video');
        }

        function closeVideo() {

            document.getElementById('video-container').classList.remove('open-video');


            if (player) {
                player.stopVideo();
            }


            let trailerModals = document.getElementById("trailerModals");
            let closeSpan = document.getElementById("closeSpan");

            if (trailerModals && closeSpan) {
                trailerModals.style.display = "none";
                closeSpan.style.display = "none";
            }


            toggleYouTubePlayer(false);
        }



        function playTrailer() {
            var trailerLink = "<?php echo $movieDetails['link_trailer']; ?>";

            var videoId = getVideoId(trailerLink);


            player = new YT.Player('youtubePlayer', {
                height: '315',
                width: '560',
                videoId: videoId,
                events: {
                    'onReady': onPlayerReady,

                }
            });


            document.getElementById("trailerModals").style.display = "block";

            document.getElementById("closeSpan").style.display = "block";


            openVideo();


            toggleYouTubePlayer(true);
        }



        function toggleYouTubePlayer(visible) {
            let youtubePlayer = document.getElementById("youtubePlayer");
            if (youtubePlayer) {
                youtubePlayer.style.display = visible ? "block" : "none";
            }
        }

        function onPlayerReady(event) {


        }


        function getVideoId(trailerLink) {
            var regex = /[?&]v=([^?&]+)/;
            var match = trailerLink.match(regex);
            return match ? match[1] : '';
        }
    </script>
    <style>
.movie-detail::before {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: url("./admin/modules/quanlyphim/uploads/img/<?php echo $movieDetails['anh_bia']; ?>") no-repeat;
  background-size: cover;
  background-position: center;
  filter: blur(8px);
  z-index: -1;
}

.movie-detail {
  position: relative;

  background-color: rgb(21 28 34 / 81%);
  padding-top: 160px;
  padding-bottom: var(--section-padding);
}

</style>