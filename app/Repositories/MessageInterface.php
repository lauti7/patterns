<?php

namespace App\Repositories;

/**
 *
 */

interface MessageInterface
{
    //Las interfaces sirven para especificar que metodos deben agregarse a las clases que lo implementen
    
    public function getPaginated();

    public function store($request);

    public function findById($id);

    public function update($request, $id);

    public function destroy($id);
}




 ?>
