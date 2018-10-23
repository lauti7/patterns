<?php

namespace App\Http\Controllers;

use App\Repositories\MessageInterface;
use App\Repositories\CacheMessages;
use Illuminate\Support\Facades\Cache;
//use App\Messages; EL REPOSITORIO REMPLAZA AL MODELO
use App\Events\MessageWasReceived;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    protected $messages;

    public function __construct(MessageInterface $messages)
    {
        $this->messages = $messages;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ACCECEDIENDO AL REPOSITORIO
        $m = $this->messages->getPaginated();
        //ESTO ESTA EN EL REPOSITORIO QUE ES UNA CAPA DE INTERMEDIACION ENTRE LA APP Y LA FUENTE DE DATOS SIRVE PARA APPS GRANDE
        //$key = "messages.page." . request('page', 1); //messages.page.1, messages.page.2

        //$m =  Cache::tags('messages')->rememberForever($key,  function(){
             //return Messages::with(['user', 'tags', 'note'])
                    //->orderBy('created_at', request('sorted', 'DESC'))
                    //->paginate(10);
         //}); //esto es igual a lo de abajo, si no existe nos almacena lo que devuelve la func

        //if (Cache::has($key)) {
            //$//}
        //else {
            //$m = Messages::with(['user', 'tags', 'note'])
                        //->orderBy('created_at', request('sorted', 'ASC'))
                        //->paginate(10);

            //Cache::put($key, $m, 5);
        //}

        return view('mensajes.index', [ 'm' => $m ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mensajes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $message = $this->messages->store($request);

        event(new MessageWasReceived($message));


        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $m = $this->messages->findById($id);

        return view('mensajes.show', [ 'm' => $m]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $m = $this->messages->findById($id);

        return view('mensajes.edit', [ 'm' => $m ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->messages->update($request, $id);

        return redirect('/mensajes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Messages::findOrFail($id)->delete();

        return redirect('/mensajes');
    }
}
