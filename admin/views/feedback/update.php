<?php

use common\components\helpers\UserUrl;
use common\models\FeedbackSearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Feedback
 */

$this->title = Yii::t('app', 'Update: ') . $model->name;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Feedback'),
    'url' => UserUrl::setFilters(FeedbackSearch::class)
];
$this->params['breadcrumbs'][] = ['label' => Html::encode($model->name), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="feedback-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => false]) ?>

</div>
