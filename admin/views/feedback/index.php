<?php

use admin\components\GroupedActionColumn;
use admin\components\widgets\gridView\Column;
use admin\components\widgets\gridView\ColumnDate;
use admin\components\widgets\gridView\ColumnSelect2;
use admin\modules\rbac\components\RbacHtml;
use admin\widgets\sortableGridView\SortableGridView;
use kartik\grid\SerialColumn;
use yii\widgets\ListView;

/**
 * @var $this         yii\web\View
 * @var $searchModel  common\models\FeedbackSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        common\models\Feedback
 */

$this->title = Yii::t('app', 'Feedback');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= RbacHtml::encode($this->title) ?></h1>

<!--    <div>-->
<!--        --><?php //=
//            RbacHtml::a(Yii::t('app', 'Create Feedback'), ['create'], ['class' => 'btn btn-success']);
////           $this->render('_create_modal', ['model' => $model]);
//        ?>
<!--    </div>-->

    <?= SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'pjax' => true,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            Column::widget(),
            Column::widget(['attr' => 'name', 'editable' => false]),
            Column::widget(['attr' => 'email', 'editable' => false, 'format' => 'email']),
            Column::widget(['attr' => 'message', 'editable' => false]),
//            ColumnDate::widget(['attr' => 'created_at', 'searchModel' => $searchModel, 'editable' => false]),
//            ColumnDate::widget(['attr' => 'updated_at', 'searchModel' => $searchModel, 'editable' => false]),
            ColumnSelect2::widget(['attr' => 'moderation_status','items' => \admin\enums\ModerationStatus::class, 'hideSearch' => true]),
//            [
//                'attribute'=>'moderation_status',
//                'value'=>function($model){
//                    $item = new \common\models\ModerationStatus();
//                    return $item->getStatusName($model->moderation_status);
//                }
//            ],
            Column::widget(['attr' => 'comment']),

            ['class' => GroupedActionColumn::class,
                    'buttons' => [
                        'delete' => function () {
                                return null;
                            }
                    ]


            ]
        ]
    ]) ?>
</div>
