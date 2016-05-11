<?php
namespace console\controllers;

use yii\console\Controller;
use yii\helpers\Console;

class ExampleController extends Controller
{
    public $message;
    public $age;

    public function options($actionID)
    {
        return ['message', 'age'];
    }

    public function optionAliases()
    {
        return [
        	'm' => 'message',
        	'a' => 'age'
        ];
    }


    /**
     * Can perform this action as below
     * [yii example/index testParam --message=hello --age=33]
     * or use alias format for option
     * [yii example/index testParam -m=hello -a=33]
     */
    public function actionIndex($param)
    {
    	//Echo propertys and params
        echo
        	"The property message value :" . $this->message,
        	chr(10),
        	"The property age value :" . $this->age,
        	chr(10),
        	"The param value:" . $param,
        	chr(10);
        //Format out
        $this->stdout("Format blod".chr(10), Console::BOLD);
        $name = $this->ansiFormat('Format color yellow', Console::FG_YELLOW);
		echo $name;
		//Return 0 indicate perform normal
		return 0;
    }
}
