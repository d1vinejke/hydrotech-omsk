<?php
require '../db.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Удалить товар - Админ панель | hydrotech-omsk.ru</title>
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
                    <p>Администрационная панель -> Удалить</p>
                </div>
                <br>
                <div class="content">
                    <div class="row">
                        <div class="col-md caption">
                            <form action="../libs/functions.php" method="post">
                                <div class="form-group">
                                    <label for="getItem">Выбрать</label>
                                    <select class="form-control" name="getItem" id="getItem" required>
                                        <?php
                                            $load = R::findCollection("items");
                                            while ($getItem = $load->next()){
                                                echo '<option value="' . $getItem->id . '">' . $getItem->id . ' - ' . $getItem->title . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <button class="btn btn-outline-danger" type="submit" name="deleteItem">Удалить</button>
                            </form>
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
                    <br>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md caption">

                        </div>
                    </div>
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