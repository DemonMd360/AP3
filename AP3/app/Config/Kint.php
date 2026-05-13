<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Kint extends BaseConfig
{
    public $plugins = null;

    public int $maxDepth = 6;
    public bool $displayCalledFrom = true;
    public bool $expanded = false;

    public string $richTheme = 'aante-light.css';
    public bool $richFolder = false;

    public $richObjectPlugins = null;
    public $richTabPlugins = null;

    public bool $cliColors = true;
    public bool $cliForceUTF8 = false;
    public bool $cliDetectWidth = true;
    public int $cliMinWidth = 40;
}
