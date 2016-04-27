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
    public function imgDelete(array $imageName)
    {
        if (isset($imageName['delete_img']) && $imageName['delete_img'] && file_exists(GALLERY_FOLDER . $imageName['delete_img'])) {
            return unlink(GALLERY_FOLDER . $imageName['delete_img']);
        } else {
            return false;
        }
    }

    // получаем все файлы из директории
    public function getImages()
    {
        $filesList = scandir(GALLERY_FOLDER);
        $newFilesList = array();
        foreach ($filesList as $imageName) {
            if ($imageName == '.' || $imageName == '..') continue;

            $newFilesList[] = $imageName;
        }
        return $newFilesList;
    }

    public function sortForName()
    {
        $sortForNames = $this->getImages();
        asort($sortForNames);
        return $sortForNames;
    }

    public function sortForSize()
    {
        $filesList = $this->getImages();
        $sortForSize = array();
        foreach ($filesList as $imageName) {
            $sortForSize[$imageName] = filesize(GALLERY_FOLDER . $imageName);;
        }
        asort($sortForSize);
        $sortForSize = array_flip($sortForSize);
        $sortForSize = array_values($sortForSize);

        return $sortForSize;
    }
}