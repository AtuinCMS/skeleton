<?php

namespace atuin\skeleton\config;

use yii\base\Component;

/**
 * Class ConfigSkeleton
 * @package common\engine\module_skeleton\libraries
 *
 * Class called to install a module in the CMS.
 *
 * Here must be all the automatic changes in the system that will be necessary to install a new module.
 *
 */
abstract class AtuinConfig extends Component
{

    /**
     * @var \atuin\installation\app_installation\helpers\ParamMigration
     */
    public $migration;

    /**
     * @var \atuin\config\models\ModelConfig
     */
    public $configItems;

    /**
     * @var \cyneek\yii2\menu\models\MenuItems
     */
    public $menuItems;

    /**
     * Launched at APP installation time.
     *
     * Uses a Yii2 migration class to manipulate the database for the model.
     * It has all usual Yii2 migration methods except: up, down, safeUp, safeDown.
     *
     * Example of use:
     *
     * $this->migration->createTable('tableName', [
     *      'id' => Schema::TYPE_PK,
     * 'data' => Schema::TYPE_STRING . ' NOT NULL'
     * ]);
     *
     *
     * $this->createIndex('{{%menuItems_visible}}', 'tableName', 'visible');
     *
     * ...
     *
     */
    public abstract function upMigration();

    /**
     * Launched at APP uninstallation time.
     *
     * Uses a Yii2 migration class to manipulate the database for the model.
     * It has all usual Yii2 migration methods except: up, down, safeUp, safeDown.
     *
     * Example of use:
     *
     * $this->migration->createTable('tableName', [
     *      'id' => Schema::TYPE_PK,
     * 'data' => Schema::TYPE_STRING . ' NOT NULL'
     * ]);
     *
     *
     * $this->migration->createIndex('{{%menuItems_visible}}', 'tableName', 'visible');
     *
     * ...
     *
     */
    public abstract function downMigration();


    /**
     * Launched at APP update time.
     *
     * Uses a Yii2 migration class to manipulate the database for the model.
     * It has all usual Yii2 migration methods except: up, down, safeUp, safeDown.
     *
     * To be able to make an update developer must surround in if statements the changes
     * for each version, for example:
     *
     * if ($version < '0.0.2')
     * {
     *      code to execute here...
     * }
     *
     * if ($version < '0.0.3')
     * {
     *      code to execute here...
     * }
     *
     *
     * ...
     *
     */
    public function updateMigration($version)
    {

    }


    /**
     * Launched at APP installation time.
     *
     * Uses Cyneek/yii-Menu Module to add new menu items in the admin section.
     *
     * Example of use:
     *
     * $this->menuItems->add_menu_item('menu_label', 'url_link', 'parent_label', 'show name');
     *
     * ...
     *
     */
    public abstract function upMenu();


    /**
     * Launched at APP uninstallation time.
     *
     * Uses Cyneek/yii-Menu Module to add new menu items in the admin section.
     *
     * Example of use:
     *
     * $this->menuItems->add_menu_item('menu_label', 'url_link', 'parent_label', 'show name');
     *
     * ...
     *
     */
    public abstract function downMenu();


    /**
     * Launched at APP update time.
     *
     * Uses a Yii2 migration class to manipulate the database for the model.
     * It has all usual Yii2 migration methods except: up, down, safeUp, safeDown.
     *
     * To be able to make an update developer must surround in if statements the changes
     * for each version, for example:
     *
     * if ($version < '0.0.2')
     * {
     *      code to execute here...
     * }
     *
     * if ($version < '0.0.3')
     * {
     *      code to execute here...
     * }
     *
     *
     * ...
     *
     */
    public function updateMenu($version)
    {

    }


    /**
     * Launched at APP installation time.
     *
     * Uses  atuin\engine\models\Config Model to add new config items from atuin database.
     *
     * Example of use:
     *
     * $this->configItems->setConfig($section = NULL, $group, $sub_group = NULL, $name, $data, $editable = TRUE);
     *
     * ...
     *
     */
    public abstract function upConfig();


    /**
     * Launched at APP uninstallation time.
     *
     * Uses  atuin\engine\models\Config Model to delete config items from atuin database.
     *
     * Example of use:
     *
     * $this->configItems->deleteConfig();
     *
     * ...
     *
     */
    public abstract function downConfig();

    /**
     * Launched at APP update time.
     *
     * Uses a Yii2 migration class to manipulate the database for the model.
     * It has all usual Yii2 migration methods except: up, down, safeUp, safeDown.
     *
     * To be able to make an update developer must surround in if statements the changes
     * for each version, for example:
     *
     * if ($version < '0.0.2')
     * {
     *      code to execute here...
     * }
     *
     * if ($version < '0.0.3')
     * {
     *      code to execute here...
     * }
     *
     *
     * ...
     *
     */
    public function updateConfig($version)
    {

    }

    /**
     * Launched at APP installation time.
     *
     * Lets developer to launch manually code that won't fit into the rest of methods.
     *
     */
    public abstract function upManual();


    /**
     * Launched at APP uninstallation time.
     *
     * Lets developer to launch manually code that won't fit into the rest of methods.
     *
     */
    public abstract function downManual();


    /**
     * Launched at APP update time.
     *
     * Uses a Yii2 migration class to manipulate the database for the model.
     * It has all usual Yii2 migration methods except: up, down, safeUp, safeDown.
     *
     * To be able to make an update developer must surround in if statements the changes
     * for each version, for example:
     *
     * if ($version < '0.0.2')
     * {
     *      code to execute here...
     * }
     *
     * if ($version < '0.0.3')
     * {
     *      code to execute here...
     * }
     *
     *
     * ...
     *
     */
    public function updateManual($version)
    {

    }

}