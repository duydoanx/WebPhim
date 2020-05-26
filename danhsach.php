<?php

?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="script/HeaderScript.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto">
    <link rel="stylesheet" type="text/css" href="style/headerStyle.css">
    <link rel="stylesheet" type="text/css" href="style/StyleIndex.css">
    <title>Phim Hay</title>
    <link rel="icon" href="img/logo.png">
</head>
<body class="bg-dark">
<?php
    include_once "Other/header.php";
    include_once "Controller/ControllerPhim.php";
    $controllerPhim = new ControllerPhim();

    //Thay doi cac bien sau
    $start = 0;
    $trang = 1;
    $num = 24;
    $size = $controllerPhim->getLengthPhim();
    $duyet = "phimmoi";

    if (isset($_REQUEST['trang'])){
        if ($_REQUEST['trang'] > ceil($size/$num)){
            echo "<h1 class='text-danger topFix m-auto'>Sai thông tin trang</h1>";
        }
        $trang = $_REQUEST['trang'];
        $start = ($trang - 1) * $num;
    }
    $allPhim = $controllerPhim->getPhims($start, $num);

    if(isset($_REQUEST['duyet'])){
        if (strcmp($_REQUEST['duyet'],"quocgia")){

        }
    }

?>
<div class="container topFix">
    <div class="container">
        <div class="row">
            <?php
            $anhPhim = "";
            foreach ($allPhim as $item) {
                $anhPhim = $item->getANHPHIM();
                echo "<div class=\"col-md-4 col-lg-3 col-6 p-1\">";
                echo "<div class=\"card w-100 h-100 mt-2 mb-2 ml-0 mr-0\" style=\"width: 18rem;\">";
                echo "<a class='stretched-link' title='".$item->getTENPHIMVN()."' href='phim.php?phim=true&id=".$item->getID()."&tenphim=".$item->getTENPHIMGOC()."' >";
                echo "<img class=\"card-img-top\" src=\"".$item->getANHPHIM()."\" alt=\"Card image cap\">";
                echo "<div class=\"card-body\">
                                    <h6 class=\"d-inline-block text-truncate title-size\" title='".$item->getTENPHIMVN()."' >".$item->getTENPHIMVN()."</h6>                             
                                </div>
                                </a>
                            </div>
                        </div>";
            }
            ?>
        </div>
    </div>
    <nav aria-label="Page navigation" class="mt-3">
        <ul class="pagination">
            <?php
            if ($_REQUEST['trang'] <= ceil($size/$num)) {
                if ($start > 0) {
                    echo "<li class=\"page-item\"><a class=\"page-link bg-success text-light\" href=\"danhsach.php?duyet=$duyet&trang=" . ($trang - 1) . "\">Trang trước</a></li>";
                }
                echo "<li class=\"page-item\"><a class=\"page-link bg-success text-light\" href=\"danhsach.php?duyet=$duyet&trang=$trang\">$trang</a></li>";

                if ($trang + 1 <= ceil($size / $num)) {
                    echo "<li class=\"page-item\"><a class=\"page-link bg-success text-light\" href=\"danhsach.php?duyet=$duyet&trang=" . ($trang + 1) . "\">Trang kế</a></li>";
                }
            }
            ?>
        </ul>
    </nav>
</div>
</body>
</html>

