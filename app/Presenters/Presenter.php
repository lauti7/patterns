<?php

namespace App\Presenters;

use Illuminate\Database\Eloquent\Model;

/**
 *
 */
abstract class Presenter
{
    //clase padre
    //abstract no se puede intanciar, solo se puede extender

    protected $model;

    function __construct(Model $model)
    {
        $this->model = $model;
    }

}




 ?>
