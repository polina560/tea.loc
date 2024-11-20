<?php

namespace api\modules\v1\controllers;

use api\behaviors\returnStatusBehavior\JsonSuccess;
use api\behaviors\returnStatusBehavior\RequestFormData;
use common\models\Tea;
use common\models\TeaCollection;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\Property;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class TeaController extends AppController
{

    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), ['auth' => ['except' => ['index']]]);
    }

    /**
     * Returns a list of Tea's
     */
    #[Post(
        path: '/tea/index',
        operationId: 'tea-index',
        description: 'Возвращает список чая по выбранной коллекции',
        summary: 'Список чая',
        security: [['bearerAuth' => []]],
        tags: ['tea']
    )]
    #[RequestFormData(
        properties: [
            new Property(property: 'id_collection', description: 'ID Коллекции', type: 'integer')
        ]
    )]
    #[JsonSuccess(content: [
        new Property(
            property: 'teas', type: 'array',
            items: new Items(ref: '#/components/schemas/Tea'),
        )
    ])]
    public function actionIndex(): array
    {
        $id = $this->getParameterFromRequest('id_collection');

        $query = Tea::find();

        if($id == null) {
            return [
                'success' => false,
                'data' => 'Нет параемтра ID Коллекции',
            ];
        }

        $query->andWhere(['id_collection' => $id]);

        $provider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->returnSuccess([
            'teas' => $provider,

        ]);


    }
}
