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

class accountantController extends Controller{
    public function getLogout(){
        Auth::logout();
        return redirect()->route('home.index');
    }

    public function getAccountantDashboard(){
        return view('accountant.dashboard');
    }
}