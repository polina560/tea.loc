<?php

use admin\components\GroupedActionColumn;
use admin\components\widgets\gridView\Column;
use admin\modules\rbac\components\RbacHtml;
use admin\widgets\sortableGridView\SortableGridView;
use common\components\helpers\UserUrl;
use kartik\grid\SerialColumn;
use yii\widgets\ListView;

/**
 * @var $this         yii\web\View
 * @var $searchModel  common\models\TeaSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        common\models\Tea
 */

$this->title = Yii::t('app', 'Teas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Collections'), 'url' => ['/tea-collection/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tea-collection">

    <h1><?= RbacHtml::encode($this->title) ?></h1>

    <div>
        <?=
        RbacHtml::a(Yii::t('app', 'Create Tea'), ['create'], ['class' => 'btn btn-success']);
        //           $this->render('_create_modal', ['model' => $model]);
        ?>
    </div>

    <?= SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'pjax' => true,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            Column::widget(),
//            Column::widget(['attr' => 'title']),
//            Column::widget(['attr' => 'en_title']),
            Column::widget(['attr' => 'id_collection', 'viewAttr' => 'collection.title']),
            Column::widget(['attr' => 'subtitle']),
//            Column::widget(['attr' => 'en_subtitle']),
            Column::widget(['attr' => 'description']),
//            Column::widget(['attr' => 'en_description']),
//            Column::widget(['attr' => 'background_image']),
//            Column::widget(['attr' => 'image']),
//            Column::widget(['attr' => 'en_image']),
//            Column::widget(['attr' => 'weight']),
//            Column::widget(['attr' => 'en_weight']),
//            Column::widget(['attr' => 'brewing_temperature']),
//            Column::widget(['attr' => 'en_brewing_temperature']),
//            Column::widget(['attr' => 'brewing_time']),
//            Column::widget(['attr' => 'en_brewing_time']),
//            Column::widget(['attr' => 'buy_button']),
//            Column::widget(['attr' => 'shop_link']),
//            Column::widget(['attr' => 'en_shop_link']),
//            Column::widget(['attr' => 'API_priority']),

            ['class' => GroupedActionColumn::class]
        ]
    ]) ?>
</div>
