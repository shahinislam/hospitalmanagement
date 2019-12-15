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
use App\WhoLogged;
use App\Appointment;
use App\Prescription;
use App\BedAllotment;
use App\Blood;
use App\DoctorReport;
use App\Bed;
use App\BloodDonor;
use App\ManageReport;

use DB;
use Hash;

class doctorController extends Controller{

	public function getLogout(){
		Auth::logout();
		return redirect()->route('home.index');
	}

	public function getDoctorDashboard(){

		return view('doctor.dashboard');
	}



	/* Patient */

	public function getDoctorPatient(){
        $patient=Patient::all();
		return view('doctor.patient',['patient'=>$patient]);
	}

	public function postDoctorPatient(Request $request){

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

		return redirect()->route('doctor.patient')->with(['patient'=>$patient,'success'=>'Patient Successfully Inserted!']);
	}

	public function getDeletePatient($patient_id, $patient_email){
		$patient_id=Patient::find( $patient_id );
		if(!$patient_id)
		{
			return redirect()->route('doctor.patient')->with(['fail'=>'Patient not found!']);
		}
        
		$email=$patient_email;

		$query=Login::where('type','=','patient')
		         ->where('email','=',$email)
                 ->first();
        $query->delete();
        $patient_id->delete();

		return redirect()->route('doctor.patient')->with(['success'=>'Patient Successfully Deleted!']);
	}
     
     /* Manage Appointment */

	public function getDoctorAppointment(){
        $appointment=Appointment::all();
        $email=Auth::user()->email;
        $doctor=Doctor::where('email','=',$email)->first();
        $patient=Patient::all();

		return view('doctor.appointment',['appointment'=>$appointment,'doctor'=>$doctor,'patient'=>$patient]);
	}

	public function postDoctorAppointment(Request $request){

		$this->validate($request,[
             'doctor'=>'required',
             'patient'=>'required',
             'date'=>'required'
		]);

		$appointment=new Appointment();
		$appointment->date=$request['date'];
		$appointment->doctor=$request['doctor'];
		$appointment->patient=$request['patient'];
	    $appointment->save();


		$appointment=Appointment::all();
		$email=WhoLogged::first()->email;
        $doctor=Doctor::where('email','=',$email)->first();
        $patient=Patient::all();

		return redirect()->route('doctor.appointment')->with(['appointment'=>$appointment,'doctor'=>$doctor,'patient'=>$patient,'success'=>'Appointment Successfully Recorded!']);
	}

	public function getDeleteAppointment($appointment_id){
		$appointment_id=Appointment::find( $appointment_id );
		if(!$appointment_id)
		{
			return redirect()->route('doctor.appointment')->with(['fail'=>'Appointment not found!']);
		}
        

        $appointment_id->delete();

		return redirect()->route('doctor.appointment')->with(['success'=>'Appointment Successfully Deleted!']);
	}

	/* Manage Prescription */

	public function getDoctorPrescription(){
        $prescription=Prescription::all();
        $doctor=Doctor::all();
        $patient=Patient::all();

		return view('doctor.prescription',['prescription'=>$prescription,'doctor'=>$doctor,'patient'=>$patient]);
	}

	public function postDoctorPrescription(Request $request){

		$this->validate($request,[
             'doctor'=>'required',
             'patient'=>'required',
             'case'=>'required',
             'medication'=>'required',
             'description'=>'required',
             'date'=>'required'
		]);

		$prescription=new Prescription();
		$prescription->doctor=$request['doctor'];
		$prescription->patient=$request['patient'];
		$prescription->medication=$request['medication'];
		$prescription->description=$request['description'];
		$prescription->date=$request['date'];
	    $prescription->save();


		return redirect()->route('doctor.prescription')->with(['success'=>'Prescription Successfully Recorded!']);
	}

	public function getDeletePrescription($prescription_id){
		$prescription_id=Prescription::find( $prescription_id );
		if(!$prescription_id)
		{
			return redirect()->route('doctor.prescription')->with(['fail'=>'Prescription not found!']);
		}
        

        $prescription_id->delete();

		return redirect()->route('doctor.prescription')->with(['success'=>'Prescription Successfully Deleted!']);
	}

	/* Bed Allotment */

	public function getDoctorBedAllotment(){
        $bedallotment=BedAllotment::all();
        $patient=Patient::all();
        $bed=Bed::orderBy('bed_number', 'DESC')->get();

		return view('doctor.bedallotment',['bedallotment'=>$bedallotment,'patient'=>$patient,'bed'=>$bed]);
	}

