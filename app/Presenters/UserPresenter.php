<?php

namespace App\Presenters;
use App\User;


/**
 *
 */
class UserPresenter extends Presenter
{


    public function link()
    {
        return  "<a href= " . route('usuarios.show', $this->model->id) . ">{$this->model->name}";
    }
}



 ?>
