<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\SphinxTestDocument;
use yii\sphinx\Query;

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
    	$list = SphinxTestDocument::find()->where(['like', 'content', '马'])->all();
    	return $this->render('index', compact('list'));
    }

    /**
     * The query by sphinx for news
     */
    public function actionSphinx()
    {
        // $sql = 'SELECT * FROM study_news';
        // $params = [
        //     'content' => 'like %李四%',
        // ];
        // $list = Yii::$app->sphinx->createCommand($sql, $params)->queryAll();
        // print_r($list);die;

        $query = new Query();
        $list = $query->select('*')
            ->from('test1')
            ->limit(500000000)
            ->match('one')
            ->showMeta(true)
            ->search();
            // ->all();
        print_r($list);
        // return $this->render('index', compact('list'));
    }
}
