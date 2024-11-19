<?php

use admin\components\GroupedActionColumn;
use admin\components\widgets\gridView\Column;
use admin\components\widgets\gridView\ColumnSelect2;
use admin\modules\rbac\components\RbacHtml;
use admin\widgets\sortableGridView\SortableGridView;
use kartik\grid\SerialColumn;
use yii\widgets\ListView;

/**
 * @var $this         yii\web\View
 * @var $searchModel  common\models\NewsSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        common\models\News
 */

$this->title = Yii::t('app', 'News');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= RbacHtml::encode($this->title) ?></h1>

    <div>
        <?=
            RbacHtml::a(Yii::t('app', 'Create News'), ['create'], ['class' => 'btn btn-success']);
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
//            Column::widget(['attr' => 'API_priority']),
            Column::widget(['attr' => 'date']),
            Column::widget(['attr' => 'description']),
//            Column::widget(['attr' => 'en_description']),
//            Column::widget(['attr' => 'text']),
//            Column::widget(['attr' => 'en_text']),
//            Column::widget(['attr' => 'image']),
            ColumnSelect2::widget(['attr' => 'status', 'items' => \admin\enums\PublishedStatus::class, 'hideSearch' => true]),


            ['class' => GroupedActionColumn::class]
        ]
    ]) ?>
</div>
