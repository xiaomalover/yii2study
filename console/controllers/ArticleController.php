<?php
namespace console\controllers;

use yii\console\Controller;
use common\models\Article;

class ArticleController extends Controller
{
    public $articles = null;

    /**
     * Create news recorder to test sphinx
     * @param Int $count The count to create.
     */
    public function actionCreate($count = 20000000)
    {
        for ($i = 1; $i < $count; $i++) {
            $insert = $this->getRecorder();
            $article = new Article;
            $article->category_id = $insert->category_id;
            $article->title = $insert->title;
            $article->body = $insert->body;
            $article->thumb = $insert->thumb;
            $article->status = $insert->status;
            if ($article->save()) {
                echo "The $i recorder is created successfully" .chr(10);
            } else {
                echo "The $i recorder is create failed" .chr(10);
            }
        }
        //Return 0 indicate perform normal
        return 0;
    }

    private function getRecorder()
    {
         if (!$this->articles) {
            $this->articles = Article::find()->all();
         }
         $articles = $this->articles;
         return $articles[rand(0, count($articles)-1)];
    }
}
