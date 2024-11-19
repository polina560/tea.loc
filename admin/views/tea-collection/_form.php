<?php

use admin\widgets\ckfinder\CKFinderInputFile;
use common\widgets\AppActiveForm;
use kartik\icons\Icon;
use yii\bootstrap5\Html;
use yii\helpers\Url;

/**
 * @var $this     yii\web\View
 * @var $model    common\models\TeaCollection
 * @var $form     AppActiveForm
 * @var $isCreate bool
 */
?>

<div class="tea-collection-form">

    <?php $form = AppActiveForm::begin() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'en_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'en_subtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->widget(\kartik\color\ColorInput::class)
//    textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->widget(CKFinderInputFile::class) ?>

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
