<?php

use admin\components\widgets\detailView\Column;
use admin\modules\rbac\components\RbacHtml;
use common\components\helpers\UserUrl;
use common\models\NewsSearch;
use yii\widgets\DetailView;

/**
 * @var $this  yii\web\View
 * @var $model common\models\News
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'News'),
    'url' => UserUrl::setFilters(NewsSearch::class)
];
$this->params['breadcrumbs'][] = RbacHtml::encode($this->title);
?>
<div class="news-view">

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
            Column::widget(['attr' => 'API_priority']),
            Column::widget(['attr' => 'date', 'format' => 'datetime']),
            Column::widget(['attr' => 'description']),
            Column::widget(['attr' => 'en_description']),
            Column::widget(['attr' => 'text']),
            Column::widget(['attr' => 'en_text']),
            Column::widget(['attr' => 'image']),
            Column::widget(['attr' => 'status', 'item' => \admin\enums\PublishedStatus::class]),

        ]
    ]) ?>

</div>
