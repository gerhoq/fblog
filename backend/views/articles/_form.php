<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bajadev\ckeditor\CKEditor;
use nickdenry\ckeditorRoxyFileman\RoxyFileManager;
use backend\models\Categories;

?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->widget(CKEditor::className(), [
        'editorOptions' => RoxyFileManager::attach([
            'preset' => 'basic', /* basic, standard, full*/
            'inline' => false,
        ]),
    ]); ?>


    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageurl')->textInput(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(Categories::find()
        ->select(['title'])
        ->indexBy('id')
        ->column()
    ); ?>

    <?= $form->field($model, 'published_date')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'views')->textInput() ?>

    <?= $form->field($model, 'home')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
