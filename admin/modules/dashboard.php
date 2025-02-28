<?php

if ($mysqli->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $mysqli->connect_error);
}


$sqlTotalMovies = "SELECT COUNT(*) AS total_movies FROM phim";
$resultTotalMovies = $mysqli->query($sqlTotalMovies);
$rowTotalMovies = $resultTotalMovies->fetch_assoc();
$totalMovies = $rowTotalMovies['total_movies'];


$sqlTotalMoviesLe = "SELECT COUNT(*) AS total_movies_le FROM phim_le";
$resultTotalMoviesLe = $mysqli->query($sqlTotalMoviesLe);
$rowTotalMoviesLe = $resultTotalMoviesLe->fetch_assoc();
$totalMoviesLe = $rowTotalMoviesLe['total_movies_le'];


$sqlTotalMoviesBo = "SELECT COUNT(*) AS total_movies_bo FROM phim_bo";
$resultTotalMoviesBo = $mysqli->query($sqlTotalMoviesBo);
$rowTotalMoviesBo = $resultTotalMoviesBo->fetch_assoc();
$totalMoviesBo = $rowTotalMoviesBo['total_movies_bo'];


$sqlTotalViews = "SELECT SUM(luot_xem) AS total_views FROM phim";
$resultTotalViews = $mysqli->query($sqlTotalViews);
$rowTotalViews = $resultTotalViews->fetch_assoc();
$totalViews = $rowTotalViews['total_views'];


$sqlTotalUsers = "SELECT COUNT(*) AS total_users FROM nguoi_dung";
$resultTotalUsers = $mysqli->query($sqlTotalUsers);
$rowTotalUsers = $resultTotalUsers->fetch_assoc();
$totalUsers = $rowTotalUsers['total_users'];


$sqlTotalComments = "SELECT COUNT(*) AS total_comments FROM binh_luan";
$resultTotalComments = $mysqli->query($sqlTotalComments);
$rowTotalComments = $resultTotalComments->fetch_assoc();
$totalComments = $rowTotalComments['total_comments'];


$formattedViews = number_format($totalViews, 0, ',', '.');


echo "<div class='dashboard-container'>";
echo "<h1 class='dashboard-heading'>Dashboard</h1>";

echo "<div class='dashboard-stats'>
        <div class='stat-box'>
            <div class='stat-label'>Tổng phim</div>
            <div class='stat-value'>{$totalMovies}</div>
        </div>
        <div class='stat-box'>
            <div class='stat-label'>Tổng phim lẻ</div>
            <div class='stat-value'>{$totalMoviesLe}</div>
        </div>
        <div class='stat-box'>
            <div class='stat-label'>Tổng phim bộ</div>
            <div class='stat-value'>{$totalMoviesBo}</div>
        </div>
        <div class='stat-box'>
            <div class='stat-label'>Tổng lượt xem</div>
            <div class='stat-value'>{$formattedViews}</div>
        </div>
        <div class='stat-box'>
            <div class='stat-label'>Tổng người dùng</div>
            <div class='stat-value'>{$totalUsers}</div>
        </div>
        <div class='stat-box'>
            <div class='stat-label'>Tổng bình luận</div>
            <div class='stat-value'>{$totalComments}</div>
        </div>
      </div>";


$sqlMoviesLe = "SELECT * FROM phim ORDER BY created_at DESC LIMIT 10";
$resultMoviesLe = $mysqli->query($sqlMoviesLe);

if ($resultMoviesLe->num_rows > 0) {
    echo "<h2 class='sub-heading'>Phim mới đăng</h2>";
    echo "<table class='table'>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên phim</th>
                    <th>Ngày Tạo</th>
                </tr>
            </thead>
            <tbody>";

    $stt = 1;

    while ($rowMoviesLe = $resultMoviesLe->fetch_assoc()) {
        echo "<tr>
                <td>{$stt}</td>
                <td>{$rowMoviesLe['ten_phim']}</td>
                <td>{$rowMoviesLe['created_at']}</td>
              </tr>";

        $stt++;
    }

    echo "</tbody></table>";
}

echo "</div>";


$mysqli->close();
?>
