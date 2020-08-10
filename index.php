<?php
    require 'db.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Главная | Hydrotech-omsk.ru</title>
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
                        <p><i class="fa fa-thumb-tack"></i> Главная страница</p>
                    </div>
                    <br>
                    <div class="content">
                        <div class="row">
                            <?php
                                $Items = R::findCollection("items");
                                while ($Item = $Items->next()){
                                    echo '<div class="col-md caption">';
                                    echo '    <a href="/items.php?id=' . $Item->id . '">';
                                    echo '    <figure class="rounded bg-white restricted">';
                                    echo '      <img src="https://hydrotech-omsk.ru/libs/' . $Item->_main_photo . '" alt="" class="w-100 card-img-top">';
                                    echo '        <figcaption class="p-4 card-img-bottom">';
                                    echo '            <h2 class="h6 font-weight-bold mb-2">' . $Item->title . '</h2>';
                                    echo '        </figcaption>';
                                    echo '    </figure>';
                                    echo '    </a>';
                                    echo '</div>';
                                }
                            ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
        include 'assets/footer.php';
        include 'assets/js-body.php';
    ?>
</body>

</html>