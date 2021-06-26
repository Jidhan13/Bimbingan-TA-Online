<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use App\Message;
use App\Room;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $message = Message::create($request->all());
        event(new MessageEvent());
    }

    public function ArrRemove($array, $value)
    {
        return array_values(array_diff($array, (is_array($value) ? $value : array($value))));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id == 'users') {

            $messages = Message::where('user_id', auth()->id())
                            ->orWhere('to_user_id', auth()->id())->get();

            /**
             * Menjadikan nilai array
             */
            $from = $messages->pluck('user_id')->toArray();
            $to = $messages->pluck('to_user_id')->toArray();

            /**
             * menghapus id user yang sedang login
             */
            $from = $this->ArrRemove($from, auth()->id());
            $to = $this->ArrRemove($to, auth()->id());

            /**
             * menghabungkan array (array_merge)
             * hilangkan duplikat value array (array_unique)
             */
            $data = array_unique(array_merge($from, $to));

            $users = User::whereIn('id', $data)->get();

            return response()->json($users);
        } else {
            $p1 = [['user_id', auth()->id()], ['to_user_id', $id]];
            $p2 = [['user_id', $id], ['to_user_id', auth()->id()]];
            $data = Message::where($p1)->orWhere($p2)->oldest()->get();
            return response()->json($data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
