<?php
namespace atuin\skeleton\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Site controller
 */
class BaseAdminController extends Controller
{
    public $layout = '@vendor/atuin/engine/layouts/backend_layout';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


    /**
     * @inheritdoc
     */
//	public function actions()
//	{
//		$action_list = [];
//
//		$module = Yii::$app->controller->module;
//		$config_model = $module->modelNamespace . '\Module_configuration';
//
//		if (class_exists($config_model) and !method_exists($this, 'actionConfig')) {
//			$action_list['config'] =
//				[
//					'class' => 'common\engine\auto_forms\actions\AutoFormsAction',
//					'model' => $config_model
//				];
//		}
//
//		return $action_list;
//	}

}
