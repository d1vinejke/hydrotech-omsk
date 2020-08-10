<?php
require '../db.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Админ панель | hydrotech-omsk.ru</title>
    <?php include "../assets/css-head.php"; ?>
</head>

<body>
<div>
    <div class="container-fluid">
        <div>
            <?php include "../assets/navbar.php"; ?>
            <hr>
        </div>
        <div class="row sup">
            <?php include 'assets/Admin_navbar.php'; ?>
            <div class="col-md gap">
                <div class="head-main">
                    <p>Администрационная панель</p>
                </div>
                <br>
                <div class="content">
                    <div class="row">
                        <div class="col-md">
                            <span class="font-italic text-dark">Добро пожаловать в панель управления сайтом!</span>
                            <p class="font-italic text-dark">
                                По всем вопросам и предложениям: <br>
                                Электронный адрес - <a href="mailto:keyn620@gmail.com">keyn620@gmail.com</a><br>
                                Телефон - <a href="tel:+79136779431">+7(913) 677-94-31</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</div>
<?php
    include "../assets/footer.php";
    include "../assets/js-body.php";
?>
</body>

</html>