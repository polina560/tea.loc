<?php

namespace api\modules\v1\controllers;

use api\behaviors\returnStatusBehavior\JsonSuccess;
use common\models\TeaCollection;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\Property;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class TeaCollectionController extends AppController
{

    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), ['auth' => ['except' => ['index']]]);
    }

    /**
     * Returns a list of TeaCollection's
     */
    #[Get(
        path: '/tea-collection/index',
        operationId: 'tea-collection-index',
        description: 'Возвращает полный список коллекций',
        summary: 'Список колллекций',
        security: [['bearerAuth' => []]],
        tags: ['tea-collection']
    )]

    #[JsonSuccess(content: [
        new Property(
            property: 'tea-collection', type: 'array',
            items: new Items(ref: '#/components/schemas/TeaCollection'),
        )
    ])]
    public function actionIndex(): array
    {
        $query = TeaCollection::find()->with('teas');

//        $query->andWhere(['API_flag' => 1]);

        $provider = new ActiveDataProvider([
            'query' => $query,

        ]);


        return $this->returnSuccess([
            'collections' => $provider,

        ]);


    }
}
