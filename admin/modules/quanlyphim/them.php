<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Phim Lẻ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
     
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="file"] {
            border: none;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 4px;
        }

.checkbox-group {
    display: inline-block;
    margin-right: 10px;
}


.form-input.quoc-gia {
    width: 200px;
}
.selected-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .tag {
        background-color: #ffda71;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .tag-remove {
        margin-left: 5px;
        cursor: pointer;
    }

#selected-tags {
    display: flex;
    flex-wrap: wrap;
    margin-top: 10px;
}


.selected-tag {
    background-color: #007bff;
    color: #fff;
    border: 1px solid #007bff;
    border-radius: 5px;
    padding: 5px 10px;
    margin-right: 5px;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
}


.add-tag-button {
    margin-top: 10px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    cursor: pointer;
}


.add-tag-button:hover {
    background-color: #218838;
}
span.select2-selection.select2-selection--multiple {
    min-width: 500px;
}
span.select2-dropdown.select2-dropdown--below {
    min-width: 200px;
    border-bottom: 1px solid #ccc;
}
select.form-input.quoc-gia {
    border: 1px solid #a5a5a5;
    padding: 3px;
    width: 152px;
    margin: 5px 0 20px 0;
    border-radius: 5px;
}
select#loai_phim {
    border: 1px solid;
    width: 140px;
    padding: 5px;
    border-radius: 5px;
    margin: 4px 5px 26px;
}
label.form-label {
    margin: 10px;
}
    </style>
</head>
<body>
  

    <form action="index.php?action=quanlyphim&query=xuly" method="post" enctype="multipart/form-data" class="phim-form">
    <h1>Thêm phim mới</h1>
    <label for="ten_phim" class="form-label">Tên Phim:</label>
    <input type="text" name="ten_phim" class="form-input" required>



    <label for="the_loai_id" class="form-label">Thể Loại:</label>
<select name="the_loai_id[]" id="the_loai_id" class="form-input" multiple required>
    <?php
    $result_the_loai = $mysqli->query("SELECT * FROM the_loai");

    if ($result_the_loai && $result_the_loai->num_rows > 0) {
        while ($row_the_loai = $result_the_loai->fetch_assoc()) {
            echo '<option value="' . $row_the_loai['id_theloai'] . '">' . $row_the_loai['ten_the_loai'] . '</option>';
        }
    } else {
        echo '<option value="">Không có dữ liệu</option>';
    }
    ?>
</select>

<!-- Hiển thị thẻ tags đã chọn cho Thể Loại -->
<div id="selected-tags" class="selected-tags"></div>



<div class="form-row">
    <div class="form-group">
        <label for="quoc_gia_id" class="form-label">Quốc Gia:</label>
        <select name="quoc_gia_id" class="form-input quoc-gia" required>
            <?php
            $result_quoc_gia = $mysqli->query("SELECT * FROM quoc_gia");

            if ($result_quoc_gia && $result_quoc_gia->num_rows > 0) {
                while ($row_quoc_gia = $result_quoc_gia->fetch_assoc()) {
                    echo '<option value="' . $row_quoc_gia['id_quocgia'] . '">' . $row_quoc_gia['ten_quoc_gia'] . '</option>';
                }
            } else {
                echo '<option value="">Không có dữ liệu</option>';
            }
            ?>
        </select>
    </div>


    <label for="dao_dien" class="form-label">Đạo Diễn:</label>
<select name="dao_dien[]" class="form-input" multiple="multiple" required>
    <?php
    $result_dao_dien = $mysqli->query("SELECT * FROM dao_dien");

    if ($result_dao_dien && $result_dao_dien->num_rows > 0) {
        while ($row_dao_dien = $result_dao_dien->fetch_assoc()) {
            echo '<option value="' . $row_dao_dien['id_daodien'] . '">' . $row_dao_dien['ten_dao_dien'] . '</option>';
        }
    } else {
        echo '<option value="">Không có dữ liệu</option>';
    }
    ?>
</select>

<!-- Hiển thị thẻ tags đã chọn cho Đạo Diễn -->
<div id="selected-dao-dien" class="selected-tags"></div>


