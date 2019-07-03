<?php

namespace app\controllers;

use Yii;
use app\models\Aspiration;
use app\models\Infrastructure;
use app\models\SecurityProblem;
use app\models\AspirationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Proof;
use yii\web\UploadedFile;

/**
 * AspirationController implements the CRUD actions for Aspiration model.
 */
class AspirationController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Aspiration models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AspirationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Aspiration model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Aspiration model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Aspiration();

        $request = Yii::$app->request->post();

        if ($model->load($request) && $model->save()) {
            switch ($request['DynamicModel']['jenis_aspirasi']) {
                case 'infrastruktur':
                    $inf_model = new Infrastructure();
                    $request['Infrastructure']['id_master'] = $model->id_master;
                    $inf_model->load($request);
                    $inf_model->save();

                    $proof_model = new Proof();
                    $request['Proof']['id_master'] = $model->id_master;
                    $proof_model->load($request);
                    $proof_model->save();
                    break;
                case 'kejahatan':
                    $sec_model = new SecurityProblem();

                    $request['SecurityProblem']['id_master'] = $model->id_master;
                    $sec_model->load($request);
                    $sec_model->save();
                    break;
            }
            
            return $this->redirect(['view', 'id' => $model->id_master]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Aspiration model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_master]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Aspiration model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Aspiration model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Aspiration the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aspiration::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
