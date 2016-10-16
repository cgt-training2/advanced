<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property integer $dept_id
 * @property integer $branches_br_id
 * @property string $dept_name
 * @property integer $companies_c_id
 * @property string $dept_created_date
 * @property string $dept_status
 *
 * @property Companies $companiesC
 * @property Branches $branchesBr
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dept_id', 'branches_br_id', 'dept_name', 'companies_c_id', 'dept_created_date'], 'required'],
            [['dept_id', 'branches_br_id', 'companies_c_id'], 'integer'],
            [['dept_created_date'], 'safe'],
            [['dept_status'], 'string'],
            [['dept_name'], 'string', 'max' => 100],
            [['companies_c_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['companies_c_id' => 'c_id']],
            [['branches_br_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['branches_br_id' => 'br_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dept_id' => 'Dept ID',
            'branches_br_id' => 'Branches Br ID',
            'dept_name' => 'Dept Name',
            'companies_c_id' => 'Companies C ID',
            'dept_created_date' => 'Dept Created Date',
            'dept_status' => 'Dept Status',
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
    public function getBranchesBr()
    {
        return $this->hasOne(Branches::className(), ['br_id' => 'branches_br_id']);
    }
}
