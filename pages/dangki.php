<?php

if (isset($_SESSION['id_nguoidung'])) {
    header("Location: index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["dangky"])) {
    $name = mysqli_real_escape_string($mysqli, $_POST["name"]);
    $email = mysqli_real_escape_string($mysqli, $_POST["email-reg"]);
    $password = mysqli_real_escape_string($mysqli, $_POST["password-reg"]);
    

    $avatar = "avatar.png";

    if (!empty($_FILES['avatar']['name'])) {
        $avatarName = $_FILES['avatar']['name'];
        $avatarTmpName = $_FILES['avatar']['tmp_name'];
        $avatarPath = './assets/images/' . $avatarName;

        move_uploaded_file($avatarTmpName, $avatarPath);
        $avatar = $avatarName;
    }


    $sql_check_email = "SELECT * FROM nguoi_dung WHERE email='$email'";
    $result_check_email = mysqli_query($mysqli, $sql_check_email);

    if ($result_check_email) {
        if (mysqli_num_rows($result_check_email) > 0) {
            $error_message = "Email đã tồn tại. Vui lòng sử dụng email khác.";
        } else {

            $sql_register = "INSERT INTO nguoi_dung (ten_nguoi_dung, mat_khau, email, avatar) VALUES ('$name', '$password', '$email', '$avatar')";
            $result_register = mysqli_query($mysqli, $sql_register);

            if ($result_register) {

                $_SESSION['id_nguoidung'] = mysqli_insert_id($mysqli);
                $_SESSION['ten_nguoi_dung'] = $name;
                $_SESSION['avatar'] = $avatar;


                header("Location: index.php");
                exit();
            } else {
                $error_message = "Lỗi khi đăng ký: " . mysqli_error($mysqli);
            }
        }
    } else {
        echo "Lỗi truy vấn CSDL: " . mysqli_error($mysqli);
    }
}
?>

<main>
    <form method="post" action="" enctype="multipart/form-data">
        <div id="register-form">
            <h2 class="login123">Đăng kí</h2>
            <label for="name">Tên:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email-reg">Email:</label>
            <input type="email" id="email-reg" name="email-reg" required><br>

            <label for="password-reg">Mật khẩu:</label>
            <input type="password" id="password-reg" name="password-reg" required><br>

            <label for="avatar">Tải lên Avatar:</label>
            <input type="file" id="avatar" name="avatar" accept="image/*"><br>

            <button type="submit" class="btn btn-primary" name="dangky">Đăng ký</button>
            <p>Đã có tài khoản? <a href="index.php?quanly=dangnhap">Đăng nhập ngay</a></p>
        </div>
    </form>
</main>
