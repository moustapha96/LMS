<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Notifications\Notifications;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    
    /**
     * Gestion des notification admin
     */
    public function index()
    {
        $m_recu =  auth()->user()->notifications()->get();

        $notifications = DatabaseNotification::all();

       
        $users = User::all();
        return view('backend.'.Auth::user()->role.'.notifications.index',[
            'notifications'=> $notifications,
            'users' => $users,
            'm_recu' => $m_recu
        ]);
    }
 
    public function store(Request $request)
    {
        
        request()->validate([
                'subject' => ['required', 'string', 'max:255'],
                'body' => ['required', 'string', 'max:255'],
                'email' => ['required'],
            ]); 

          
            $files = $request->file('attachment');
          
            if($request->hasFile('attachment'))
            {
                foreach ($files as $file) {

                    $filename = $file->getClientOriginalName();
                    $name = "uploads/messages/" .$filename;
                    $file->move(public_path('uploads/messages'), $filename);
                    $data[] = $name;
                }
            }else{
                $data = [];
            }
          
            if( request()->email != null )
            {
                
                $message  = new Message();
                $message->subject = request()->subject;
                $message->body = request()->body;
                $message->attachment = $data;
                $message->date = new DateTime('now');

                if(request()->email == 'student' || 
                        request()->email == 'teacher' || 
                        request()->email == 'admin' )
                {
                    $user_group = User::where('role',request()->email)->get();
                    foreach ($user_group as $user) {
                        $user->notify(new Notifications($message, auth()->user(),$user));
                    }  
                }
                else {

                    $user = User::where('email',request()->email)->firstorFail();
                    $user->notify(new Notifications($message, auth()->user(),$user));
                }
            }
           

            return redirect()->action('MessageController@index')->with('success', 'Message bien envoyé');

    }

    public function show()
    { 
        if(auth()->user()->unreadNotifications->count() == 0 ){
            return redirect()->action('MessageController@index')->with('error','Vous n\'avez pas de nouveau notification ');
        }
        return redirect()->action('MessageController@index');

    }
   
    public function updateNotification( DatabaseNotification $notification)
    {
        $notification->markAsRead();
        
        return redirect()->back()->with('success','notification marqué comme lu ');
    }
    
    public function destroy(DatabaseNotification $notification)
    {
        $notification->delete();
       
        return redirect()->back()->with('success','message supprimé ');
    }


    // notifications delete all
    public function deleteAllNotification(Request $request)
    {
       
        $ids = $request->ids;
        $data = [];
        
        if( $ids == null ){
            return redirect()->back()->with('error','auncun message n\'a été sélectionné');
        }
        foreach ($ids as$id) {
             
            $data[] = DB::Table('notifications')->where('id',$id)->get()->first();
        }

        foreach ($data as $d) {
            DatabaseNotification::find($d->id)->get()->first()->delete();
        }
       
        return redirect()->back()->with('success','messgaes bien supprimés');

    }

     // repondre message 
    public function ResponseMessage(Request $request,DatabaseNotification $notification){
        request()->validate([
            'message' => ['required', 'string', 'max:255'],
        ]);
       
        $receiver = User::where('email', $notification->data['receiver'])->first();
       
       $mess =  Message::create([
            'sujet' => $notification->data['sujet'],
            'message' => $request->message,
            'sender_id' => Auth::user()->id,
            'date' =>  new DateTime('now'),
            'receiver_id' => $receiver->id,
        ]);
       
        $receiver->notify(new Notifications($mess, auth()->user(),$receiver));   
           
        return redirect()->back()->with('success','réponse envoyé avec succées');

    }

    /**
     * Gestion des notification étudiant
     */
    public function s_index()
    {
        $m_recu =  auth()->user()->notifications()->get();

        $notifications = DatabaseNotification::all();

       
        $users = User::all();
        return view('backend.'.Auth::user()->role.'.notifications.index',[
            'notifications'=> $notifications,
            'users' => $users,
            'm_recu' => $m_recu
        ]);
    }
 
    public function s_store(Request $request)
    {
        
        request()->validate([
                'subject' => ['required', 'string', 'max:255'],
                'body' => ['required', 'string', 'max:255'],
                'email' => ['required'],
            ]); 
          
            $files = $request->file('attachment');
          
            if($request->hasFile('attachment'))
            {
                foreach ($files as $file) {

                    $filename = $file->getClientOriginalName();
                    $name = "uploads/messages/" .$filename;
                    $file->move(public_path('uploads/messages'), $filename);
                    $data[] = $name;
                }
            }else{
                $data = [];
            }
          
            if( request()->email != null )
            {                
                $message  = new Message();
                $message->subject = request()->subject;
                $message->body = request()->body;
                $message->attachment = $data;
                $message->date = new DateTime('now');

                $user = User::where('email',request()->email)->firstorFail();
                $user->notify(new Notifications($message, auth()->user(),$user));
            }
            else {
                return redirect()->back()->with('error',"désolé , destinataire non trouvé");
            }
           

            return redirect()->action('MessageController@index')->with('success', 'Message bien envoyé');

    }


    /**
     * Gestion des notification formateur
     */
    public function f_index()
    {
        $m_recu =  auth()->user()->notifications()->get();

        $notifications = DatabaseNotification::all();

       
        $users = User::all();
        return view('backend.'.Auth::user()->role.'.notifications.index',[
            'notifications'=> $notifications,
            'users' => $users,
            'm_recu' => $m_recu
        ]);
    }
 
    public function f_store(Request $request)
    {
        
        request()->validate([
                'subject' => ['required', 'string', 'max:255'],
                'body' => ['required', 'string', 'max:255'],
                'email' => ['required'],
            ]); 

          
            $files = $request->file('attachment');
          
            if($request->hasFile('attachment'))
            {
                foreach ($files as $file) {

                    $filename = $file->getClientOriginalName();
                    $name = "uploads/messages/" .$filename;
                    $file->move(public_path('uploads/messages'), $filename);
                    $data[] = $name;
                }
            }else{
                $data = [];
            }
          
            if( request()->email != null )
            {
                
                $message  = new Message();
                $message->subject = request()->subject;
                $message->body = request()->body;
                $message->attachment = $data;
                $message->date = new DateTime('now');

                $user = User::where('email',request()->email)->firstorFail();
                $user->notify(new Notifications($message, auth()->user(),$user));
            }
            else {
                return redirect()->back()->with('error',"désolé , destinataire non trouvé");
            }
           

            return redirect()->action('MessageController@index')->with('success', 'Message bien envoyé');

    }


    public function other_show()
    { 
        if(auth()->user()->unreadNotifications->count() == 0 ){
            return redirect()->action('MessageController@index')->with('error','Vous n\'avez pas de nouveau notification ');
        }
        return redirect()->action('MessageController@index');

    }
   
    public function other_updateNotification( DatabaseNotification $notification)
    {
        $notification->markAsRead();
        
        return redirect()->back()->with('success','notification marqué comme lu ');
    }
    
    public function other_destroy(DatabaseNotification $notification)
    {
        $notification->delete();
       
        return redirect()->back()->with('success','message supprimé ');
    }


    // notifications delete all
    public function other_deleteAllNotification(Request $request)
    {
       
        $ids = $request->ids;
        $data = [];
        
        if( $ids == null ){
            return redirect()->back()->with('error','auncun message n\'a été sélectionné');
        }
        foreach ($ids as$id) {
             
            $data[] = DB::Table('notifications')->where('id',$id)->get()->first();
        }

        foreach ($data as $d) {
            DatabaseNotification::find($d->id)->get()->first()->delete();
        }
       
        return redirect()->back()->with('success','messgaes bien supprimés');

    }

     // repondre message 
    public function  other_ResponseMessage(Request $request,DatabaseNotification $notification){
        request()->validate([
            'message' => ['required', 'string', 'max:255'],
        ]);
       
        $receiver = User::where('email', $notification->data['receiver'])->first();
       
       $mess =  Message::create([
            'sujet' => $notification->data['sujet'],
            'message' => $request->message,
            'sender_id' => Auth::user()->id,
            'date' =>  new DateTime('now'),
            'receiver_id' => $receiver->id,
        ]);
       
        $receiver->notify(new Notifications($mess, auth()->user(),$receiver));   
           
        return redirect()->back()->with('success','réponse envoyé avec succées');

    }

}
