<?php



$recordsPerPage = 10;


if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}


$offset = ($currentPage - 1) * $recordsPerPage;


$searchKeyword = '';
$searchCondition = '';

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchKeyword = $_GET['search'];
    $searchCondition = "WHERE p.ten_phim LIKE '%$searchKeyword%'";
}

$searchFormAction = "index.php?action=quanlyphimle&query=lietke";


$sql = "SELECT pl.id_phimle, pl.id_phim, pl.video_url, p.thoi_luong, pl.created_at,
               p.ten_phim, p.nam_san_xuat, p.hinh_anh, p.created_at AS phim_created_at
        FROM phim_le pl
        JOIN phim p ON pl.id_phim = p.id_phim
        $searchCondition
        ORDER BY pl.created_at DESC LIMIT $offset, $recordsPerPage";

$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {

    echo '<div class="table-container">';
    echo '<h1 class="acv123">Danh Sách Phim Lẻ</h1>';


    echo '<!-- Form tìm kiếm -->
    <form action="index.php" method="get" class="form-inline123">
        <input type="hidden" name="action" value="quanlyphimle">
        <input type="hidden" name="query" value="lietke">
        <input type="hidden" name="page" value="1"> <!-- Để đảm bảo page không bị trống -->
        <input type="text" name="search" class="form-control mr-2" placeholder="Tìm kiếm">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>';


    echo '<table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tên Phim</th>
                    <th>Năm Sản Xuất</th>
                    <th>Thời Lượng Phim</th>
                    <th>Ngày Tạo</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>';


    $stt = $offset + 1;
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $stt . '</td>
                <td><img src="modules/quanlyphim/uploads/img/' . $row['hinh_anh'] . '" alt="Ảnh phim" style="max-width: 50px; height: auto;"></td>
                <td>' . $row['ten_phim'] . '</td>
                <td>' . $row['nam_san_xuat'] . '</td>
                <td>' . $row['thoi_luong'] . '</td>
                <td>' . $row['phim_created_at'] . '</td>
                <td class="action-column">
                    <a href="index.php?action=quanlyphimle&query=sua&id_phim=' . $row['id_phim'] . '&id_phimle=' . $row['id_phimle'] . '" class="edit-btn">Sửa</a> 
                    <a href="index.php?action=quanlyphimle&query=xuly&delete=xoa&id_phim=' . $row['id_phim'] . '&id_phimle=' . $row['id_phimle'] . '" class="delete-btn">Xóa</a>
                </td>
            </tr>';
        $stt++;
    }

    echo '</tbody></table>';


    echo '<div class="Page_navigation">
            <ul class="pagination123">';
            $totalPages = ceil($stt / $recordsPerPage);
    $searchParams = isset($searchKeyword) ? '&search=' . urlencode($searchKeyword) : '';

    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<li class="page-items ' . ($i == $currentPage ? 'active' : '') . '">
                <a class="page-links" href="' . $searchFormAction . '&page=' . $i . $searchParams . '">' . $i . '</a>
              </li>';
    }

    echo '</ul></div>';

    echo '</div>';
} else {
    echo 'Không có dữ liệu phim lẻ.';
}


$mysqli->close();
?>
