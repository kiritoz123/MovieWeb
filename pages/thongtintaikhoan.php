<!-- Thẻ img cho hiển thị ảnh -->
<main>
  <div class="container_vc123">

    <?php

    if (isset($_POST['suathongtin'])) {

        $userId = $_SESSION['id_nguoidung'];
        $newDisplayName = $_POST['display-name'];
        $newEmail = $_POST['email'];


        $sqlUpdateInfo = "UPDATE nguoi_dung SET ten_nguoi_dung = '$newDisplayName',  email = '$newEmail' WHERE id_nguoidung = $userId";

        if ($mysqli->query($sqlUpdateInfo) === TRUE) {
        } else {
            echo "Lỗi cập nhật thông tin: " . $mysqli->error;
        }


        if ($_FILES['avatar']['error'] == 0) {

            $uploadDir = "./assets/images/";
            $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);

            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {

                $newAvatar = basename($_FILES['avatar']['name']);
                $sqlUpdateAvatar = "UPDATE nguoi_dung SET avatar = '$newAvatar' WHERE id_nguoidung = $userId";

                if ($mysqli->query($sqlUpdateAvatar) === TRUE) {
                    echo "Cập nhật ảnh đại diện thành công";
                } else {
                    echo "Lỗi cập nhật ảnh đại diện: " . $mysqli->error;
                }
            } else {
                echo "Lỗi khi tải lên ảnh.";
            }
        }
    }


    if (isset($_SESSION['id_nguoidung'])) {

        $id_nguoidung = $_SESSION['id_nguoidung'];


        $queryUserInfo = "SELECT id_nguoidung, ten_nguoi_dung, email,avatar FROM nguoi_dung WHERE id_nguoidung = $id_nguoidung";


        $resultUserInfo = $mysqli->query($queryUserInfo);


        if ($resultUserInfo && $resultUserInfo->num_rows > 0) {
            $userInfo = $resultUserInfo->fetch_assoc();
            echo '<form id="update-form" action="" method="post" enctype="multipart/form-data">';
            echo '<h1>Thông tin tài khoản </h1>';

            echo '<div class="personal-info_vc123">';
            echo '<label for="avatar" class="label_vc123">Ảnh đại diện:</label>';
            echo '<img src="./assets/images/' . $userInfo['avatar'] . '" alt="Ảnh đại diện" class="profile-picture_vc123">';
            echo '<input type="file" id="avatar" name="avatar" accept="image/*">';

            echo '<label for="display-name" class="label_vc123">Tên:</label>';
            echo '<input type="text" id="display-name" name="display-name" class="input-field_vc123" value="' . $userInfo['ten_nguoi_dung'] . '">';

            echo '<input type="text" id="email" name="email" class="input-field_vc123" value="' . $userInfo['email'] . '">';

            echo '</div>';
            echo '<button type="submit" name="suathongtin" class="update-button_vc123">Cập nhật</button>';
            echo '</form>';
        } else {
            echo 'Không tìm thấy thông tin người dùng.';
        }
    }
    ?>

  </div>
</main>
