<?php

use admin\components\widgets\detailView\Column;
use admin\components\widgets\detailView\ColumnImage;
use admin\modules\rbac\components\RbacHtml;
use common\components\helpers\UserUrl;
use common\models\TeaSearch;
use yii\widgets\DetailView;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Tea
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Tea'),
    'url' => UserUrl::setFilters(TeaSearch::class)
];
$this->params['breadcrumbs'][] = RbacHtml::encode($this->title);
?>
<div class="tea-view">

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
            Column::widget(['attr' => 'id_collection', 'viewAttr' => 'collection.title']),
            Column::widget(['attr' => 'subtitle']),
            Column::widget(['attr' => 'en_subtitle']),
            Column::widget(['attr' => 'description']),
            ColumnImage::widget(['attr' => 'en_description']),
            ColumnImage::widget(['attr' => 'background_image']),
            ColumnImage::widget(['attr' => 'image']),
            ColumnImage::widget(['attr' => 'en_image']),
            Column::widget(['attr' => 'weight']),
            Column::widget(['attr' => 'en_weight']),
            Column::widget(['attr' => 'brewing_temperature']),
            Column::widget(['attr' => 'en_brewing_temperature']),
            Column::widget(['attr' => 'brewing_time']),
            Column::widget(['attr' => 'en_brewing_time']),
            Column::widget(['attr' => 'buy_button']),
            Column::widget(['attr' => 'shop_link']),
            Column::widget(['attr' => 'en_shop_link']),
            Column::widget(['attr' => 'API_priority', 'items' => \common\enums\PriorityAPI::class]),
        ]
    ]) ?>

</div>
