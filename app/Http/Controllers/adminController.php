<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\doctor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Notifications\yaynEmailNotification;
use PhpParser\Node\Stmt\Else_;
use PhpParser\Node\Stmt\If_;

class adminController extends Controller
{
    public function addDoctor(){
        if (Auth::id()) {
            if (Auth::user()->usertype=='1') {
               return view('admin.addDoctor');
            }
            else{
                return redirect()->back();                
            }
            
        }
        return redirect('login');
        
    }
    public function uploadDoctor(Request $req){
        $doctor = new doctor;
        $image = $req->file;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $req->file->move('doctorImage',$imageName);
        $doctor->name =  $req->name;
        $doctor->phone =  $req->phone;
        $doctor->speciality =  $req->speciality;
        $doctor->room =  $req->room;
        $doctor->image =  $imageName;  
        $doctor->save();
        return redirect()->back()->with('message','Doctor Has Been Successfully Addedd!');
    } 
    public function viewAppointments(){
        $appointments = appointment::all();
       if (Auth::id()) {
           if (Auth::user()->usertype=='1') {
            return view('admin.viewAppointments',['appointments'=>$appointments]);
           }
           else{
               return redirect()->back();
           }
       }
       return redirect('login');
    }
    public function approveAppointment($id){
        $appointment = appointment::find($id);
        $appointment->status = "Approved";
        $appointment->save();
        return redirect()->back()->with('message','Appointment Has Been Approved Successfully !');
    }
    public function cancellAppointment($id){
        $appointment = appointment::find($id);
        $appointment->status = "Cancelled";
        $appointment->save();
        return redirect()->back()->with('message','Appointment Has Been Cancelled Successfully !');
        
    }
    public function viewDoctor(){
        $doctors = doctor::all();
        return view('admin.viewDoctor',compact('doctors'));
    }
    public function deleteDoctor($id){
        $doctor = doctor::find($id);
        $doctor->delete();
        return redirect()->back();
    }
    public function updateDoctor($id){
        $doctor = doctor::find($id);
        return view('admin.updateDoctor',compact('doctor'));      
    }
    public function editDoctor(Request $req, $id){
        $doctor = doctor::find($id);
        $doctor->name = $req->name;
        $doctor->phone = $req->phone;
       $newSpeciality =  $req->speciality;
       if($newSpeciality){
        $doctor->speciality = $req->speciality;
       }
       
        $doctor->room = $req->room;
        $image = $req->image;
        if($image ){
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $req->image->move('doctorImage',$imageName);
        $doctor->image = $imageName;
        }
        $doctor->save();
        session()->flash('message','Doctor Updated Successfully !');
        return redirect('viewDoctor');




    
        
    }
    public function composeEmail($id){
        
       $appointment =  appointment::find($id);
        return view('admin.composeEmail',compact('appointment'));
    }
    
    public function sendEmail(Request $req,$id){
        $appointment =  appointment::find($id);
        $emailAttributes = [
            'greeting'=>$req->greeting,
            'body'=>$req->body,
            'actionText'=>$req->actionText,
            'textUrl'=>$req->actionUrl,
            'endPart'=>$req->endPart
        ];

    Notification::send($appointment,new yaynEmailNotification($emailAttributes));
    return redirect()->back()->with('message','Email Successfully Sent');
        
  
     }
}