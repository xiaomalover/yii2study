<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\News;

/**
 * Test controller
 */
class TestController extends Controller
{
    /**
     * Nomal sql query for news
     */
    public function actionIndex()
    {
    	$list = News::find()->where(['like', 'content', '李四'])->all();
    	return $this->render('index', compact('list'));
    }

    /**
     * The query by sphinx for news
     */
    public function actionSphinx()
    {
        $sql = 'SELECT * FROM study_news';
        $params = [
            'content' => 'like %李四%',
        ];
        $list = Yii::$app->sphinx->createCommand($sql, $params)->queryAll();
        print_r($list);die;
        return $this->render('index', compact('list'));
    }
}
