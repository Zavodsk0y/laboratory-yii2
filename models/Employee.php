<?php

namespace app\models;

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
            'id' => 'Идентификатор',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'age' => 'Возраст',
            'gender' => 'Пол',
            'graduate_id' => 'Научная степень',
            'post_id' => 'Должность',
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

    public function getGender()
    {
        switch ($this->gender) {
            case 1:
                return 'Мужской';
            case 0:
                return 'Женский';
        }
    }

    public function getGraduateName()
    {
        return $this->graduate->name;
    }

    public function getPostName()
    {
        return $this->post->name;
    }
}
