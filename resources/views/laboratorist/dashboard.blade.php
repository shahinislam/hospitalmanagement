@extends('layouts.laboratorist-master')

@section('styles')
       <link rel="stylesheet" type="text/css" href="{{ URL::to('css/dashboard.css') }}">
@endsection


@section('content')
     
       <div class="icon">    
       	  <a href=""><img src="{{ URL::asset("icon/admit.png") }}" width="40" height="40"><div>Add Diagnosis Report</div></a>
          <a href=""><img src="{{ URL::asset("icon/bloodbank.png") }}" width="40" height="40"><div>Manage Blood Bank</div></a>
          <a href=""><img src="{{ URL::asset("icon/patient.png") }}" width="40" height="40"><div>Manage Blood Donor</div></a>     	  
       </div>
@endsection


@section('scripts')
       <script type="text/javascript">
       	   var token="{{ Session::token() }}";
       </script>
       <script type="text/javascript" src="{{ URL::to('js/admin.js') }}"></script>
       
@endsection

