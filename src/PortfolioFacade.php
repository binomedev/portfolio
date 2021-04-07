<?php

namespace Binomedev\Portfolio;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Binomedev\Portfolio\Portfolio
 */
class PortfolioFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Portfolio::class;
    }
}
