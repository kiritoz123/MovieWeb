<div class="containerss">
    <h2 class="mt-4 mb-4">Thêm Diễn Viên Mới</h2>
    <form action="index.php?action=quanlydienvien&query=xuly" method="post" enctype="multipart/form-data" class="phim-form">
        <!-- Tên diễn viên -->
        <div class="form-group">
            <label for="ten_dien_vien">Tên diễn viên:</label>
            <input type="text" class="form-control" name="ten_dien_vien" required>
        </div>

        <!-- Ngày sinh -->
        <div class="form-group">
            <label for="ngay_sinh">Ngày sinh:</label>
            <input type="date" class="form-control" name="ngay_sinh" required>
        </div>

        <!-- Quê quán -->
        <div class="form-group">
            <label for="que_quan">Quê quán:</label>
            <input type="text" class="form-control" name="que_quan" required>
        </div>

        <!-- Giới tính -->
        <div class="form-group">
            <label for="gioi_tinh">Giới tính:</label>
            <select class="form-control" name="gioi_tinh" required>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
                <option value="Khác">Khác</option>
            </select>
        </div>

        <!-- Nghề nghiệp -->
        <div class="form-group">
            <label for="nghe_nghiep">Nghề nghiệp:</label>
            <input type="text" class="form-control" name="nghe_nghiep" required>
        </div>

        <!-- Thông tin -->
        <div class="form-group">
            <label for="thong_tin">Thông tin:</label>
            <textarea class="form-control" name="thong_tin" rows="4" required></textarea>
        </div>

        <!-- Tải avatar -->
        <div class="form-group">
            <label for="dienvien_avatar">Tải Avatar:</label>
            <input type="file" name="dienvien_avatar" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary" name="themdienvien">Thêm Diễn Viên</button>
    </form>
</div>

<style>
    body {
        background-color: #f8f9fa;
    }

    .containerss {
        min-width: 600px;
        margin: auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
    }

    h3 {
        color: #007bff;
        text-align: center;
        margin-bottom: 20px;
    }
h2{

        text-align: center;
        margin-bottom: 20px;
}
    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        color: #333;
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .btn-btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-btn-primary:hover {
        background-color: #0056b3;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        padding: 15px;
        border-radius: 4px;
        margin-top: 20px;
    }
    .btn-btn-primary{
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        padding: 15px;
        border-radius: 4px;
        margin-top: 20px;
    }
</style>