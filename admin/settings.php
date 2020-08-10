<?php
require '../db.php';
$load = R::load("settings", 1);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Настройки сайта - Админ панель | hydrotech-omsk.ru</title>
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
                        <div class="col-md caption">
                            <form action="../libs/functions.php" method="post">
                                <div class="form-group">
                                    <label for="email"><b>Текущая почта: </b><?php echo $load->email ?></label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Впишите новую почту" required>
                                </div>
                                <button class="btn btn-outline-success" name="sent" type="submit">Изменить</button>
                            </form>
                        </div>
                        <div class="col-md caption">
                            <form action="../libs/functions.php" method="post">
                                <div class="form-group">
                                    <label for="email"><b>Текущая информация: </b> <a href="../about.php" data-toggle="tooltip" data-placement="top" title="Перейти">О предприятии</a></label>
                                    <textarea type="text" name="about" id="about" class="form-control" placeholder="О предприятии..." required></textarea>
                                </div>
                                <button class="btn btn-outline-success" name="changeInfo" type="submit">Изменить</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                    <br>
                    <br>
                    <br>
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
        </div>
    </div>
</div>
<?php
include "../assets/footer.php";
include "../assets/js-body.php";
?>
</body>

</html>