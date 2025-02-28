<?php

if ($mysqli->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $mysqli->connect_error);
}

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
    $searchCondition = "WHERE ten_dao_dien LIKE '%$searchKeyword%'";
}

$searchFormAction = "index.php?action=quanlydaodien&query=lietke";


$sql = "SELECT * FROM dao_dien $searchCondition ORDER BY id_daodien DESC LIMIT $offset, $recordsPerPage";

$result = $mysqli->query($sql);


if ($result->num_rows > 0) {
    echo "<div class='table-container'>";
    echo "<h1 class='acv123'>Danh Sách Đạo Diễn</h1>";


    echo "<form action='index.php' method='get' class='form-inline123'>
            <input type='hidden' name='action' value='quanlydaodien'>
            <input type='hidden' name='query' value='lietke'>
            <input type='hidden' name='page' value='1'>
            <input type='text' name='search' class='form-control mr-2' placeholder='Tìm kiếm'>
            <button type='submit' class='btn btn-primary'>Tìm kiếm</button>
          </form>";


    echo "<table class='table'>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Avatar</th>
                    <th>Tên</th>
                    <th>Ngày sinh</th>
                    <th>Quê quán</th>
                    <th>Nghề nghiệp</th>
                    <th>Giới tính</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>";


    $stt = $offset + 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$stt}</td>
                <td><img src='modules/quanlydaodien/uploads/img/{$row['daodien_avatar']}' alt='Avatar' width='50' height='50'></td>
                <td>{$row['ten_dao_dien']}</td>
                <td>{$row['ngay_sinh']}</td>
                <td>{$row['que_quan']}</td>
                <td>{$row['nghe_nghiep']}</td>
                <td>{$row['gioi_tinh']}</td>
                <td class='action-column'>
                    <a href='index.php?action=quanlydaodien&query=sua&id_daodien={$row['id_daodien']}' class='edit-btn'>Sửa</a> 
                    <a href='index.php?action=quanlydaodien&query=xuly&delete=xoa&id_daodien={$row['id_daodien']}' class='delete-btn'>Xóa</a>
                </td>
              </tr>";
        $stt++;
    }

    echo "</tbody></table>";


    echo "<div class='Page_navigation'>
            <ul class='pagination123'>";
    $totalPages = ceil($stt / $recordsPerPage);
    $searchParams = isset($searchKeyword) ? '&search=' . urlencode($searchKeyword) : '';

    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<li class='page-items " . ($i == $currentPage ? 'active' : '') . "'>
                <a class='page-links' href='{$searchFormAction}&page={$i}{$searchParams}'>{$i}</a>
              </li>";
    }

    echo "</ul></div>";

    echo "</div>";
} else {
    echo "Không có dữ liệu đạo diễn.";
}


$mysqli->close();
?>
