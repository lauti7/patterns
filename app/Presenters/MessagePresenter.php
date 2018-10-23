<?php

namespace App\Presenters;

use App\Messages;
use App;
/**
 *
 */
class MessagePresenter extends Presenter
{

    // VIEW PRESENTER DEL NOMBRE Y EMAIL DE LOS MENSAJES,

    public function userName()
    {
        if ($this->model->user_id) {
            return $this->userLink();
        }
        return $this->model->nombre;
    }

    public function userEmail()
    {
        if ($this->model->user_id) {
            return $this->model->user->email;
        }
        return $this->model->email;
    }

    public function userLink()
    {
        return $this->model->user->present()->link();
    }



}



 ?>
