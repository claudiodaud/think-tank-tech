<?php

namespace App\Http\Controllers;

use App\Message;
use App\Notifications\MessageSent;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {           
           $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // no puedo usar $message por que es una variable reservada de laravel
        $msgsent = Message::where('from', auth()->user()->id)->orderBy('id', 'Asc')->paginate(10);
        $msgreceived = Message::where('to', auth()->user()->id)->orderBy('id', 'Asc')->paginate(10); 
        $msgtrashed = Message::orderBy('id', 'DESC')->onlyTrashed()->get();

        dd($msgsent);

        return [
            'pagination_msgsent' => [
                'total'         => $msgsent->total(),
                'current_page'  => $msgsent->currentPage(),
                'per_page'      => $msgsent->perPage(),
                'last_page'     => $msgsent->lastPage(),
                'from'          => $msgsent->firstItem(),
                'to'            => $msgsent->lastItem(),
            ],
            'pagination_msgreceived' => [
                'total'         => $msgreceived->total(),
                'current_page'  => $msgreceived->currentPage(),
                'per_page'      => $msgreceived->perPage(),
                'last_page'     => $msgreceived->lastPage(),
                'from'          => $msgreceived->firstItem(),
                'to'            => $msgreceived->lastItem(),
            ],
            'msg' => $msg,
            'msgtrashed' => $msgtrashed
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if (isset($request)) {

            $this->validate($request, [
                'to' => 'required|exist:users,id',
                'message' => 'required'
            ]);

            // create a new Role object
            $msg            = new Message;
            $msg->from      = auth()->user()->id;
            $msg->to        = $request->to;
            $msg->message   = $request->message;
            $msg->save();

            $recipient_id = User::find($request->to);

            $recipient_id->notify(new MessageSent($msg));   
               
            return true;
       }

       return false; 
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $msg = Message::find($id);
        return $msg;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $msg = Message::find($id);
        return $msg ;
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
       if (isset($request)) {
            $this->validate($request, [
            'from' => 'required',
            'to' => 'required',
            'message' => 'required'
        ]);

        Message::find($id)->update($request->all());

        // TO DO relationship with users

        return true;

       }

      return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $msg = Message::findOrFail($id);
        $msg->delete();

        return true;
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $msg = Message::findOrFail($id);
        $msg->restore();

        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function forcedelete($id)
    {
        $msg = Message::findOrFail($id);
        $msg->forceDelete();
        
        return true;
    }
}
