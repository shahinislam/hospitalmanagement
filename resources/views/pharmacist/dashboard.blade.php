@extends('layouts.pharmacist-master')

@section('styles')
       <link rel="stylesheet" type="text/css" href="{{ URL::to('css/dashboard.css') }}">
@endsection


@section('content')
     
       <div class="icon">    
       	  
       	  <a href=""><img src="{{ URL::asset("icon/prescription.png") }}" width="40" height="40"><div>Manage Medicine</div></a>
          <a href=""><img src="{{ URL::asset("icon/medicine.png") }}" width="40" height="40"><div>Medicine Category</div></a>
          <a href=""><img src="{{ URL::asset("icon/icon.png") }}" width="40" height="40"><div>Provide Medication</div></a>     	  
       </div>
@endsection


@section('scripts')
       <script type="text/javascript">
       	   var token="{{ Session::token() }}";
       </script>
       <script type="text/javascript" src="{{ URL::to('js/admin.js') }}"></script>
       
@endsection

