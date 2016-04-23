<style>
    .imageWrapper {
        width: 120px;
        height: 120px;
        float: left;
    }
    .imageWrapper img{
        max-width: 100px;
        max-height: 100px;
        padding: 5px;
        background-color: #fff;
        border: 1px solid #8c8c8c;
    }
    .imageWrapper img:hover{
        background-color: #8c8c8c;
        border: 1px solid #000;
</style>
<form method="POST">
    <select name="sorting">
        <option value="for_name">По имени</option>
        <option value="for_size">По размеру</option>
    </select>
    <input type="submit" value="Сортировать">
</form>
<?php
define('GALLERY_FOLDER', __DIR__ . '\images\\');
$allowedType = array('image/png');
$imageSize = 400*1024;


// удаление фото
if(isset($_POST['delete_img']) && $_POST['delete_img']) {
    if (file_exists(GALLERY_FOLDER . $_POST['delete_img'])) {
        unlink(GALLERY_FOLDER . $_POST['delete_img']);
        echo "Файл {$_POST['delete_img']} успешно удален!";
    }
}

// добавление фото
if (isset($_FILES['image']) && $_FILES['image']['name']) {
    if (in_array($_FILES['image']['type'], $allowedType)) {
        if ($_FILES['image']['size'] <= $imageSize) {
            move_uploaded_file($_FILES['image']['tmp_name'], GALLERY_FOLDER . $_FILES['image']['name']);
            echo "Фото успешно добавлено!";
        }
        else {
            echo "Фото превышает максимально допустимый размер!!";
        }
    }
    else {
        echo "Фото имеет другой формат!";
    }
}


$filesList = scandir(GALLERY_FOLDER);
$filesNamesSize = array();
foreach ($filesList as $fileName) {
    if ($fileName == '.' || $fileName == '..') continue;

    $filesNamesSize[$fileName] = filesize(GALLERY_FOLDER . $fileName);
}


// сортировка по имени или размеру
if (isset($_POST['sorting']) && $_POST['sorting']) {
    if ($_POST['sorting'] == 'for_name') {
        ksort($filesNamesSize);
    } elseif ($_POST['sorting'] == 'for_size') {
        asort($filesNamesSize);
    }
}

foreach ($filesNamesSize as $name => $size) {
    if ($name == '.' || $name == '..') continue ?>
        <div class='imageWrapper'>
            <a href="http://php-academy.com/lessons/04/gallery/images/<?=$name?>" target="_blank"><img src='http://php-academy.com/lessons/04/gallery/images/<?=$name?>' title="Название: <?=$name?>&#013;Дата создания: <?=date("d-m-Y H:i:s", filectime(GALLERY_FOLDER . $name))?>&#013;Размер файла: <?=round($size/1024, 2) . ' Кб'?>"></a>
            <form>
                <input type="hidden" name="delete_img" value="<?=$name?>"><br>
                <input type="image" src="/img/delete.png" formmethod="post">
            </form>
        </div>
    <?php } ?>
<div style="clear: both;"></div>
<br>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="image" id="image" accept="image/jpeg, image/png">

    <input type="submit" value="Добавить новое фото">
</form>

