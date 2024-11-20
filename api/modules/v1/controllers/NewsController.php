<?php

namespace api\modules\v1\controllers;

use api\behaviors\returnStatusBehavior\JsonSuccess;
use api\behaviors\returnStatusBehavior\RequestFormData;
use common\models\News;
use common\models\Tea;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\Property;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class NewsController extends AppController
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
        path: '/news/index',
        operationId: 'news-index',
        description: 'Возвращает список опубликованных новостей, сортированных по фтрибуту приоритета',
        summary: 'Список новостей',
        security: [['bearerAuth' => []]],
        tags: ['news']
    )]
    #[JsonSuccess(content: [
        new Property(
            property: 'news', type: 'array',
            items: new Items(ref: '#/components/schemas/News'),
        )
    ])]
    public function actionIndex(): array
    {
        $query = News::find();

        $query->andWhere(['status' => 10]);
        $query->orderBy('API_priority');

        $provider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->returnSuccess([
            'news' => $provider,

        ]);


    }
}
