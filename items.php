<?php
require 'db.php';
$id = $_GET['id'];
$load = R::load('items', $id);
$loadRazdel = R::load('razdeli', $load->razdel);
$count = R::count("items");
if($id != $load->id){
    header("Location: /");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $load->title; ?> | site.ru</title>
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
                    <p><?php if($load->razdel >= 23 && $load->razdel < 29) {
                        echo 'Резиновые компенсаторы';
                        }else{
                            echo $loadRazdel->title;
                        }
                        echo ' -> ' . $load->title; ?>
                    </p>
                </div>
                <br>
                <div class="content">
                    <div class="row">
                        <div class="col-md" align="center">
                            <img class="border border-dark" src="https://hydrotech-omsk.ru/libs/<?php echo $load->_main_photo; ?>" alt="Фотография не найдена" width="350px" height="auto">
                            <hr>
                            <div id="carouselExampleSlidesOnly" class="carousel slide col-sm-4" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    $text = explode("\r\n", $load->other_photos);
                                    for ($i = 0; $i < count($text); $i++){
                                        if($text[$i] == $text[0]) { $active = "active"; } else $active = "";
                                        echo '<div class="carousel-item '. $active .'">';
                                        echo '    <img src="https://hydrotech-omsk.ru/libs/uploads/'. $text[$i] .'" class="d-block w-100" alt="">';
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md p-3">
                            <div class="card" style="width: fit-content; width: -moz-fit-content;">
                                <div class="card-header">
                                    Категория - <?php echo $loadRazdel->title; ?>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $load->title; ?></h5>
                                    <p class="card-text text-danger">Цена по запросу</p>
                                    <button type="button" class="btn btn-outline-primary pulse" data-toggle="modal" data-target="#exampleModalCenter">
                                        Заказать
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2" >

                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Формирование заявки</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <b>Вы выбрали: </b><?php echo $load->title; ?>
                                    <small id="TextHelp" class="form-text text-muted">Для отправки заявки впишите в поле ниже Ваши контактные данные.</small>
                                    <form action="libs/functions.php" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="hiddenInput" value="<?php echo $load->title; ?>" required hidden>
                                            <label for="email">Электронная почта</label>
                                            <input type="email" class="form-control" name="email" id="email" required>
                                            <label for="phone">Номер телефона</label>
                                            <input type="tel" class="form-control" name="phone" id="phone" required>
                                            <small id="TextHelp" class="form-text text-muted">Мы обязательно с Вами свяжемся в течении 24 часов.</small>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-outline-success" name="sentOrder">Отправить</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card w-75">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#panel1">Описание</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#panel2" onclick="generateTable()">Характеристики</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#panel3" onclick="generateTable2()">Условия эксплуатации</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#panel4">Области применения</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#panel5">Основные преимущества</a>
                                </li>
                            </ul>
                        </div>
                        <textarea name="excel_data" cols="30" rows="10" hidden><?php echo $load->size; ?></textarea>
                        <textarea name="excel_data2" cols="30" rows="10" hidden><?php echo $load->explotation; ?></textarea>
                        <div class="tab-content table-responsive">
                            <div id="panel1" class="tab-pane fade active show" style="min-height: 100px;"><?php echo $load->opisanie; ?></div>
                            <div id="panel2" class="tab-pane fade" style="min-height: 100px;"></div>
                            <div id="panel3" class="tab-pane fade" style="min-height: 100px;"></div>
                            <div id="panel4" class="tab-pane fade" style="min-height: 100px;"><?php echo $load->oblast; ?></div>
                            <div id="panel5" class="tab-pane fade" style="min-height: 100px;"><?php echo $load->plusi; ?></div>
                        </div>
                    </div>
                    <br>
                    <div class="alert alert-primary w-75" role="alert">
                        <h5>Дополнительная информация</h5>
                        <p>
                            <?php echo $load->short_text; ?>
                        </p>
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
<script>
    function generateTable() {
        var data = $('textarea[name=excel_data]').val();
        console.log(data);
        var rows = data.split("\n");

        var table = $('<table />');

        for(var y in rows) {
            var cells = rows[y].split("\t");
            var row = $('<tr />');
            for(var x in cells) {
                row.append('<td>'+cells[x]+'</td>');
            }
            table.append(row);
        }

// Insert into DOM
        $('#panel2').html(table);
    }

    function generateTable2() {
        var data = $('textarea[name=excel_data2]').val();
        console.log(data);
        var rows = data.split("\n");

        var table = $('<table />');

        for(var y in rows) {
            var cells = rows[y].split("\t");
            var row = $('<tr />');
            for(var x in cells) {
                row.append('<td>'+cells[x]+'</td>');
            }
            table.append(row);
        }

// Insert into DOM
        $('#panel3').html(table);
    }
</script>
</body>

