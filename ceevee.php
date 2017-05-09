<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;

class CeeveePlugin extends Plugin
{
    public $features = [
        'blueprints' => 1000,
    ];
    protected $version;

    public static function onPluginInitialized()
    {
        if ($this->isAdmin()) {
            // Store this version and prefer newer method
            if (method_exists($this, 'getBlueprint')) {
                $this->version = $this->getBlueprint()->version;
            } else {
                $this->version = $this->grav['plugins']->get('admin')->blueprints()->version;
            }
        }
    }
}
