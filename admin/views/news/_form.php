<?php

use admin\widgets\ckfinder\CKFinderInputFile;
use admin\widgets\input\Select2;
use common\widgets\AppActiveForm;
use kartik\icons\Icon;
use yii\bootstrap5\Html;
use yii\helpers\Url;

/**
 * @var $this     yii\web\View
 * @var $model    common\models\News
 * @var $form     AppActiveForm
 * @var $isCreate bool
 */
?>

<div class="news-form">

    <?php $form = AppActiveForm::begin() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'en_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'API_priority')->widget(Select2::class, ['data' => \common\enums\PriorityAPI::indexedDescriptions(), 'hideSearch' => true]) ?>

    <?= $form->field($model, 'date')->widget(\admin\widgets\input\DatePicker::class) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'en_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(\admin\widgets\ckeditor\EditorClassic::class); ?>

    <?= $form->field($model, 'en_text')->widget(\admin\widgets\ckeditor\EditorClassic::class); ?>

    <?= $form->field($model, 'image')->widget(CKFinderInputFile::class) ?>

    <?php ?>

<!--    --><?php //= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->widget(
        Select2::class,
        ['data' => \common\enums\PublishedStatus::indexedDescriptions(), 'hideSearch' => true]) ?>

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
