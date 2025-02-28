<?php

if (isset($_GET['id'])) {
    $quoc_gia_id = $_GET['id'];


    $query = "SELECT * FROM quoc_gia WHERE id_quocgia = $quoc_gia_id";
    $result = $mysqli->query($query);

    if ($result) {
        if ($result->num_rows > 0) {
            $quoc_gia = $result->fetch_assoc();
        } else {
            echo 'Không tìm thấy quốc gia.';
            exit;
        }
    } else {
        echo 'Lỗi truy vấn: ' . $mysqli->error;
        exit;
    }

} else {
    echo 'Không có ID quốc gia được chỉ định.';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Quốc Gia</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <form method="post" action="index.php?action=quanlyquocgia&query=xuly&id=<?php echo $quoc_gia_id; ?> " class="category-form">
    <h2 style="text-align: center;  margin-bottom: 20px;">Sửa Quốc Gia</h2>

        <label for="ten_quoc_gia">Tên Quốc Gia:</label>
        <input type="text" name="ten_quoc_gia" value="<?php echo $quoc_gia['ten_quoc_gia']; ?>" required>

        <button type="submit" name="suaquocgia" class="submit-button">Cập Nhật Quốc Gia</button>
    </form>
</body>

</html>

<style>
    .category-form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.category-form label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

.category-form input {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border-color:#45a049;
}

.submit-button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 16px;
}

.submit-button:hover {
    background-color: #45a049;
}
</style>