<?php

use admin\components\GroupedActionColumn;
use admin\components\widgets\gridView\Column;
use admin\modules\rbac\components\RbacHtml;
use admin\widgets\sortableGridView\SortableGridView;
use kartik\grid\SerialColumn;
use yii\helpers\Html;
use yii\helpers\Url;
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
//            \admin\components\widgets\gridView\ColumnSelect2::widget(['attr' => 'title', 'pathLink' => 'tea', 'editable' => false]),
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{tea}',
                'buttons' => [
                    'tea' => function ($url, $model, $key) {
                        return Html::a($model->title, Url::toRoute(['tea/collection', 'id_collection' => $model->id]), ['data-pjax' => '0']);
//                            Html::a('Комнаты', ['room/index', 'id_apartment' => $model->id]);
//                            Html::a('Комнаты', Url::to(['room/index', 'id_apartment' => $model->id]));
                    },
                ],
            ],

//            Column::widget(['attr' => 'en_title']),
            Column::widget(['attr' => 'subtitle']),
//            Column::widget(['attr' => 'en_subtitle']),
            Column::widget(['attr' => 'color', 'format' => 'color', 'editable' => false]),
//            \kartik\color\ColorInput::widget(['model' => $searchModel, 'att ribute' => 'color']),
//            Column::widget(['attr' => 'image']),

            ['class' => GroupedActionColumn::class]
        ]
    ]) ?>
</div>
