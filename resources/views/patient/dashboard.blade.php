@extends('layouts.patient-master')

@section('styles')
       <link rel="stylesheet" type="text/css" href="{{ URL::to('css/dashboard.css') }}">
@endsection


@section('content')
     
       <div class="icon">
                <a href=""><img src="{{ URL::asset("icon/appointment.png") }}" width="40" height="40"><div>Appointment</div></a>
                <a href=""><img src="{{ URL::asset("icon/prescription.png") }}" width="40" height="40"><div>Prescription</div></a>
       	  <a href="{{ route('admin.doctor') }}"><img src="{{ URL::asset("icon/doctor.png") }}" width="40" height="40" ><div>Doctor</div></a>
                <a href=""><img src="{{ URL::asset("icon/bloodbank.png") }}" width="40" height="40"><div>Blood Bank</div></a>
       	  <a href="{{ route('admin.patient') }}"><img src="{{ URL::asset("icon/patient.png") }}" width="40" height="40"><div>Patient</div></a>
       	  <a href="{{ route('admin.pharmacist') }}"><img src="{{ URL::asset("icon/pharmacist.png") }}" width="40" height="40"><div>Pharmacist</div></a>
       	  <a href="{{ route('admin.laboratorist') }}"><img src="{{ URL::asset("icon/laboratorist.png") }}" width="40" height="40"><div>Laboratorist</div></a>
       	  <a href="{{ route('admin.accountant') }}"><img src="{{ URL::asset("icon/accountant.png") }}" width="40" height="40"><div>Accountant</div></a>
                <a href=""><img src="{{ URL::asset("icon/admit.png") }}" width="40" height="40"><div>Admit History</div></a>
                <a href=""><img src="{{ URL::asset("icon/operation.png") }}" width="40" height="40"><div>Operation</div></a>
                <a href=""><img src="{{ URL::asset("icon/invoice.png") }}" width="40" height="40"><div>Invoice</div></a>
       	  <a href=""><img src="{{ URL::asset("icon/payment.png") }}" width="40" height="40"><div>Payment</div></a>
       	  
       	  
       	  
       	  
       	  
       </div>
@endsection


@section('scripts')
       <script type="text/javascript">
       	   var token="{{ Session::token() }}";
       </script>
       <script type="text/javascript" src="{{ URL::to('js/admin.js') }}"></script>
       
@endsection

