<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

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
     * @return \yii\db\ActiveQuery
     */
    public function getSessions()
    {
        return $this->hasMany(Session::class, ['film_id' => 'id']);
    }
}
