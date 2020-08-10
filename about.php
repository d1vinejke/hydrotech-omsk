<?php
require 'db.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Краткое описание | Hydrotech-omsk.ru</title>
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
                    <p><i class="fa fa-thumb-tack"></i> О предприятии</p>
                </div>
                <br>
                <div class="content">
                    <div class="row">
                        <?php
                        $settings = R::findCollection("settings");
                        while ($setting = $settings->next()){
                            echo '<p>' . $setting->about . '</p>';
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