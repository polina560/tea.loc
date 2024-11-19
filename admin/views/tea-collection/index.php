<?php

use admin\components\GroupedActionColumn;
use admin\components\widgets\gridView\Column;
use admin\modules\rbac\components\RbacHtml;
use admin\widgets\sortableGridView\SortableGridView;
use kartik\grid\SerialColumn;
use yii\widgets\ListView;

/**
 * @var $this         yii\web\View
 * @var $searchModel  common\models\TeaCollectionSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        common\models\TeaCollection
 */

$this->title = Yii::t('app', 'Tea Collections');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tea-collection-index">

    <h1><?= RbacHtml::encode($this->title) ?></h1>

    <div>
        <?=
            RbacHtml::a(Yii::t('app', 'Create Tea Collection'), ['create'], ['class' => 'btn btn-success']);
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
            Column::widget(['attr' => 'title']),
//            Column::widget(['attr' => 'en_title']),
            Column::widget(['attr' => 'subtitle']),
//            Column::widget(['attr' => 'en_subtitle']),
            Column::widget(['attr' => 'color']),
//            Column::widget(['attr' => 'image']),

            ['class' => GroupedActionColumn::class]
        ]
    ]) ?>
</div>
