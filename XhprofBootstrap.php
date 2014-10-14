<?php

namespace trntv\debug\xhprof;

use trntv\debug\xhprof\panels\XhprofPanel;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\base\Object;

class XhprofBootstrap extends Object implements BootstrapInterface
{

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        if((isset($_GET['_xhprof']) || isset($_COOKIE['_xhprof'])) && function_exists('xhprof_enable')){
            $app->on(Application::EVENT_BEFORE_REQUEST, function () use ($app) {
                \xhprof_enable(\XHPROF_FLAGS_CPU + \XHPROF_FLAGS_MEMORY);
            });
        }
        $modules = $app->getModules();
        if($modules['debug']){
            $modules['debug']['panels']['xhprof'] = ['class'=>XhprofPanel::className()];
        }
        $app->setModules($modules);
    }
}
