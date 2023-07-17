<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\BaseFileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "films".
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $description
 * @property string $duration
 * @property string $age_restriction
 *
 * @property Session[] $sessions
 */
class Film extends ActiveRecord
{
    public static string $imageFileLabel = 'imageFile';
    public UploadedFile|string|null $imageFile = null;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'films';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'image', 'description', 'duration', 'age_restriction'], 'required'],
            [['description'], 'string'],
            [['duration'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 10],
            [['imageFile'], 'image', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['age_restriction'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'image' => 'Image',
            'description' => 'Description',
            'duration' => 'Duration',
            'age_restriction' => 'Age Restriction',
        ];
    }

    /**
     * Gets query for [[Sessions]].
     *
     * @return ActiveQuery
     */
    public function getSessions(): ActiveQuery
    {
        return $this->hasMany(Session::class, ['film_id' => 'id']);
    }

    public function getImageFileExtension(): ?string
    {
        if (!is_null($this->imageFile)) {
            return $this->imageFile->extension;
        } else {
            return null;
        }
    }

    /**
     * @throws Exception
     */
    public function saveImage(): void
    {
        $uploadDirectory = $this->getUploadDirectory();

        $this->createDirectoryIfNotExists();

        $this->imageFile->saveAs($uploadDirectory . '/' . $this->id . '.' . $this->image);
    }

    /**
     * @throws Exception
     */
    public function createDirectoryIfNotExists(): void
    {
        if (!file_exists($this->getUploadDirectory())) {
            BaseFileHelper::createDirectory($this->getUploadDirectory());
        }
    }

    public function getUploadDirectory(): string
    {
        return Yii::getAlias('@web') . 'uploads/film';
    }

    /**
     * @throws Exception
     */
    public function save($runValidation = true, $attributeNames = null): bool
    {
        $this->image = $this->getImageFileExtension();
        if (parent::save($runValidation, $attributeNames)) {
            $this->saveImage();
            return true;
        } else {
            return false;
        }
    }

}
