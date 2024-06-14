<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "graduate".
 *
 * @property int $id
 * @property string $name
 *
 * @property Employee[] $employees
 */
class Graduate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'graduate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
        ];
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::class, ['graduate_id' => 'id']);
    }

    public function getName()
    {
        return $this->name;
    }
}
