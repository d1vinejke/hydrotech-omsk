<?php
require '../db.php';
    //Add item
    if(isset($_POST['addItem'])){
        $addItem = R::dispense("items");
        $addItem->razdel = $_POST['razdel'];
        $addItem->title = nl2br($_POST['name']);
        $addItem->opisanie = nl2br($_POST['opisanie']);
        $addItem->size = nl2br($_POST['size']);
        $addItem->explotation = nl2br($_POST['explotation']);
        $addItem->oblast = nl2br($_POST['oblast']);
        $addItem->plusi = nl2br($_POST['plusi']);
        $addItem->short_text = nl2br($_POST['text1']);
        define("UPLOAD_DIR", "uploads/");
        if (!empty($_FILES["photo1"])) {
            $myFile = $_FILES["photo1"];
            if ($myFile["error"] !== UPLOAD_ERR_OK) {
                echo "<p>Произошла ошибка.</p>";
                exit;
            }
            // обеспечиваем безопасное имени файла
            $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
            // не перезаписываем существующий файл
            $i = 0;
            $parts = pathinfo($name);
            while (file_exists(UPLOAD_DIR . $name)) {
                $i++;
                $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
            }
            // сохраняем файл из временного каталога
            $success = move_uploaded_file($myFile["tmp_name"],
                UPLOAD_DIR . $name);
            $addItem->MainPhoto = UPLOAD_DIR . $name;
            R::store($addItem);
            if (!$success) {
                echo "<p>Не удалось сохранить файл.</p>";
                exit;
            }
        }

        if (!empty($_FILES["multiPhotos"])) {
            $files = '';
            foreach($_FILES['multiPhotos']['name'] as $k=>$f) {
                if (!$_FILES['multiPhotos']['error'][$k]) {
                    if (is_uploaded_file($_FILES['multiPhotos']['tmp_name'][$k])) {
                        if (move_uploaded_file($_FILES['multiPhotos']['tmp_name'][$k], "uploads/".$_FILES['multiPhotos']['name'][$k])) {
                            $files .= $_FILES['multiPhotos']['name'][$k]."\r\n";
                        }
                    }
                }
            }
            $files = trim($files);
            $addItem->other_photos = $files;
            R::store($addItem);
        }
        echo '<meta http-equiv="REFRESH" content="0;URL=/admin/addItem.php">';
    }

    //Delete item
    if(isset($_POST['deleteItem'])){
        $id = $_POST['getItem'];
        $deleteItem = R::load("items", $id);
        R::trash($deleteItem);
        echo '<meta http-equiv="REFRESH" content="0;URL=/admin/deleteItem.php">';
    }

    //Completing order
    if(isset($_POST['sentOrder'])){
        $dispense = R::dispense("orders");
        $dispense->order_name = $_POST['hiddenInput'];
        $dispense->email = $_POST['email'];
        $dispense->phone = $_POST['phone'];
        $dispense->date = date("F j, Y, g:i a");
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $orderName = $_POST['hiddenInput'];
        R::store($dispense);
        $dateUser = date("F j, Y, g:i a");
        $message = "Дата заявки: $dateUser\n Электронный адрес: $email\n Номер телефона: $phone\n Заявка на: $orderName\n";
        $count = R::count('orders');
        $count += 1;
        mail("contact@hydrotech-omsk.ru", "Заявка от пользователя №$count", $message, "From: admin@hydrotech-omsk.ru \r\n");
        echo '<meta http-equiv="REFRESH" content="1;URL=/">';
    }

    //settings
    if(isset($_POST['sent'])){
        $sent = R::load("settings", 1);
        $sent->email = $_POST['email'];
        R::store($sent);
        echo '<meta http-equiv="REFRESH" content="1;URL=/">';
    }

    if(isset($_POST['changeInfo'])){
        $change = R::load("settings", 1);
        $change->about = nl2br($_POST['about']);
        R::store($change);
        echo '<meta http-equiv="REFRESH" content="1;URL=/">';
    }