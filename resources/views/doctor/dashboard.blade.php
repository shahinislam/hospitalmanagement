@extends('layouts.doctor-master')

@section('styles')
       <link rel="stylesheet" type="text/css" href="{{ URL::to('css/dashboard.css') }}">
@endsection


@section('content')
     
    <div class="icon">
       	  
	  <a href="{{ route('doctor.patient') }}"><img src="{{ URL::asset("icon/patient.png") }}" width="40" height="40"><div>Patient</div></a>
	  <a href="{{ route('doctor.appointment') }}"><img src="{{ URL::asset("icon/appointment.png") }}" width="40" height="40"><div>Appointment</div></a>
         <a href="{{ route('doctor.prescription') }}"><img src="{{ URL::asset("icon/pharmacist.png") }}" width="40" height="40"><div>Prescription</div></a>
         <a href="{{ route('doctor.bloodbank') }}"><img src="{{ URL::asset("icon/bloodbank.png") }}" width="40" height="40"><div>Blood Bank</div></a>
	  <a href="{{ route('doctor.bedallotment') }}"><img src="{{ URL::asset("icon/bed.png") }}" width="40" height="40"><div>Bed Allotment</div></a>
         <a href="{{ route('doctor.managereport') }}"><img src="{{ URL::asset("icon/death.png") }}" width="40" height="40"><div>Manage Report</div></a>
       	
    </div>
@endsection


@section('scripts')
       <script type="text/javascript">
       	   var token="{{ Session::token() }}";
       </script>
       <script type="text/javascript" src="{{ URL::to('js/admin.js') }}"></script>
       
@endsection

