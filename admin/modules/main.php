<section class="main">
      <div class="main-top">
<?php
                include('config/config.php');

                if(isset($_GET['action']) && $_GET['query']){
                    $tam = $_GET['action'];
                    $query = $_GET['query'];
                } else {
                    $tam = '';
                    $query = '';
                }

                if($tam=='quanlyphim' && $query=='kietke'){
                    include('./modules/quanlyphim/kietke.php' );
                } elseif($tam=='quanlyphimle' && $query=='them'){
                    include('./modules/quanlyphim/quanlyphimle/them.php' );
                } elseif($tam=='quanlyphimle' && $query=='lietke'){
                    include('./modules/quanlyphim/quanlyphimle/lietke.php' );
                }elseif($tam=='quanlyphimle' && $query=='sua'){
                    include('./modules/quanlyphim/quanlyphimle/sua.php' );
                }elseif($tam=='quanlyphimle' && $query=='xuly'){
                    include('./modules/quanlyphim/quanlyphimle/xuly.php' );
                }
                elseif($tam=='quanlyphimbo' && $query=='them'){
                    include('./modules/quanlyphim/quanlyphimbo/them.php' );
                } elseif($tam=='quanlyphimbo' && $query=='lietke'){
                    include('./modules/quanlyphim/quanlyphimbo/lietke.php' );
                }elseif($tam=='quanlyphim' && $query=='xuly'){
                    include('./modules/quanlyphim/xuly.php' );
                }elseif($tam=='quanlyphim' && $query=='lietke'){
                    include('./modules/quanlyphim/lietke.php' );
                }elseif($tam=='quanlyphim' && $query=='them'){
                    include('./modules/quanlyphim/them.php' );
                }elseif($tam=='quanlyphimbo' && $query=='xuly'){
                    include('./modules/quanlyphim/quanlyphimbo/xuly.php' );
                }elseif($tam=='quanlyphimbo' && $query=='suatapphim'){
                    include('./modules/quanlyphim/quanlyphimbo/suatapphim.php' );
                }elseif($tam=='quanlyphimbo' && $query=='lietketapphim'){
                    include('./modules/quanlyphim/quanlyphimbo/lietketapphim.php' );
                }elseif($tam=='quanlyphimbo' && $query=='sua'){
                    include('./modules/quanlyphim/quanlyphimbo/sua.php' );
                }elseif($tam=='quanlytheloai' && $query=='sua'){
                    include('./modules/quanlytheloai/sua.php' );
                }
                elseif($tam=='quanlytheloai' && $query=='lietke'){
                    include('./modules/quanlytheloai/lietke.php' );
                }  elseif($tam=='quanlytheloai' && $query=='xuly'){
                    include('./modules/quanlytheloai/xuly.php' );
                }  elseif($tam=='quanlyquocgia' && $query=='lietke'){
                    include('./modules/quanlyquocgia/lietke.php' );
                }  elseif($tam=='quanlyquocgia' && $query=='xuly'){
                    include('./modules/quanlyquocgia/xuly.php' );
                }  elseif($tam=='quanlyquocgia' && $query=='sua'){
                    include('./modules/quanlyquocgia/sua.php' );
                }
              elseif($tam=='quanlydaodien' && $query=='lietke'){
                include('./modules/quanlydaodien/lietke.php' );
            }  elseif($tam=='quanlydaodien' && $query=='xuly'){
                include('./modules/quanlydaodien/xuly.php' );
            }  elseif($tam=='quanlydaodien' && $query=='sua'){
                include('./modules/quanlydaodien/sua.php' );
            } elseif($tam=='quanlydaodien' && $query=='them'){
                include('./modules/quanlydaodien/them.php' );
            }
            elseif($tam=='quanlydienvien' && $query=='lietke'){
                include('./modules/quanlydienvien/lietke.php' );
            }  elseif($tam=='quanlydienvien' && $query=='xuly'){
                include('./modules/quanlydienvien/xuly.php' );
            }  elseif($tam=='quanlydienvien' && $query=='sua'){
                include('./modules/quanlydienvien/sua.php' );
            } elseif($tam=='quanlydienvien' && $query=='them'){
                include('./modules/quanlydienvien/them.php' );
            }
         elseif($tam=='dashboard' && $query=='lietke'){
            include('./modules/dashboard.php' );
        }


                    ?>
        </div>
      </section>