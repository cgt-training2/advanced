<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property integer $br_id
 * @property integer $companies_c_id
 * @property string $br_name
 * @property string $br_address
 * @property string $br_created_date
 * @property string $br_status
 *
 * @property Companies $companiesC
 * @property Departments[] $departments
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['br_id', 'companies_c_id', 'br_name', 'br_address', 'br_created_date'], 'required'],
            [['br_id','companies_c_id'], 'integer'],
            [['br_created_date'], 'safe'],
            [['br_status'], 'string'],
            [['br_name'], 'string', 'max' => 100],
            [['br_address'], 'string', 'max' => 255],
            [['companies_c_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['companies_c_id' => 'c_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'companies_c_id' => 'Company Name',
            'br_id' => 'Br ID',
            'br_name' => 'Br Name',
            'br_address' => 'Br Address',
            'br_created_date' => 'Br Created Date',
            'br_status' => 'Br Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesC()
    {
        return $this->hasOne(Companies::className(), ['c_id' => 'companies_c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Departments::className(), ['branches_br_id' => 'br_id']);
    }
}