	public function postDoctorBedallotment(Request $request){

		$this->validate($request,[
             'patient'=>'required|unique:bed_allotments',
             'bed_number'=>'required',
             'allotment'=>'required',
             'discharge'=>'required'
		]);

		$bedallotment=new BedAllotment();
		$bedallotment->bed_number=$request['bed_number'];
		$bedallotment->patient=$request['patient'];
		$bedallotment->allotment=$request['allotment'];
		$bedallotment->discharge=$request['discharge'];
	    $bedallotment->save();


		return redirect()->route('doctor.bedallotment')->with(['success'=>'Bed Allotment Successfully Done!']);
	}

	public function getDeleteBedallotment($bedallotment_id){
		$bedallotment_id=BedAllotment::find( $bedallotment_id );
		if(!$bedallotment_id)
		{
			return redirect()->route('doctor.bedallotment')->with(['fail'=>'Bed Allotment not found!']);
		}
        

        $bedallotment_id->delete();

		return redirect()->route('doctor.bedallotment')->with(['success'=>'Bed Allotment Successfully Deleted!']);
	}

	/* Blood Bank */

	public function getDoctorBloodBank(){
        $bloodbank=BloodDonor::all();

		return view('doctor.bloodbank',['bloodbank'=>$bloodbank]);
	}

	public function postDoctorBloodBank(Request $request){

		$this->validate($request,[
             'name'=>'required',
             'age'=>'required',
             'sex'=>'required',
             'blood'=>'required',
             'date'=>'required',
		]);

		$bloodbank=new BloodDonor();
		$bloodbank->name=$request['name'];
		$bloodbank->age=$request['age'];
		$bloodbank->sex=$request['sex'];
		$bloodbank->blood=$request['blood'];
		$bloodbank->date=$request['date'];
	    $bloodbank->save();


		return redirect()->route('doctor.bloodbank')->with(['success'=>'Blood Donor Successfully Inserted!']);
	}

	public function getDeleteBloodBank($bloodbank_id){
		$bloodbank_id=BloodDonor::find( $bloodbank_id );
		if(!$bloodbank_id)
		{
			return redirect()->route('doctor.bloodbank')->with(['fail'=>'Blood Bank not found!']);
		}
        

        $bloodbank_id->delete();

		return redirect()->route('doctor.bloodbank')->with(['success'=>'Blood Bank Successfully Deleted!']);
	}

	/* Manage Report */

	public function getDoctorManageReport(){
        $doctor=Doctor::all();
        $patient=Patient::all();
        $operation=ManageReport::where('type','=','Operation')->get();
        $birth=ManageReport::where('type','=','Birth')->get();
        $death=ManageReport::where('type','=','Death')->get();
        $other=ManageReport::where('type','=','Other')->get();

	return view('doctor.managereport',['doctor'=>$doctor,'patient'=>$patient,'operation'=>$operation,'birth'=>$birth,'death'=>$death,'other'=>$other]);
	}

	public function postDoctorManageReport(Request $request){
		$this->validate($request,[
             'type'=>'required',
             'description'=>'required',
             'date'=>'required',
             'doctor'=>'required',
             'patient'=>'required',
		]);

		$report=new ManageReport();
		$report->type=$request['type'];
		$report->description=$request['description'];
		$report->date=$request['date'];
		$report->doctor=$request['doctor'];
		$report->patient=$request['patient'];
	    $report->save();

		return redirect()->route('doctor.managereport')->with(['success'=>'Report Successfully Inserted!']);
	}

	public function getDeleteManageReport($report_id){
		$report_id=ManageReport::find( $report_id );
		if(!$report_id)
		{
			return redirect()->route('doctor.managereport')->with(['fail'=>'Report not found!']);
		}
        
        $report_id->delete();

		return redirect()->route('doctor.managereport')->with(['success'=>'Report Successfully Deleted!']);
	}


	/* Doctor Profile */

	public function getDoctorProfile(){
		$email=Auth::user()->email;

		$profile=Doctor::where('email','=',$email)->first();
		
		return view('doctor.profile',['profile'=>$profile]);
	}

	public function postDoctorUpdateProfile(Request $request){
         $this->validate($request,[
             'name'=>'required',
             'email'=>'required|email',
             'address'=>'required',
             'phone'=>'required',
             'oldpass'=>'required'
		]);

         $check=0;
         //Who_logged::first()->email;

         $email=Auth::user()->email;
         $oldpass=Auth::user()->password;
        
         $profile=Doctor::where('email','=',$email)->first();

         if(Hash::check($request['oldpass'], $oldpass))
         {
	        if($request['newpass']!=''&&$request['conpass']!=''&&$request['newpass']==$request['conpass']){
	         $profile->password=bcrypt($request['newpass']);
	         $check=1;
	        }
         }
         else{
         	return redirect()->route('doctor.profile')->with(['fail'=>'Password is wrong!']);
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


         return redirect()->route('doctor.profile')->with(['success'=>'Profile Successfully Updated!']);
	}


}