<?php

$queryQuocGia = "SELECT * FROM quoc_gia";
$resultQuocGia = $mysqli->query($queryQuocGia);


if ($resultQuocGia) {

    if ($resultQuocGia->num_rows > 0) {

        echo "<div class='custom-tables'>";
        echo '<table class="custom-table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>STT</th>';
        echo '<th>Tên Quốc Gia</th>';
        echo '<th>Thao Tác</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';


        $sttQuocGia = 1;
        while ($rowQuocGia = $resultQuocGia->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $sttQuocGia . '</td>';
            echo '<td>' . $rowQuocGia['ten_quoc_gia'] . '</td>';
            echo '<td class="action-column"><a href="index.php?action=quanlyquocgia&query=sua&id=' . $rowQuocGia['id_quocgia'] . '" class="edit-btn">Sửa</a> 
                <a href="index.php?action=quanlyquocgia&query=xuly&id=' . $rowQuocGia['id_quocgia'] . '&xoa=1" class="delete-btn">Xóa</a>
            </td>';
            echo '</tr>';
            $sttQuocGia++;
        }


        echo '</tbody>';
        echo '</table>';
    } else {
        echo 'Không có dữ liệu.';
    }


    $resultQuocGia->free_result();
} else {
    echo 'Lỗi truy vấn: ' . $mysqli->error;
}
?>

<form method="post" action="index.php?action=quanlyquocgia&query=xuly" class="category-form">
    <h2 class="theloai12343">Thêm Quốc Gia</h2>
    <label for="ten_quoc_gia">Tên Quốc Gia:</label>
    <input type="text" name="ten_quoc_gia" required>
    <button type="submit" name="themquocgia" class="submit-button">Thêm Quốc Gia</button>
</form>
</div>
<style>

.theloai12343{
    text-align: center;
    margin-bottom: 20px;
}
.custom-table {
    width: 35%;
    border-collapse: collapse;
    margin-top: 20px;
}

.custom-table th, .custom-table td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
    color: black;

}

.custom-table th {
    background-color: #f2f2f2;
}

.custom-table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.custom-table tbody tr:hover {
    background-color: #ddd;
}


.custom-table a {
    color: #fff;
    text-decoration: none;
}

.custom-table a:hover {
    text-decoration: underline;
}


@media (max-width: 600px) {
    .custom-table {
        font-size: 14px;
    }

    .custom-table th, .custom-table td {
        padding: 6px;
    }
}
.action-column {
        max-width: 150px;
        overflow: hidden;
        white-space: nowrap;
    }

    .edit-btn, .delete-btn {
        display: inline-block;
        padding: 6px 10px;
        text-decoration: none;
        color: #fff;
        background-color: #3498db;
        border-radius: 4px;
        width: 51px;
    }
    .add-episode-btn {
        display: inline-block;
        padding: 6px 10px;
        text-decoration: none;
        color: #fff;
        background-color: #3498db;
        border-radius: 4px;
        width: 120px;
    }
    .edit-btn:hover, .delete-btn:hover,.add-episode-btn:hover {
        background-color: #2980b9;
    }
    .category-form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f4f4f4;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-height: 200px;
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
