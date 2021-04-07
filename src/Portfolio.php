<?php

namespace Binomedev\Portfolio;

use Illuminate\Support\Traits\Macroable;

class Portfolio
{
    use Macroable;

    public function models($name = null)
    {
        return $this->getConfigItem('models', $name);
    }

    public function resources($name = null)
    {
        return $this->getConfigItem('resources', $name);
    }

    public function controllers($name = null)
    {
        return $this->getConfigItem('controllers', $name);
    }

    private function getConfigItem($key, $name = null)
    {
        if (is_null($name)) {
            return config("portfolio.{$key}");
        }

        return config("portfolio.{$key}.{$name}");
    }
}
