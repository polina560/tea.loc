<?php

use admin\widgets\ckfinder\CKFinderInputFile;
use common\widgets\AppActiveForm;
use kartik\icons\Icon;
use yii\bootstrap5\Html;
use yii\helpers\Url;

/**
 * @var $this     yii\web\View
 * @var $model    common\models\Tea
 * @var $form     AppActiveForm
 * @var $isCreate bool
 */
?>

<div class="tea-form">

    <?php $form = AppActiveForm::begin() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'en_title')->textInput(['maxlength' => true]) ?>

    <?php $collections = new \common\models\TeaCollection();?>

    <?= $form->field($model, 'id_collection')->dropDownList($collections->getCollectionNameArray()) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'en_subtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(\admin\widgets\ckeditor\EditorClassic::class); ?>

    <?= $form->field($model, 'en_description')->widget(\admin\widgets\ckeditor\EditorClassic::class); ?>

    <?= $form->field($model, 'background_image')->widget(CKFinderInputFile::class) ?>

    <?= $form->field($model, 'image')->widget(CKFinderInputFile::class) ?>

    <?= $form->field($model, 'en_image')->widget(CKFinderInputFile::class) ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'en_weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brewing_temperature')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'en_brewing_temperature')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brewing_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'en_brewing_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'buy_button')->dropDownList(array_column(\common\enums\Boolean::class::cases(), 'name')) ?>

    <?= $form->field($model, 'shop_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'en_shop_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'API_priority')->textInput() ?>

    <div class="form-group">
        <?php if ($isCreate) {
            echo Html::submitButton(
                Icon::show('save') . Yii::t('app', 'Save And Create New'),
                ['class' => 'btn btn-success', 'formaction' => Url::to() . '?redirect=create']
            );
            echo Html::submitButton(
                Icon::show('save') . Yii::t('app', 'Save And Return To List'),
                ['class' => 'btn btn-success', 'formaction' => Url::to() . '?redirect=index']
            );
        } ?>
        <?= Html::submitButton(Icon::show('save') . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php AppActiveForm::end() ?>

</div>
