<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;


class MassengerController extends Controller
{
    //
    public function upload(Request $request){
 
      if ($request->hasFile('image')) {
        # code...
        // return $request->all();
        $imageName = $request->image->getClientOriginalName();
        $request->image->storeAs('public',$imageName);
        $request->user()->update(['image'=>$imageName]);
        return response(null,202);
      }


    }

    public function sendMessage(Request $request){

                          $convId = $request->conversation_id;
                  $msgFrom=$request->msgFrom;
             //     return $request->all();
        $fetch_user_to = DB::table('messages')
                                  ->select('user_to')
                                  ->where('conversation_id',$convId)
                                  ->where('user_to','!=',Auth::user()->id)
                                  ->get();

          //    return $fetch_user_to[0]->user_to;

                //  return $convId;
        // $dataMessage = array(

        //         'user_to'=>$fetch_user_to[0]->user_to,
        //         'user_from'=> Auth::user()->id,
        //         'conversation_id'=>$convId,
        //         'msg'=>$msgFrom,
        //         'status'=>1,
        // );


        

       $sendMessage = DB::table('messages')->insert([
                'user_from'=> Auth::user()->id,
                'user_to'=>$fetch_user_to[0]->user_to,
                'conversation_id'=>$convId,
                'msg'=>$msgFrom,
                'status'=>1,
       ]);

      if ($sendMessage) {
            $userMsg = DB::table('messages')
            ->leftJoin('users','users.id','messages.user_from')
            ->where('messages.conversation_id',$convId)->get();
            return $userMsg;
       } 
    }




}
