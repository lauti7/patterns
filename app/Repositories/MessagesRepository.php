<?php
namespace App\Repositories;

//use Illuminate\Support\Facades\Cache; lo usamos en el decorador el cache
use App\Messages;

/**
 *
 */
class MessagesRepository implements MessageInterface
{

    function __construct()
    {

    }

    public function getPaginated()
    {
        return Messages::with(['user', 'tags', 'note'])
               ->orderBy('created_at', request('sorted', 'DESC'))
               ->paginate(10);

    }

    public function store($request)
    {
        $message = Messages::create($request->all());

        if (auth()->check())
        {
            auth()->user()->messages()->save($message);
        }

        return $message;
    }

    public function findById($id)
    {
        return Messages::findOrFail($id);
    }

    public function update($request, $id)
    {
        return Messages::findOrFail($id)->update($request->all());
    }

    public function destroy($id)
    {
        return Messages::findOrFail($id)->delete();
    }
}


 ?>
