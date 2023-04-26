<?php

namespace Crysys\Base\Facades;

use Crysys\Base\Supports\MetaBox;
use Illuminate\Support\Facades\Facade;

class MetaBoxFacade extends Facade
{

    /**
     * @return string
     * @since 2.2
     */
    protected static function getFacadeAccessor()
    {
        return MetaBox::class;
    }
}
