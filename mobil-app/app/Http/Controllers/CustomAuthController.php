<?php

namespace App\Http\Controllers;

use App\Models\Showroom;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Contracts\Service\Attribute\Required;

class CustomAuthController extends Controller
{
   public function login()
   {
        return view("auth.login");
   }

   public function register()
   {
        return view("auth.register");
   }

   public function registerUser(Request $request)
   {
        $request->validate([
            'email'=> 'required|email|unique:users',
            'name'=> 'required',
            'no_hp'=> 'required',
            'password'=> 'required',
            'konfirmasi_password'=> 'required'
        ]);

        $user = new User();

        $user->name = $request ->name;
        $user->email = $request ->email;
        $user->no_hp = $request ->no_hp;
        $user->password = Hash::make($request ->password);

        $res = $user-> save();

        if($res){
            return back()-> with('success', 'Registration Successful');
        }else{
            return back()-> with('fail', 'Registration Failed');
        }
   }

   public function loginUser(Request $request)
   {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('home');
            }else{
                return back()->with('fail', 'Password does not match');
            }
        }else{
            return back()->with('fail', 'This email is not registered');
        }
   }

   public function home()
   {
        $data = array();
        if(session()->has('loginId')){
            $data = User::where('id', '=', session()->get('loginId'))->first();
        }
        return view('home', compact('data'));
   }

   public function logout()
   {
        if (session()->has('loginId')) {
            session()->pull('loginId');
            return redirect('login');
        }
   }

   public function addcar()
   {
        $data = array();
        if (session()->has('loginId')) {
            $data = User::where('id', '=', session()->get('loginId'))->first();
        }
        return view("addcar", compact('data'));
   }

   public function addNewCar(Request $request)
   {

        $car = new Showroom();

        $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'owner' => 'required',
            'brand' => 'required',
            'purchase_date' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'status' => 'required'
        ]);

        $car->name = $request->name;
        $car->user_id = $request->user_id;
        $car->owner = $request->owner;
        $car->brand = $request->brand;
        $car->purchase_date = $request->purchase_date;
        $car->description = $request->description;
        $car->image = $request->image;
        $car->status = $request->status;

        if($request->hasFile('image')){
            $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
            $car->image = $request->file('image')->getClientOriginalName();
        }

        $res = $car -> save();

        if($res){
            return back()-> with('success', 'Data berhasil dimasukkan');
        }else{
            return back()-> with('fail', 'Data gagal dimasukkan');
        }
    
   }

   public function listcar()
   {
        $data = array();
        //$mobil = array();

        if (session()->has('loginId')) {
            $data = User::where('id', '=', session()->get('loginId'))->first();
            $mobil = Showroom::all();
        }

        return view("listcar", compact('mobil', 'data'));
   }

   public function cardetail($id)
   {
        if (session()->has('loginId')) {
            $mobil = Showroom::find($id);
        }
        return view("cardetail", compact('data'));
   }

   public function ()
   {
        $data = array();
        if (session()->has('loginId')) {
            $data = User::where('id', '=', session()->get('loginId'))->first();
        }
        return view("profile", compact('data'));
   }

   public function edit()
   {
        $data = array();
        if (session()->has('loginId')) {
            $data = User::where('id', '=', session()->get('loginId'))->first();
        }
        return view("edit", compact('data'));
   }

   public function delete($id)
   {
        $mobil = Showroom::find($id);
        $mobil->delete();

        return redirect()->route('listcar')->with('success', 'Data berhasil dihapus');
       }
}
