<?php

namespace api\modules\v1\controllers;

use api\behaviors\returnStatusBehavior\JsonSuccess;
use api\behaviors\returnStatusBehavior\RequestFormData;
use common\models\Feedback;
use common\models\Tea;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\Property;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class FeedbackController extends AppController
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
        path: '/feedback/index',
        operationId: 'feedback-index',
        description: 'Отправляет сообщение обратной связи',
        summary: 'Сообщение обратной связи',
        security: [['bearerAuth' => []]],
        tags: ['feedback']
    )]
    #[RequestFormData(
        properties: [
            new Property(property: 'name', description: 'Имя', type: 'string'),
            new Property(property: 'email', description: 'E-mail', type: 'string'),
            new Property(property: 'message', description: 'Сообщение', type: 'string'),
        ]
    )]
    #[JsonSuccess(content: [
        new Property(
            property: 'feedback', type: 'array',
            items: new Items(ref: '#/components/schemas/Feedback'),
        )
    ])]
    public function actionIndex(): array
    {
        $name = $this->getParameterFromRequest('name');
        $email = $this->getParameterFromRequest('email');
        $message = $this->getParameterFromRequest('message');

        if (empty($name) ) {
            return $this->returnError(['Поле name не заполнено или заполнено некорректно']);
        }
        if (empty($email)) {
            return $this->returnError(['Поле email не заполнено или заполнено некорректно']);
        }
        if (empty($message)) {
            return $this->returnError(['Поле message не заполнено или заполнено некорректно']);
        }

        $feedback = new Feedback();

        if($feedback->load(['name'=> $name, 'email'=>$email, 'message'=> $message, 'moderation_status' => 0],'') && $feedback->validate()){
            $feedback->save();
            return $this->returnSuccess([
                'feedback' =>  $feedback]);
        }
        else {
            return [
                'success' => false,
                'errors' => $feedback->getErrors(),
            ];
        }


    }
}
