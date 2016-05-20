<?php
namespace frontend\controllers;

use frontend\models\ArticleSearch;
use Yii;
use yii\web\Controller;

/**
 * Article controller
 * test the yii2-scroll-pager
 * @author xiaoma
 */
class ArticleController extends Controller
{

    /**
     * Index display article list
     * use yii2-scroll-page plugins
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            // 'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
