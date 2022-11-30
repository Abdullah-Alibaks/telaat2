<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "studenten".
 *
 * @property int $id
 * @property string $name
 * @property string $klas
 * @property int $minuten
 * @property string $reden
 */
class Studenten extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'studenten';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'klas', 'minuten', 'reden'], 'required'],
            [['minuten'], 'integer'],
            [['name', 'klas', 'reden'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Naam Student',
            'klas' => 'Klas',
            'minuten' => 'Minuten te laat',
            'reden' => 'Reden te laat',
        ];
    }
}
