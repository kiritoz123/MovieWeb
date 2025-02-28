<?php



if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_phimle'])&& isset($_GET['id_phim'])) {
    $id_phimle = $_GET['id_phimle'];
    $id_phim = $_GET['id_phim'];


    $sql = "SELECT p.*, pl.*, GROUP_CONCAT(DISTINCT tl.ten_the_loai SEPARATOR ', ') AS the_loai,
    GROUP_CONCAT(DISTINCT qg.ten_quoc_gia SEPARATOR ', ') AS quoc_gia,
    GROUP_CONCAT(DISTINCT dd.ten_dao_dien SEPARATOR ', ') AS dao_dien,
    GROUP_CONCAT(DISTINCT dv.ten_dien_vien SEPARATOR ', ') AS dien_vien
FROM phim_le pl
JOIN phim p ON pl.id_phim = p.id_phim
LEFT JOIN theloai_phim ptl ON p.id_phim = ptl.id_phim
LEFT JOIN the_loai tl ON ptl.id_theloai = tl.id_theloai
LEFT JOIN quocgia_phim pqg ON p.id_phim = pqg.id_phim
LEFT JOIN quoc_gia qg ON pqg.id_quocgia = qg.id_quocgia
LEFT JOIN daodien_phim pdd ON p.id_phim = pdd.id_phim
LEFT JOIN dao_dien dd ON pdd.id_daodien = dd.id_daodien
LEFT JOIN dienvien_phim pdv ON p.id_phim = pdv.id_phim
LEFT JOIN dien_vien dv ON pdv.id_dienvien = dv.id_dienvien
WHERE p.id_phim = '$id_phim' AND pl.id_phimle = '$id_phimle'
GROUP BY p.id_phim, pl.id_phimle";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
        $phimle = $result->fetch_assoc();
    } else {
        echo 'Không tìm thấy thông tin phim lẻ.';

        exit();
    }
} else {
    echo 'Invalid request.';

    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ten_phim = $_POST["ten_phim"];
    $nam_san_xuat = $_POST["nam_san_xuat"];
    $mo_ta = $_POST["mo_ta"];
    $video_url = $_POST["video_url"];
    $thoi_gian_phim = $_POST["thoi_gian_phim"];
    $hinh_anh = $_POST["hinh_anh"];


    $query_update_phimle = "UPDATE phim_le pl
                            JOIN phim p ON pl.id_phim = p.id_phim
                            SET p.ten_phim = '$ten_phim', p.nam_san_xuat = '$nam_san_xuat', 
                                p.mo_ta = '$mo_ta', pl.video_url = '$video_url', 
                                pl.thoi_gian_phim = '$thoi_gian_phim', pl.hinh_anh = '$hinh_anh'
                            WHERE pl.id_phimle = '$id_phimle'";
    $result_update_phimle = $mysqli->query($query_update_phimle);

    if ($result_update_phimle) {
        echo 'Cập nhật thông tin phim lẻ thành công.';

    } else {
        echo 'Cập nhật thông tin phim lẻ thất bại: ' . $mysqli->error;

    }


    $mysqli->close();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <!-- Thêm các thẻ meta, link CSS, hoặc các tài nguyên khác cần thiết -->
    <link rel="stylesheet" href="path/to/your/css/styles.css"> <!-- Đường dẫn đến file CSS của bạn -->
</head>

<body>
    <form method="post" action="index.php?action=quanlyphimle&query=xuly&id_phim= <?php echo $id_phim; ?>&id_phimle=<?php echo $id_phimle ?>" enctype="multipart/form-data">
    <h1>Sửa Phim Lẻ</h1>

        <label for="ten_phim">Tên Phim:</label>
        <input type="text" name="ten_phim" value="<?php echo $phimle['ten_phim']; ?>" required>

        <label for="nam_san_xuat">Năm Sản Xuất:</label>
        <input type="text" name="nam_san_xuat" value="<?php echo $phimle['nam_san_xuat']; ?>" required>

        <label for="mo_ta">Mô Tả:</label>
        <textarea name="mo_ta" required><?php echo $phimle['mo_ta']; ?></textarea>

        <label for="video_url">Video URL:</label>
        <input type="text" name="video_url" value="<?php echo $phimle['video_url']; ?>" required>
        <label for="video_file">Tải Video Mới Lên:</label>
        <input type="file" name="video_file" accept="video
iframe {
    width: 100%;
    height: 315px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
span.select2-selection.select2-selection--multiple {
    min-width: 500px;
}
span.select2-dropdown.select2-dropdown--below {
    min-width: 200px;
    border-bottom: 1px solid #ccc;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #ffd287;
    border: 1px solid #aaa;
    border-radius: 4px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 3px 3px;
    font-size: 12px;
}
</style>
<script>
    $(document).ready(function () {

        $('#dien_vien').select2();


        $('#dien_vien').on('change', function () {

            var selectedValues = $(this).val();


            $('#selected-dien-vien').empty();
            if (selectedValues) {
                selectedValues.forEach(function (value) {

                    $('#selected-dien-vien').append('<span class="tag">' + value + '</span>');
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function () {

        $('#dao_dien').select2();


        $('#dao_dien').on('change', function () {

            var selectedValues = $(this).val();


            $('#selected-dao-dien').empty();
            if (selectedValues) {
                selectedValues.forEach(function (value) {

                    $('#selected-dao-dien').append('<span class="tag">' + value + '</span>');
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function () {

        $('#the_loai_id').select2();


        $('#the_loai_id').on('change', function () {

            var selectedValues = $(this).val();


            $('#selected-tags').empty();
            if (selectedValues) {
                selectedValues.forEach(function (value) {

                    $('#selected-tags').append('<span class="tag">' + value + '</span>');
                });
            }
        });
    });
</script>
