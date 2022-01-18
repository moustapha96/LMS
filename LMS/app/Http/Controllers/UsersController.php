<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Illuminate\Support\Str;


class UsersController extends Controller
{
       
    public function profil()
    {
        $user = Auth::user();
        return view('backend.profil.profil')->with('user',$user);
    }

    public function update_avatar(Request $request)
    {

        $this->validate($request, [
			'logo' => 'image|mimes:jpeg,png,jpg|max:2048'
		]);

		$logo = $request->file('logo');

		if(($request->file('logo')!= null) && $logo->isValid())
		{
            $filename = Auth()->user()->id .'_'.time().'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads/avatars'), $filename);

			
            $user = Auth::user();
            $user->avatar = "uploads/avatars/" . $filename;;
            $user->save();
			
		}else{
            return redirect()->back()->with('error','photo profil non enregistrer');
        }


        return redirect()->back()->with('success','photo profil mise en jour ');
    }

    public function photo_user(Request $request,$id)
    {

        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $filename = $id .'_'.time().'.'.$request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('uploads/avatars'), $filename);

        $user = User::find($id);
        $user->avatar = "uploads/avatars/" . $filename;
        $user->save();


        return redirect()->back()->with('success','photo prifil mise à jour avec succés');
    }

    public function update_profil(Request $request )
    {
        $user = Auth::user();
        request()->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'tel' => ['required','string', 'max:9','min:9'],
            'genre' => ['required','string', ],
            'dateNaissance' => ['required', 'date'],
            'lieuNaissance' => ['required', 'string','min:3','max:100'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$user->id],
        ]);

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->tel =   $request->tel;
        $user->adresse =  $request->adresse;
        $user->sexe =  $request->genre;
        $user->dateNaissance =  $request->dateNaissance;
        $user->lieuNaissance =  $request->lieuNaissance;
        $user->email = $request->email;
        $user->save();

        return redirect()->action('UsersController@profil')->with('messageSuccess', 'Les modifications ont été enregistrées avec succès !');
    }


    public function pwd()
    {

        $user = Auth::user();
        $title = "Modifier le mot de passe";
        return view('backend.profil.mdp', compact("user", "title"));
    }

    public function update_pwd(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required'],
            'password_confirmation' => ['same:password'],
        ]);

        User::find($id)->update(['password'=> Hash::make($request->password)]);

        return redirect()->action('UsersController@pwd')->with('messageSuccess', 'Le mot de passe a été modifié avec succès !');

    }
}
