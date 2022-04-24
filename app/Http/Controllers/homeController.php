<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\doctor;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\If_;

class homeController extends Controller
{
   public function redirect(){
       if(Auth::id())
       {
           if(Auth::user()->usertype=='0')
           {
               
            $docs = doctor::all();
       
            return view('user.home',['docs'=>$docs]);
           }
            else{
                return view('admin.home');
            }
       }
       else{
           return redirect()->back();
       }
   }
   public function index()

   {
       if(Auth::id())
       {
           return redirect('home');
       }
       else{
        $docs = doctor::all();
        return view('user.home',['docs'=>$docs]);
       }
   }
   public function appointment(Request $req){
       $appointment = new appointment();
       $appointment->name = $req->name;
       $appointment->email = $req->email;
       $appointment->phone = $req->phone;
       $appointment->doctor = $req->doctor;
       $appointment->date = $req->date;
       $appointment->message = $req->message;
       $appointment->status = 'In Progress';
       if(Auth::id()){
        $appointment->userId = Auth::user()->id;
       }
       $appointment->save();
       return redirect()->back()->with('message','Appointment Request Successfull, We Will Contact You Soon !');
   }
   public function myAppointment(){
       if (Auth::id()) {
         if (Auth::user()->usertype=='0') {
            $userId = Auth::user()->id;
            $appointment = appointment::where('userId',$userId)->get();
            return view('user.myappointment',compact('appointment'));
         }
         else{
             return redirect()->back();
             
         }
        
       }
       else {
          return redirect('login');
       }
       
   }
   public function cancelAppointment($id){
       $cancel = appointment::where('id',$id)->first();
       $cancel->delete();
       return redirect()->back()->with('message','Appointment Has Been Cancelled !');
   }
}