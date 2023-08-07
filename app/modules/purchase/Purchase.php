<?php

namespace app\modules\purchase;

/**
 * purchase module definition class
 */
class Purchase extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\purchase\controllers';

    public $defaultRoute = 'purchase';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
