<?php

namespace app\controllers;

use Yii;

use app\models\YandexAds;
use app\models\YandexKeywords;
use app\models\YandexKeywordsInfo;


use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WasteController implements the CRUD actions for Waste model.
 */
class YandexContextController extends Controller{
    
    public function actionCampaings()
    {
        echo 'campaing'; 
    }

    public function actionAds()
    {
        
        $searchModel = new YandexAds();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
   
    public function actionKeywords($id_ad)
    {
        /*
        if(empty(Yii::$app->session['dateFrom']) || empty(Yii::$app->session['dateTo'])){
            Yii::$app->session['dateFrom'] = date("Y-m-d", strtotime("-7 day", strtotime(date("Y-m-d"))));
            Yii::$app->session['dateTo'] = date("Y-m-d");
        }
        */
        
        Yii::$app->session['dateFrom'] = '2015-05-08';
            Yii::$app->session['dateTo'] = '2015-05-09';
        
        $dataProvider = new ActiveDataProvider([
            'query' => YandexKeywordsInfo::find()
                ->select('pid_phrase,SUM(sum) as sum, SUM(clicks) as clicks, SUM(shows) as shows')
                ->where(['between', 'date_cr', Yii::$app->session['dateFrom'], Yii::$app->session['dateTo']])
                ->andWhere(['pid_ad' => $id_ad])
                ->groupBy('pid_phrase')
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'sum',
                'clicks'
            ]
        ]);
        
        
        
        return $this->render('keywords', [
            'dataProvider' => $dataProvider,           
        ]);
        
        
         
    }

}

