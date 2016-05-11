<?php
namespace console\controllers;

use yii\console\Controller;
use common\models\SphinxTestDocument;

class SphinxController extends Controller
{
    public $documents = null;

    /**
     * Create news recorder to test sphinx
     * @param Int $count The count to create.
     */
    public function actionCreateDocument($count = 20000000)
    {
    	for ($i = 1; $i < $count; $i++) {
    		$insert = $this->getRecorder();
            $document = new SphinxTestDocument;
            $document->group_id = $insert->group_id;
            $document->group_id2 = $insert->group_id2;
            $document->date_added = $insert->date_added;
            $document->title = $insert->title;
            $document->content = $insert->content;
    		if ($document->save()) {
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
         if (!$this->documents) {
            $this->documents = SphinxTestDocument::find()->all();
         }
         $documents = $this->documents;
         return $documents[rand(0, count($documents)-1)];
    }
}
