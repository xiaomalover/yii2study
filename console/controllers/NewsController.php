<?php
namespace console\controllers;

use yii\console\Controller;
use common\models\News;

class NewsController extends Controller
{
    /**
     * Create news recorder to test sphinx
     * @param Int $count The count to create.
     */
    public function actionCreate($count = 20000000)
    {
    	for ($i = 1; $i < $count; $i++) {
    		$news = new News;
    		$news->title = $this->getStr(rand(5, 15));
    		$news->content = $this->getStr(rand(50, 100));
    		$news->editor = $this->getStr(rand(2, 5));
    		$news->created_at = time();
    		$news->published_at = time() + rand(1, 99);
    		$news->views = rand(10, 99);
    		$news->status = rand(0, 2);
    		if ($news->save()) {
    			echo "The $i recorder is created successfully" .chr(10);
    		}
    	}
		//Return 0 indicate perform normal
		return 0;
    }

    private function getStr($len)
    {
    	 $chars = [
	        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
	        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
	        "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
	        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
	        "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
	        "3", "4", "5", "6", "7", "8", "9", "赵", "钱", "孙",
	        "李", "三", "四", "五", "六", "，", "；", "。"
	    ];
	    $charsLen = count($chars) - 1;
	    shuffle($chars);    // 将数组打乱
	    $output = "";
	    for ($i=0; $i<$len; $i++)
	    {
	    	$rand = rand(2, 6);
	    	$item = "";
	    	for ($j=0; $j<$rand; $j++) {
	    		$item .= $chars[mt_rand(0, $charsLen)];
	    	}
	        $output .= " " . $item;
	    }
	    return $output;
    }
}
