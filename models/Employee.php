<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string|null $patronymic
 * @property int $age
 * @property int $gender
 * @property int|null $graduate_id
 * @property int|null $post_id
 *
 * @property Graduate $graduate
 * @property Post $post
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'age', 'gender'], 'required'],
            [['age', 'gender', 'graduate_id', 'post_id'], 'integer'],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 255],
            [['graduate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Graduate::class, 'targetAttribute' => ['graduate_id' => 'id']],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::class, 'targetAttribute' => ['post_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'age' => 'Age',
            'gender' => 'Gender',
            'graduate_id' => 'Graduate ID',
            'post_id' => 'Post ID',
        ];
    }

    /**
     * Gets query for [[Graduate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGraduate()
    {
        return $this->hasOne(Graduate::class, ['id' => 'graduate_id']);
    }

    /**
     * Gets query for [[Post]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }
}
