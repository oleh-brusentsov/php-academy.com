<?php
require "gallery_defines.php";

class image
{

    // добавление фото
    public function imgIsSet(array $imageFile)
    {
        if (isset($imageFile['image']) && $imageFile['image']['name']) return true;
        else return false;
    }

    public function imgAllowedType(array $imgFile)
    {
        $allowedType = array('image/png');
        if (in_array($imgFile['image']['type'], $allowedType)) return true;
        else return false;
    }

    public function imgSize(array $imageFile)
    {
        $allowedSize = 400 * 1024;
        if ($imageFile['image']['size'] <= $allowedSize) return true;
        else return false;
    }

    public function imgMoveToGallery(array $imageFile)
    {
        move_uploaded_file($imageFile['image']['tmp_name'], GALLERY_FOLDER . $imageFile['image']['name']);
    }

    // удаление фото
    public function imgDelete (array $imageName) {
        if (isset($imageName['delete_img']) && $imageName['delete_img'] && file_exists(GALLERY_FOLDER . $imageName['delete_img'])) {
            return unlink(GALLERY_FOLDER . $imageName['delete_img']);
        }
        else {
            return false;
        }
    }

    // получаем все файлы из директории
    public function getImagesNameVsSize ()
    {
        $filesList = scandir(GALLERY_FOLDER);
        $filesNameVsSize = array();
        foreach ($filesList as $fileName) {
            if ($fileName == '.' || $fileName == '..') continue;

            $filesNameVsSize[$fileName] = filesize(GALLERY_FOLDER . $fileName);
        }
        return $filesNameVsSize;
    }

    public function imagesSort (array $actionSort, array $filesNameVsSize) {
        if ($actionSort['sorting'] == 'for_name') return ksort($filesNameVsSize);
        elseif ($actionSort['sorting'] == 'for_size') return asort($filesNameVsSize);
        else return false;
    }
}
