@extends('layouts.accountant-master')

@section('styles')
       <link rel="stylesheet" type="text/css" href="{{ URL::to('css/dashboard.css') }}">
@endsection


@section('content')
     
       <div class="icon">    
       	  <a href=""><img src="{{ URL::asset("icon/invoice.png") }}" width="40" height="40"><div>Take Payment</div></a>
          <a href=""><img src="{{ URL::asset("icon/payment.png") }}" width="40" height="40"><div>View Payment</div></a>    	  
       </div>
@endsection


@section('scripts')
       <script type="text/javascript">
       	   var token="{{ Session::token() }}";
       </script>
       <script type="text/javascript" src="{{ URL::to('js/admin.js') }}"></script>
       
@endsection

