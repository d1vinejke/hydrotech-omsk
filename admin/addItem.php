<?php
require '../db.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
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
                    <p>Администрационная панель -> Добавить товар</p>
                </div>
                <br>
                <div class="content">
                    <div class="row">
                        <div class="col-xl caption">
                            <form action="../libs/functions.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="selector">Выбрать раздел</label>
                                    <select class="form-control" name="razdel" id="selector" required>
                                        <?php
                                            $parse = R::findCollection("razdeli");
                                            while ($parsed = $parse->next()){
                                                echo '<option value="' . $parsed->id . '">' . $parsed->title . '</option>';
                                            }
                                        ?>
                                    </select>
                                    <label for="exampleInputText1">Название</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputText1" aria-describedby="TextHelp" required>
                                    <label for="textArea">Описание</label>
                                    <textarea id="textArea" class="form-control" name="opisanie" cols="5" rows="3" required></textarea>
                                    <label for="textArea2">Характеристики</label>
                                    <textarea id="textArea2" class="form-control" name="size" cols="5" rows="3" required></textarea>
                                    <small id="TextHelp" class="form-text text-muted">Поле для вставки таблицы, путем копирования из файла Excel!</small>
                                    <label for="textArea3">Условия эксплуатации</label>
                                    <textarea id="textArea3" class="form-control" name="explotation" cols="5" rows="3"></textarea>
                                    <small id="TextHelp" class="form-text text-muted">Поле для вставки таблицы, путем копирования из файла Excel!</small>
                                    <label for="textArea4">Область применения</label>
                                    <textarea id="textArea4" class="form-control" name="oblast" cols="5" rows="3"></textarea>
                                    <label for="textArea5">Преимущества</label>
                                    <textarea id="textArea5" class="form-control" name="plusi" cols="5" rows="3"></textarea>
                                    <label for="customFile">Основная фотография</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="photo1" id="customFile" required>
                                        <label class="custom-file-label" for="customFile">Выбрать файл</label>
                                    </div>
                                    <label for="textArea1">Дополнительная информация</label>
                                    <textarea id="textArea1" class="form-control" name="text1" cols="5" rows="3"></textarea>
                                    <small id="TextHelp" class="form-text text-muted">Дополнительная информация будет добавлена в отдельную рамку, чтобы пользователь обязательно обратил на это внимание.</small>
                                    <label for="customFile1">Дополнительные фотографии</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="multiPhotos[]" id="customFile1" multiple>
                                        <label class="custom-file-label" for="customFile1">Выбрать файл</label>
                                    </div>
                                </div>
                                <button type="submit" name="addItem" class="btn btn-primary">Добавить</button>
                            </form>
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