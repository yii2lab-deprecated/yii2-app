<?php

namespace {

    use common\locators\DomainLocator;
    use \yii2lab\domain\base\BaseDomainLocator;

    define('MICRO_TIME', microtime(true));

    class App extends \yii2lab\app\parent\App
    {

        /**
         * @var DomainLocator|BaseDomainLocator the domain container
         */
        public static $domain;

    }

}

namespace yii2lab\app {

    /**
     * Class App
     * @package yii2lab\app
     *
     * @deprecated use \App
     */
    class App extends \yii2lab\app\parent\App {}

}

namespace yii2lab\app\parent {

    use yii\base\InvalidConfigException;
    use yii\console\Application as ConsoleApplication;
    use yii\web\Application as WebApplication;
    use yii\web\ServerErrorHttpException;
    use yii2lab\app\domain\helpers\Env;
    use yii2lab\app\domain\helpers\Constant;
    use yii2lab\app\domain\helpers\Config;
    use yii2lab\app\domain\helpers\Load;
    use yii2lab\extension\develop\helpers\Benchmark;
    use yii2lab\extension\scenario\helpers\ScenarioHelper;

    class App
    {

        private static $initedAs = null;

        public static function run($appName = null, $projectDir = '')
        {
            if(!empty($appName)) {
                self::init($appName, $projectDir);
            }
            $config = self::initConfig();
            self::runApplication($config);
        }

        public static function init($appName, $projectDir = '')
        {
            if(self::$initedAs) {
                return;
            }
            require_once(__DIR__ . '/domain/helpers/Load.php');
	        Load::autoload();
            //Load::helpers();
            Constant::init($appName);
            //CodeCacheHelper::loadClassesCache();

            Benchmark::begin('pre_init_yii_' . __METHOD__);
            Env::init($projectDir);
            $env = Env::get();
            Constant::setYiiEnv($env['mode']['env']);
            Constant::setAdditionalYiiEnv($env['mode']['env']);
            Constant::setYiiDebug($env['mode']['debug']);
            $yiiClass = Env::get('yii.class');
            Load::yii($yiiClass);
            Benchmark::end('pre_init_yii_' . __METHOD__);

            Benchmark::begin('init_yii_' . __METHOD__);
            Load::required();
            $aliases = Env::get('aliases');
            Constant::setAliases($aliases);
	        $container = Env::get('container');
	        Constant::setContainer($container);
            Benchmark::end('init_yii_' . __METHOD__);

            Benchmark::begin('run_env_commands_' . __METHOD__);
            $commands = Env::get('app.commands', []);
            self::runCommands($commands);
            Benchmark::end('run_env_commands_' . __METHOD__);

            self::$initedAs = $appName;
        }

        private static function initConfig() {
            Benchmark::begin('init_config');
            $definition = Env::get('config');
            Config::init($definition);
            $config = Config::get();
            Benchmark::end('init_config');
            return $config;
        }

        private static function runCommands($commands)
        {
            $commandCollection = ScenarioHelper::forgeCollection($commands);
            try {
                ScenarioHelper::runAll($commandCollection);
            } catch(InvalidConfigException $e) {
            } catch(ServerErrorHttpException $e) {
            }
        }

        private static function runApplication($config)
        {
            if (APP == CONSOLE) {
                $application = new ConsoleApplication($config);
                $exitCode = $application->run();
                exit($exitCode);
            } else {
                $application = new WebApplication($config);
                $application->run();
            }
        }

    }

}
