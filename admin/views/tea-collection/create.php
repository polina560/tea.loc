<?php

use common\components\helpers\UserUrl;
use common\models\TeaCollectionSearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\TeaCollection
 */

$this->title = Yii::t('app', 'Create Tea Collection');
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Tea Collections'),
    'url' => UserUrl::setFilters(TeaCollectionSearch::class)
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tea-collection-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => true]) ?>

</div>
