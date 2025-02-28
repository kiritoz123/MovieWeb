<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['login'])) {
        $email = mysqli_real_escape_string($mysqli, $_POST["email"]);
        $matkhau = mysqli_real_escape_string($mysqli, $_POST["mat_khau"]);

        $sql_kiemtra = "SELECT * FROM nguoi_dung WHERE email='$email' AND mat_khau='$matkhau'";
        $result_kiemtra = $mysqli->query($sql_kiemtra);

        if ($result_kiemtra) {
            $row_user = $result_kiemtra->fetch_assoc();

            if ($row_user) {
                $_SESSION['id_nguoidung'] = $row_user['id_nguoidung'];
                $_SESSION['ten_nguoi_dung'] = $row_user['ten_nguoi_dung'];
                $_SESSION['avatar'] = $row_user['avatar'];
                $_SESSION['loai_nguoi_dung'] = $row_user['loai_nguoi_dung'];


                if ($row_user['loai_nguoi_dung'] == 'admin') {
                    header("Location: index.php");
                    exit();
                } else {
                    header("Location: index.php");
                    exit();
                }
            } else {
                $error_message = "Thông tin đăng nhập không đúng.";
            }
        } else {
            echo "Lỗi truy vấn CSDL: " . $mysqli->error;
        }
    }
}

$mysqli->close();
?>

<main>
  <form method="post" action="">
    <div id="login-form">
      <h2 class="login123">Đăng nhập</h2>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br>

      <label for="password">Mật khẩu:</label>
      <input type="password" id="password" name="mat_khau" required><br>

      <button type="submit" class="btn btn-primary" name="login">Đăng nhập</button>
      <p>Chưa có tài khoản? <a href="index.php?quanly=dangki">Đăng ký ngay</a></p>
      <?php
      if (!empty($error_message)) {
          echo '<p style="color: red;">' . $error_message . '</p>';
      }
      ?>
    </div>
  </form>
</main>
