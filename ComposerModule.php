<?php

namespace atuin\skeleton;

/**
 * Class Module
 *
 * Skeleton Module Class used to be extended in the rest of Atuin core and additional Modules.
 *
 * @package atuin\skeleton
 */
class ComposerModule extends Module
{

    /**
     * Composer package name that will be installed with this Atuin APP
     * 
     * @var String
     */
    protected $composerPackage;

    /**
     * Composer Version of the package that will be installed
     * 
     * @var String
     */
    protected $composerVersion;

    /**
     * Returns the composer package name and version of the module
     *
     * F.ex: namespace/namePack:dev-master
     *
     * @param bool $onlyPackage
     * @return String
     * @throws \HttpRequestMethodException
     */
    public function getComposerPackageData($onlyPackage = FALSE)
    {
        if (is_null($this->composerPackage) or is_null($this->composerVersion))
        {
            throw new \HttpRequestMethodException('Composer package or version not defined for this Atuin App');
        }

        $response = $this->composerPackage;

        if ($onlyPackage === FALSE)
        {
            $response.= ':' . $this->composerVersion;
        }

        return $response;
    }

}