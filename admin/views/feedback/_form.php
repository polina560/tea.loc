<?php

use admin\widgets\input\Select2;
use common\widgets\AppActiveForm;
use kartik\icons\Icon;
use yii\bootstrap5\Html;
use yii\helpers\Url;

/**
 * @var $this     yii\web\View
 * @var $model    common\models\Feedback
 * @var $form     AppActiveForm
 * @var $isCreate bool
 */
?>

<div class="feedback-form">

    <?php $form = AppActiveForm::begin() ?>

<!--    --><?php //= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--    --><?php //= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<!--    --><?php //= $form->field($model, 'message')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'moderation_status')->widget(
        Select2::class,
        ['data' => \common\enums\ModerationStatus::indexedDescriptions(), 'hideSearch' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>


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
