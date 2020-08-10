<?php
require 'db.php';
$id = $_GET['id'];
$load = R::findCollection("items");
$loadRazdel = R::load("razdeli", $id);
$count = R::count("razdeli");
if($count < $id){
    header("Location: /");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <?php include 'assets/css-head.php'; ?>
</head>

<body>
<div>
    <div class="container-fluid">
        <div>
            <?php include "assets/navbar.php"; ?>
            <hr>
        </div>
        <div class="row sup">
            <?php include "assets/menu.php"; ?>
            <div class="col-md gap">
                <div class="head-main">
                    <p><i class="fa fa-thumb-tack"></i> Главная страница -> Разделы -> <?php echo $loadRazdel->title; ?></p>
                </div>
                <br>
                <div class="content">
                    <div class="row">
                        <?php
                        while ($loads = $load->next()){
                            if($loads->razdel == $id){
                                echo '    <div class="col-md caption">';
                                echo '        <a href="/items.php?id=' . $loads->id . '">';
                                echo '        <figure class="rounded bg-white">';
                                echo '            <img src="https://hydrotech-omsk.ru/libs/' . $loads->_main_photo . '" alt="" class="w-100 card-img-top">';
                                echo '            <figcaption class="p-4 card-img-bottom">';
                                echo '                <h2 class="h5 font-weight-bold mb-2">' . $loads->title . '</h2>';
                                echo '                <p class="small text-muted font-italic">' . $loads->text . '</p>';
                                echo '            </figcaption>';
                                echo '        </figure>';
                                echo '        </a>';
                                echo '    </div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<div class="brands">
    <a href="#">
        <img src="assets/img/instacart.png">
        <img src="assets/img/kickstarter.png">
        <img src="assets/img/lyft.png">
        <img src="assets/img/shopify.png">
        <img src="assets/img/pinterest.png">
        <img src="assets/img/twitter.png">
    </a>
</div>-->

<?php
include 'assets/footer.php';
include 'assets/js-body.php';
?>
</body>

</html>