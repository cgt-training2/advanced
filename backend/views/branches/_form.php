<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Companies;

/* @var $this yii\web\View */
/* @var $model app\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'companies_c_id')->dropDownList(

        ArrayHelper::map(Companies::find()->all(),'c_id','c_name'),
        ['prompt'=>'select Company']

    )?>

    <?= $form->field($model, 'br_id')->textInput() ?>

    <?= $form->field($model, 'br_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'br_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'br_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', '' => '', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
