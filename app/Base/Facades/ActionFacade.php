<?php

namespace Crysys\Base\Facades;

use Crysys\Base\Supports\Action;
use Illuminate\Support\Facades\Facade;

class ActionFacade extends Facade
{

    /**
     * @return string
     * @since 2.1
     */
    protected static function getFacadeAccessor()
    {
        return Action::class;
    }
}
