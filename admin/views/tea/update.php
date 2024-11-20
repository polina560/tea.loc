<?php

use common\components\helpers\UserUrl;
use common\models\TeaSearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Tea
 */

$this->title = Yii::t('app', 'Update: ') . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Tea Collections'), 'url' => ['/tea-collection/index']];
$this->params['breadcrumbs'][] = ['label' => $model->collection->title, 'url' => ['/tea-collection/view', 'id' => $model->id_collection]];

$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tea-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => false]) ?>

</div>
