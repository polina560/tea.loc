<?php

namespace admin\controllers;

use admin\controllers\AdminController;
use admin\modules\rbac\components\RbacHtml;
use common\components\helpers\UserUrl;
use common\models\Tea;
use common\models\TeaSearch;
use kartik\grid\EditableColumnAction;
use Throwable;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\StaleObjectException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * TeaController implements the CRUD actions for Tea model.
 *
 * @package admin\controllers
 */
final class TeaController extends AdminController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => ['delete' => ['POST']]
            ]
        ]);
    }

    /**
     * Lists all Tea models.
     *
     * @throws InvalidConfigException
     */
    public function actionIndex(): string
    {
        $model = new Tea();

        if (RbacHtml::isAvailable(['create']) && $model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Элемент №$model->id создан успешно");
        }

        $searchModel = new TeaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render(
            'index',
            ['searchModel' => $searchModel, 'dataProvider' => $dataProvider, 'model' => $model]
        );
    }

    public function actionCollection(int $id_collection): string
    {
        $model = new Tea();

        if (RbacHtml::isAvailable(['create']) && $model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Элемент №$model->id создан успешно");
        }

        $searchModel = new TeaSearch();
        $searchModel->id_collection = $id_collection;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render(
            'collection',
            ['searchModel' => $searchModel, 'dataProvider' => $dataProvider, 'model' => $model]
        );
    }

    /**
     * Displays a single Tea model.
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id): string
    {
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    /**
     * Creates a new Tea model.
     *
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @param string|null $redirect если нужен иной редирект после успешного создания
     *
     * @throws InvalidConfigException
     */
    public function actionCreate(string $redirect = null): Response|string
    {
        $model = new Tea();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Элемент №$model->id создан успешно");
            return match ($redirect) {
                'create' => $this->redirect(['create']),
                'index' => $this->redirect(UserUrl::setFilters(TeaSearch::class)),
                default => $this->redirect(['view', 'id' => $model->id])
            };
        }

        return $this->render('create', ['model' => $model]);
    }

    /**
     * Updates an existing Tea model.
     *
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @throws NotFoundHttpException if the model cannot be found
     * @throws InvalidConfigException
     */
    public function actionUpdate(int $id): Response|string
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Элемент №$model->id изменен успешно");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', ['model' => $model]);
    }

    /**
     * Deletes an existing Tea model.
     *
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @throws NotFoundHttpException if the model cannot be found
     * @throws StaleObjectException
     * @throws Throwable
     */
    public function actionDelete(int $id): Response
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', "Элемент №$id удален успешно");
        return $this->redirect(UserUrl::setFilters(TeaSearch::class));
    }

    /**
     * Finds the Tea model based on its primary key value.
     *
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    private function findModel(int $id): Tea
    {
        if (($model = Tea::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * {@inheritdoc}
     */
    public function actions(): array
    {
        return [
            'change' => [
                'class' => EditableColumnAction::class,
                'modelClass' => Tea::class
            ]
        ];
    }
}
