<?php

use admin\components\widgets\detailView\Column;
use admin\components\widgets\detailView\ColumnImage;
use admin\modules\rbac\components\RbacHtml;
use common\components\helpers\UserUrl;
use common\models\TeaCollectionSearch;
use yii\widgets\DetailView;

/**
 * @var $this  yii\web\View
 * @var $model common\models\TeaCollection
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Tea Collections'),
    'url' => UserUrl::setFilters(TeaCollectionSearch::class)
];
$this->params['breadcrumbs'][] = RbacHtml::encode($this->title);
?>
<div class="tea-collection-view">

    <h1><?= RbacHtml::encode($this->title) ?></h1>

    <p>
        <?= RbacHtml::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= RbacHtml::a(
            Yii::t('app', 'Delete'),
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post'
                ]
            ]
        ) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            Column::widget(),
            Column::widget(['attr' => 'title']),
            Column::widget(['attr' => 'en_title']),
            Column::widget(['attr' => 'subtitle']),
            Column::widget(['attr' => 'en_subtitle']),
            Column::widget(['attr' => 'color']),
            ColumnImage::widget(['attr' => 'image']),
        ]
    ]) ?>

</div>
