<?php
            include('./admin/config/config.php');

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            
        }

                if(isset($_GET['quanly'])){
                    $tam = $_GET['quanly'];
                 }else{
                    $tam = '';
                 }
         
           
                 

                if($tam=='trangchu'){
                    include('./pages/index.php');
                }elseif($tam=='details'){
                    include('./pages/movie_details.php');
                }elseif($tam=='xemphim'){
                    include('./pages/xemphim.php');
                }elseif($tam=='dangnhap'){
                    include('./pages/dangnhap.php');
                }elseif($tam=='dangki'){
                    include('./pages/dangki.php');
                }elseif($tam=='timkiem'){
                    include('./pages/timkiem.php');
                }elseif($tam=='hot'){
                    include('./pages/hot.php');
                }elseif($tam=='phimmoi'){
                    include('./pages/phimmoi.php');
                }elseif($tam=='loc'){
                    include('./pages/loc.php');
                }elseif($tam=='thongtindaodien'){
                    include('./pages/thongtindaodien.php');
                }elseif($tam=='thongtindienvien'){
                    include('./pages/thongtindienvien.php');
                }elseif($tam=='binhluan'){
                    include('./pages/binhluan.php');
                }elseif($tam=='thongtintaikhoan'){
                    include('./pages/thongtintaikhoan.php');
                }elseif($tam=='bosuutap'){
                    include('./pages/bosuutap.php');
                }elseif($tam=='xulybosuutap'){
                    include('./pages/xulybosuutap.php');

                }else {

                    include('index.php' );
                }
?>