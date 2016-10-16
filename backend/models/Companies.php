<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property integer $c_id
 * @property string $c_name
 * @property string $c_email
 * @property string $c_address
 * @property string $c_created_date
 * @property string $c_status
 *
 * @property Branches[] $branches
 * @property Departments[] $departments
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'c_name', 'c_email', 'c_address', 'c_created_date'], 'required'],
            [['c_id'], 'integer'],
            [['c_created_date'], 'safe'],
            [['c_status'], 'string'],
            [['c_name', 'c_email'], 'string', 'max' => 100],
            [['c_address'], 'string', 'max' => 255],
            [['c_email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'C ID',
            'c_name' => 'C Name',
            'c_email' => 'C Email',
            'c_address' => 'C Address',
            'c_created_date' => 'C Created Date',
            'c_status' => 'C Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branches::className(), ['companies_c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Departments::className(), ['companies_c_id' => 'c_id']);
    }
}
