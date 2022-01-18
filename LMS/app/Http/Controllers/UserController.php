<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Setting;
use App\Models\Course;
use App\Models\Teacher;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Stevebauman\Location\Facades\Location;

class UserController extends Controller
{
    public function store(Request $request)
    {
        
        request()->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'dateNaissance' => ['required', 'date'],
            'genre' => ['required'],
            'lieuNaissance' => ['required', 'string','min:9','max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tel' => ['required','string', 'min:9','max:9'],
        ]);

       $user =  User::create([
            'prenom' => $request['prenom'],
            'nom' => $request['nom'],
            'adresse' => $request['adresse'],
            'genre' => $request['genre'],
            'dateNaissance' => $request['dateNaissance'],
            'lieuNaissance' => $request['lieuNaissance'],
            'email' => $request['email'],
            'tel' => $request['tel'],
            'password' => Hash::make($request['password']),
        ]);

     

        return view('backend.'.$user->role.'.dashboard.index');
    
    }

    public function sendContact(Request $request)
    {

        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'sujet' => ['required','max:255'],
            'message' => ['required',],
        ]);

        $data = Location::get(request()->ip() );
        $email_site = Setting::where('code','email')->get()->first();
       

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'sujet' => $request->sujet,
            'message' => $request->message,
            'adresse' => $data,
            'date' => new DateTime('now'),
            'destinataire' =>  $email_site->value,
        ]);

        return redirect()->back()->with('success','votre message a bien été enregistrer
                                                    \n Nous vous reviendrons sous peu');
    }

    public function accueille()
    {
        $courses = Course::all();
        $teachers = Teacher::all();
        return view('frontend.pages.accueil',compact('courses','teachers'));
    }
    public function apropos()
    {
        return view('frontend.pages.apropos');
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    public function service()
    {
        return view('frontend.pages.service');
    }
    public function cours()
    {
        $courses = Course::all();
        return view('frontend.pages.cours',compact('courses'));
    }
    public function categories()
    {
        return view('frontend.pages.categorie');
    }
    public function quiz()
    {
        return view('frontend.pages.quiz');        
    }
}
