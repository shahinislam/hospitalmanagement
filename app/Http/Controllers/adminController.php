<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Department;
use App\Doctor;
use App\Login;
use App\Patient;
use App\Nurse;
use App\Pharmacist;
use App\Laboratorist;
use App\Accountant;
use App\Notice;
use App\Admin;
use App\WhoLogged;

use DB;
use Hash;

class adminController extends Controller{

	public function getLogout(){
		Auth::logout();
		return redirect()->route('home.index');
	}

	public function getAdminDashboard(){

		return view('admin.dashboard');
	}

	/* Admin */

	public function getAdminProfile(){
		$email=Auth::user()->email;

		$profile=Admin::where('email','=',$email)->first();
		
		return view('admin.profile',['profile'=>$profile]);
	}

	public function postAdminUpdateProfile(Request $request){
         $this->validate($request,[
             'name'=>'required',
             'email'=>'required|email',
             'address'=>'required',
             'phone'=>'required',
             'oldpass'=>'required'
		]);

         $check=0;

         $email=Auth::user()->email;
         $oldpass=Auth::user()->password;
        
         $profile=Admin::where('email','=',$email)->first();

         if(Hash::check($request['oldpass'], $oldpass))
         {
	          if($request['newpass']!=''&&$request['conpass']!=''&&$request['newpass']==$request['conpass'])
	          {
	         	$profile->password=bcrypt($request['newpass']);
	         	$check=1;
	          }
         }else{
         	return redirect()->route('admin.profile')->with(['fail'=>'Password is wrong!']);
         }

         $profile->name=$request['name'];
         $profile->email=$request['email'];
         $profile->address=$request['address'];
         $profile->phone=$request['phone'];
         $profile->update();

        $login=Login::where('email','=',$email)->first();
	    $login->email=$request['email'];
	    if($check===1){
	        $login->password=bcrypt($request['newpass']);
	    }
	    $login->update();

         return redirect()->route('admin.profile')->with(['success'=>'Profile Successfully Updated!']);
	}

	/* Department */

	public function getAdminDepartment(){
		$department=Department::all();
		
		return view('admin.department',['department'=>$department,'section_head'=>'Department']);
	}

	public function postAdminDepartment(Request $request){

		$this->validate($request,[
             'dept_name'=>'required|unique:departments',
             'dept_description'=>'required'
		]);

		$department=new Department();
		$department->dept_name=$request['dept_name'];
		$department->dept_description=$request['dept_description'];
		$department->save();

		$department=Department::all();

		return view('admin.department',['department'=>$department]);
	}

	public function getDeleteDepartment($department_id){
		$department=Department::find($department_id);
		if(!$department)
		{
			return redirect()->route('admin.department')->with(['fail'=>'Department not found!']);
		}

		$department->delete();
		return redirect()->route('admin.department')->with(['success'=>'Department Successfully Deleted!']);
	}

	/* Doctor */

	public function getAdminDoctor(){
        $department=Department::all();
        $doctor=Doctor::all();
		return view('admin.doctor',['department'=>$department,'doctor'=>$doctor]);
	}

	public function postAdminDoctor(Request $request){

		$this->validate($request,[
             'name'=>'required|unique:doctors',
             'email'=>'required|email|unique:logins',
             'password'=>'required',
             'address'=>'required',
             'phone'=>'required',
             'department'=>'required',
             'profile'=>'required'
		]);

		$doctor=new Doctor();
		$doctor->name=$request['name'];
		$doctor->email=$request['email'];
		$doctor->password=bcrypt($request['password']);
		$doctor->address=$request['address'];
		$doctor->phone=$request['phone'];
		$doctor->department=$request['department'];
		$doctor->profile=$request['profile'];
	    $doctor->save();

	    $login=new Login();
	    $login->type='doctor';
	    $login->email=$request['email'];
	    $login->password=bcrypt($request['password']);
	    $login->save();

		$doctor=Doctor::all();
		$department=Department::all();

		return redirect()->route('admin.doctor')->with(['doctor'=>$doctor,'department'=>$department,'success'=>'Doctor Successfully Inserted!']);
	}

	public function getDeleteDoctor($doctor_id, $doctor_email){
		$doctor_id=Doctor::find( $doctor_id );
		if(!$doctor_id)
		{
			return redirect()->route('admin.doctor')->with(['fail'=>'Doctor not found!']);
		}
        
		$email=$doctor_email;

		$query=Login::where('type','=','doctor')
		         ->where('email','=',$email)
                 ->first();
        $query->delete();
        $doctor_id->delete();

		return redirect()->route('admin.doctor')->with(['success'=>'Doctor Successfully Deleted!']);
	}

	/* Patient */

