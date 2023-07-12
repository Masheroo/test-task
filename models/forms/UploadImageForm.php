<?php

namespace app\models\forms;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadImageForm extends Model
{
    public UploadedFile $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'image', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

    public function getExtension(): string
    {
        return $this->imageFile->extension;
    }
}