<label for="dien_vien" class="form-label">Diễn Viên:</label>
<select name="dien_vien[]" class="form-input" multiple="multiple" required>
    <?php
    $result_dien_vien = $mysqli->query("SELECT * FROM dien_vien");

    if ($result_dien_vien && $result_dien_vien->num_rows > 0) {
        while ($row_dien_vien = $result_dien_vien->fetch_assoc()) {
            echo '<option value="' . $row_dien_vien['id_dienvien'] . '">' . $row_dien_vien['ten_dien_vien'] . '</option>';
        }
    } else {
        echo '<option value="">Không có dữ liệu</option>';
    }
    ?>
</select>

<!-- Hiển thị thẻ tags đã chọn cho Diễn Viên -->
<div id="selected-dien-vien" class="selected-tags"></div>


    <label for="nam_san_xuat" class="form-label">Năm Sản Xuất:</label>
    <input type="text" name="nam_san_xuat" class="form-input" required>

    <label for="mo_ta" class="form-label">Mô Tả:</label>
    <textarea name="mo_ta" rows="4" class="form-input" required></textarea>

    <label for="hinh_anh" class="form-label">Ảnh phim:</label>
    <input type="file" name="hinh_anh" accept="image/*" class="form-input" required>

    <label for="anhbia" class="form-label">Ảnh bìa:</label>
    <input type="file" name="anh_bia" accept="image/*" class="form-input" required>

    <label for="nam_san_xuat" class="form-label">Điểm đánh giá(Từ 1-10)</label>
    <input type="text" name="diem_danh_gia" class="form-input" required>

    <label for="nam_san_xuat" class="form-label">Link trailer:</label>
    <input type="text" name="link_trailer" class="form-input" required>

    <label for="thoi_gian_phim" class="form-label">Thời Lượng(Phút)</label>
    <input type="text" name="thoi_luong" class="form-input" required>
    <label for="loai_phim" class="form-label">Loại Phim:</label>
<select name="loai_phim" id="loai_phim" class="form-input" required>
    <option value="0">Phim Lẻ</option>
    <option value="1">Phim Bộ</option>
</select>

<div id="phim_le_fields">
<label for="video_file" class="form-label">Tải Video Lên:</label>
<input type="file" name="video_file" class="form-input" accept="video/*">


</div>

<div id="phim_bo_fields" style="display: none;">
    <label for="so_tap" class="form-label">Số Tập:</label>
    <input type="text" name="so_tap" class="form-input">
</div>

<input type="submit" value="Thêm Phim" class="form-submit">

<!-- Thêm mã JavaScript để ẩn và hiển thị các trường dựa trên loại phim -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    var loaiPhimSelect = document.getElementById('loai_phim');
    var phimLeFields = document.getElementById('phim_le_fields');
    var phimBoFields = document.getElementById('phim_bo_fields');


    function hienThiTruong() {
        if (loaiPhimSelect.value === '0') {
            phimLeFields.style.display = 'block';
            phimBoFields.style.display = 'none';


            document.getElementsByName('so_tap')[0].value = '';
        } else if (loaiPhimSelect.value === '1') {
            phimLeFields.style.display = 'none';
            phimBoFields.style.display = 'block';


            document.getElementsByName('video_url')[0].value = '';
        }
    }


    hienThiTruong();


    loaiPhimSelect.addEventListener('change', hienThiTruong);
});
</script>

<script>
    $(document).ready(function () {

        $('select[name="dien_vien[]"]').select2();


        $('select[name="dien_vien[]"]').on('change', function () {

            var selectedValues = $(this).val();


            $('#selected-dien-vien').empty();
            if (selectedValues) {
                selectedValues.forEach(function (value) {
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function () {

        $('select[name="dao_dien[]"]').select2();


        $('select[name="dao_dien[]"]').on('change', function () {

            var selectedValues = $(this).val();


            $('#selected-dao-dien').empty();
            if (selectedValues) {
                selectedValues.forEach(function (value) {
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
                });
            }
        });
    });
</script>

</body>
</html>
