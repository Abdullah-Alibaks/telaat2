<?php

namespace app\controllers;

use Yii;
use app\models\Studenten;
use app\models\StudentenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudentenController implements the CRUD actions for Studenten model.
 */
class StudentenController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Studenten models.
     *
     * @return string
     */
    public function actionIndex()
    {
        //Abdullah Alibaks-
        //hieronder de variabalen voor de waardes en de studenten
        $sql="SELECT max(minuten) AS hoogste, avg(minuten) AS gemiddeld, sum(minuten) AS totaal FROM studenten";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        $searchModel = new StudentenSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $hoogste = $result['hoogste'];
        $gemiddelde = $result['gemiddeld'];
        $totaal = $result['totaal'];

        return $this->render('index', [
            'result' =>$result,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'hoogste' => $hoogste,
            'gemiddelde' => $gemiddelde,
            'totaal' => $totaal,
        ]);
    }

    /**
     * Displays a single Studenten model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Studenten model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Studenten();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Studenten model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Studenten model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Studenten model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Studenten the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Studenten::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