	public function getAdminPatient(){
        $patient=Patient::all();
		return view('admin.patient',['patient'=>$patient]);
	}

	public function postAdminPatient(Request $request){

		$this->validate($request,[
             'name'=>'required|unique:patients',
             'email'=>'required|email|unique:logins',
             'password'=>'required',
             'address'=>'required',
             'phone'=>'required',
             'sex'=>'required',
             'birth'=>'required',
             'age'=>'required',
             'blood'=>'required',
		]);

		$patient=new Patient();
		$patient->name=$request['name'];
		$patient->email=$request['email'];
		$patient->password=bcrypt($request['password']);
		$patient->address=$request['address'];
		$patient->phone=$request['phone'];
		$patient->sex=$request['sex'];
		$patient->birth=$request['birth'];
		$patient->age=$request['age'];
		$patient->blood=$request['blood'];
	    $patient->save();

	    $login=new Login();
	    $login->type='patient';
	    $login->email=$request['email'];
	    $login->password=bcrypt($request['password']);
	    $login->save();

		$patient=Patient::all();

		return redirect()->route('admin.patient')->with(['patient'=>$patient,'success'=>'Patient Successfully Inserted!']);
	}

	public function getDeletePatient($patient_id, $patient_email){
		$patient_id=Patient::find( $patient_id );
		if(!$patient_id)
		{
			return redirect()->route('admin.patient')->with(['fail'=>'Patient not found!']);
		}
        
		$email=$patient_email;

		$query=Login::where('type','=','patient')
		         ->where('email','=',$email)
                 ->first();
        $query->delete();
        $patient_id->delete();

		return redirect()->route('admin.patient')->with(['success'=>'Patient Successfully Deleted!']);
	}

  /* Nurse */

  public function getAdminNurse(){
        $nurse=Nurse::all();
		return view('admin.nurse',['nurse'=>$nurse]);
	}

	public function postAdminNurse(Request $request){

		$this->validate($request,[
             'name'=>'required|unique:nurses',
             'email'=>'required|email|unique:logins',
             'password'=>'required',
             'address'=>'required',
             'phone'=>'required'
		]);

		$nurse=new Nurse();
		$nurse->name=$request['name'];
		$nurse->email=$request['email'];
		$nurse->password=bcrypt($request['password']);
		$nurse->address=$request['address'];
		$nurse->phone=$request['phone'];
	    $nurse->save();

	    $login=new Login();
	    $login->type='nurse';
	    $login->email=$request['email'];
	    $login->password=bcrypt($request['password']);
	    $login->save();

		$nurse=Nurse::all();

		return redirect()->route('admin.nurse')->with(['nurse'=>$nurse,'success'=>'Nurse Successfully Inserted!']);
	}

	public function getDeleteNurse($nurse_id, $nurse_email){
		$nurse_id=Nurse::find( $nurse_id );
		if(!$nurse_id)
		{
			return redirect()->route('admin.nurse')->with(['fail'=>'Nurse not found!']);
		}
        
		$email=$nurse_email;

		$query=Login::where('type','=','nurse')
		         ->where('email','=',$email)
                 ->first();
        $query->delete();
        $nurse_id->delete();

		return redirect()->route('admin.nurse')->with(['success'=>'Nurse Successfully Deleted!']);
	}

	/* Pharmacist */

  public function getAdminPharmacist(){
        $pharmacist=Pharmacist::all();
		return view('admin.pharmacist',['pharmacist'=>$pharmacist]);
	}

	public function postAdminPharmacist(Request $request){

		$this->validate($request,[
             'name'=>'required|unique:pharmacists',
             'email'=>'required|email|unique:logins',
             'password'=>'required',
             'address'=>'required',
             'phone'=>'required'
		]);

		$pharmacist=new Pharmacist();
		$pharmacist->name=$request['name'];
		$pharmacist->email=$request['email'];
		$pharmacist->password=bcrypt($request['password']);
		$pharmacist->address=$request['address'];
		$pharmacist->phone=$request['phone'];
	    $pharmacist->save();

	    $login=new Login();
	    $login->type='pharmacist';
	    $login->email=$request['email'];
	    $login->password=bcrypt($request['password']);
	    $login->save();

		$pharmacist=Pharmacist::all();

		return redirect()->route('admin.pharmacist')->with(['pharmacist'=>$pharmacist,'success'=>'Pharmacist Successfully Inserted!']);
	}

