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
<?php
define('GALLERY_FOLDER', __DIR__ . '\images\\');
require_once 'classes/image.php';

// добавление фото
$addUserImg = new image();
if ($addUserImg->imgIsSet($_FILES)) {
    if ($addUserImg->imgAllowedType($_FILES)) {
        if ($addUserImg->imgSize($_FILES)) {
            $addUserImg->imgMoveToGallery($_FILES);
            echo 'Ваше фото успешно добавлено!';
        }
        else {
            echo 'Фото превышает максимально допустимый размер!';
        }
    }
    else {
        echo 'Формат файла не поддерживается!';
    }
}

// удаление фото
$deleteUserImg = new image();
if ($deleteUserImg->imgDelete($_GET)) {
    echo "Файл {$_GET['delete_img']} успешно удален!";
}

// выводим все файлы из директории
$imagesList = new image();
$filesNameVsSize = $imagesList->getImagesNameVsSize();

// сортировка по имени или размеру
if (isset($_POST['sorting']) && $_POST['sorting']) {
    $imageSorting = new image();
    if ($filesNameVsSize = $imageSorting->imagesSort($_POST, $filesNameVsSize)) {
    }
}
?>
<form method="POST">
    <label for="sorting"></label>
    <select name="sorting" id="sorting">
        <option value="for_name" <?php echo ($_POST['sorting'] == 'for_name') ? 'selected' : ''?>>По имени</option>
        <option value="for_size" <?php echo ($_POST['sorting'] == 'for_size') ? 'selected' : ''?>>По размеру</option>
    </select>
    <input type="submit" value="Сортировать">
</form>

<?php
foreach ($filesNameVsSize as $name => $size) {
    if ($name == '.' || $name == '..') continue ?>
<div class='imageWrapper'>
    <a href="http://php-academy.com/lessons/05/gallery_oop/images/<?=$name?>" target="_blank">
        <img src='http://php-academy.com/lessons/05/gallery_oop/images/<?=$name?>' title="Название: <?=$name?>&#013;Дата создания: <?=date("d-m-Y H:i:s", filectime(GALLERY_FOLDER . $name))?>&#013;Размер файла: <?=round($size/1024, 2) . ' Кб'?>">
    </a>
    <a href="?delete_img=<?=$name?>">Удалить изображение</a>
</div>
<?php } ?>
<div style="clear: both;"></div>
<br>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="image" id="image" accept="image/jpeg, image/png">

    <input type="submit" value="Добавить новое фото">
</form>

