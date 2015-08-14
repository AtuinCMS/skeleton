<?php

namespace atuin\skeleton;

use yii\base\InvalidParamException;

/**
 * Class Module
 *
 * Skeleton Module Class used to be extended in the rest of Atuin core and additional Modules.
 *
 * @package atuin\skeleton
 */
class Module extends \yii\base\Module
{


    /**
     * Checks if is a core module, atuin won't be able to uninstall or deactivate this modules
     *
     * @var int
     */
    public $is_core_module = 0;

    /**
     * Used from AppManagement, determines if the module will be loaded in the backend zone.
     *
     * @var int
     */
    public $is_backend = 1;
    /**
     * Used from AppManagement, determines if the module will be loaded in the frontend zone.
     *
     * @var int
     */
    public $is_frontend = 1;



    protected static $_id;

    protected static $_version;

    protected static $_migrationsDirectory = 'migrations';

    public static function getId()
    {
        return static::$_id;
    }

    public static function getVersion()
    {
        return static::$_version;
    }

    public static function getMigrationsDirectory()
    {
        return static::$_migrationsDirectory;
    }
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        if (is_null(static::getId()))
        {
            throw new InvalidParamException('The module must have a defined id parameter.');
        }

        if (is_null(static::getVersion()))
        {
            throw new InvalidParamException('The module must have a defined version parameter.');
        }

        parent::init();

    }

    /**
     * Returns the module name. Must be set if the module it's not a core_module = 1
     */
    public function getName()
    {
        return $this->getId();
    }


    /**
     * Sets the classname of the Module that will be installed via AppManagement library.
     * This is used usually to install another module via atuin. For example downloading a yii2
     * module and using a module_skeleton as interface for adding it into the system.
     *
     * @return string
     */
    public function getModuleClassName()
    {
        return static::className();
    }

    /**
     * Returns the namespace of the actual module.
     * Used to install the app into the atuin system
     *
     * @return string
     */
    public function getModuleDirectory()
    {
        $reflector = new \ReflectionClass(self::className());

        return dirname($reflector->getFileName());
    }

    /**
     * Returns the namespace of the actual module.
     * Used to install the app into the atuin system
     *
     * @return string
     */
    public function getModuleNamespace()
    {
        $reflector = new \ReflectionClass(self::className());

        return $reflector->getNamespaceName();
    }

    /**
     * Returns the Atuin Config Library.
     * It will be used to launch all the config data that the new App will need to
     * run properly.
     *
     * @return \atuin\skeleton\config\AtuinConfig | Null
     */
    public function getConfigLibrary()
    {
        $reflector = new \ReflectionClass(self::className());
        $namespace = $reflector->getNamespaceName();

        $config_namespace = $namespace . '\config\AtuinConfig';

        $configObject = new $config_namespace();

        if (!is_subclass_of($configObject, '\atuin\skeleton\config\AtuinConfig'))
        {
            throw new \yii\base\InvalidParamException('Config class for module ' . $this->id . ' must inherit from \atuin\skeleton\config\AtuinConfig');
        }

        return $configObject;
    }

    /**
     * Returns the module alias for loading it into Yii2
     * 
     * 
     * @return string
     */
    public function getAlias()
    {
        return str_replace('/Module', '', str_replace('\\', '/', $this->getModuleClassName()));
    }
    
}