	public function getDeletePharmacist($pharmacist_id, $pharmacist_email){
		$pharmacist_id=Pharmacist::find( $pharmacist_id );
		if(!$pharmacist_id)
		{
			return redirect()->route('admin.pharmacist')->with(['fail'=>'Pharmacist not found!']);
		}
        
		$email=$pharmacist_email;

		$query=Login::where('type','=','pharmacist')
		         ->where('email','=',$email)
                 ->first();
        $query->delete();
        $pharmacist_id->delete();

		return redirect()->route('admin.pharmacist')->with(['success'=>'Pharmacist Successfully Deleted!']);
	}

	/* Laboratorist */

  public function getAdminLaboratorist(){
        $laboratorist=Laboratorist::all();
		return view('admin.laboratorist',['laboratorist'=>$laboratorist]);
	}

	public function postAdminLaboratorist(Request $request){

		$this->validate($request,[
             'name'=>'required|unique:pharmacists',
             'email'=>'required|email|unique:logins',
             'password'=>'required',
             'address'=>'required',
             'phone'=>'required'
		]);

		$laboratorist=new Laboratorist();
		$laboratorist->name=$request['name'];
		$laboratorist->email=$request['email'];
		$laboratorist->password=bcrypt($request['password']);
		$laboratorist->address=$request['address'];
		$laboratorist->phone=$request['phone'];
	    $laboratorist->save();

	    $login=new Login();
	    $login->type='laboratorist';
	    $login->email=$request['email'];
	    $login->password=bcrypt($request['password']);
	    $login->save();

		$laboratorist=Laboratorist::all();

		return redirect()->route('admin.laboratorist')->with(['laboratorist'=>$laboratorist,'success'=>'Laboratorist Successfully Inserted!']);
	}

	public function getDeleteLaboratorist($laboratorist_id, $laboratorist_email){
		$laboratorist_id=Laboratorist::find( $laboratorist_id );
		if(!$laboratorist_id)
		{
			return redirect()->route('admin.laboratorist')->with(['fail'=>'Laboratorist not found!']);
		}
        
		$email=$laboratorist_email;

		$query=Login::where('type','=','laboratorist')
		         ->where('email','=',$email)
                 ->first();
        $query->delete();
        $laboratorist_id->delete();

		return redirect()->route('admin.laboratorist')->with(['success'=>'Laboratorist Successfully Deleted!']);
	}

	/* Accountant */

  public function getAdminAccountant(){
        $accountant=Accountant::all();
		return view('admin.accountant',['accountant'=>$accountant]);
	}

	public function postAdminAccountant(Request $request){

		$this->validate($request,[
             'name'=>'required|unique:pharmacists',
             'email'=>'required|email|unique:logins',
             'password'=>'required',
             'address'=>'required',
             'phone'=>'required'
		]);

		$accountant=new Accountant();
		$accountant->name=$request['name'];
		$accountant->email=$request['email'];
		$accountant->password=bcrypt($request['password']);
		$accountant->address=$request['address'];
		$accountant->phone=$request['phone'];
	    $accountant->save();

	    $login=new Login();
	    $login->type='accountant';
	    $login->email=$request['email'];
	    $login->password=bcrypt($request['password']);
	    $login->save();

		$accountant=Accountant::all();

		return redirect()->route('admin.accountant')->with(['accountant'=>$accountant,'success'=>'Accountant Successfully Inserted!']);
	}

	public function getDeleteAccountant($accountant_id, $accountant_email){
		$accountant_id=Accountant::find( $accountant_id );
		if(!$accountant_id)
		{
			return redirect()->route('admin.accountant')->with(['fail'=>'Accountant not found!']);
		}
        
		$email=$accountant_email;

		$query=Login::where('type','=','accountant')
		         ->where('email','=',$email)
                 ->first();
        $query->delete();
        $accountant_id->delete();

		return redirect()->route('admin.accountant')->with(['success'=>'Accountant Successfully Deleted!']);
	}

	/* NoticeBoard */

  public function getAdminNotice(){
        $notice=Notice::all();
		return view('admin.notice',['notice'=>$notice]);
	}

	public function postAdminNotice(Request $request){

		$this->validate($request,[
             'title'=>'required',
             'notice'=>'required',
             'date'=>'required'
		]);

		$notice=new Notice();
		$notice->title=$request['title'];
		$notice->notice=$request['notice'];
		$notice->date=$request['date'];
        $notice->save();

		$notice=Notice::all();

		return redirect()->route('admin.notice')->with(['notice'=>$notice,'success'=>'Notice Successfully Inserted!']);
	}

	public function getDeleteNotice($notice_id){
		$notice_id=Notice::find( $notice_id );
		if(!$notice_id)
		{
			return redirect()->route('admin.notice')->with(['fail'=>'Notice not found!']);
		}
        
        $notice_id->delete();

		return redirect()->route('admin.notice')->with(['success'=>'Notice Successfully Deleted!']);
	}

}