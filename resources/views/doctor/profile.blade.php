@extends('layouts.doctor-master')

@section('styles')
       <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
@endsection

@section('content')

      <ul class="tabs">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Manage Profile</label>
          <div class="tab-content">
             @include('info-box')
 
               <form action="{{ route('doctor.update.profile') }}" method="post">
               <input type="text" name="name" {{ $errors->has('name') ? 'class=has-error' : '' }}  value="{{ Request::old('name') ? Request::old('name') : isset($profile) ? $profile->name : '' }}" >
               <input type="text" name="email"  {{ $errors->has('email') ? 'class=has-error' : '' }}  value="{{ Request::old('email') ? Request::old('email') : isset($profile) ? $profile->email : '' }}" >
               <input type="password" placeholder="Old Password" name="oldpass" {{ $errors->has('oldpass') ? 'class=has-error' : '' }}  value="{{ Request::old('oldpass') }}" >
             
               <input type="password" placeholder="New Password" name="newpass" {{ $errors->has('newpass') ? 'class=has-error' : '' }}  value="{{ Request::old('newpass') }}" >
              
               <input type="password" placeholder="Confirm Password" name="conpass" {{ $errors->has('conpass') ? 'class=has-error' : '' }}  value="{{ Request::old('conpass') }}" >

               <input type="text" name="address"  {{ $errors->has('address') ? 'class=has-error' : '' }}  value="{{ Request::old('address') ? Request::old('address') : isset($profile) ? $profile->address : '' }}" >
               <input type="text" name="phone" {{ $errors->has('phone') ? 'class=has-error' : '' }}  value="{{ Request::old('phone') ? Request::old('phone') : isset($profile) ? $profile->phone : '' }}" >
               <div class="button-shadow">
                   <button type="submit" class="btn">Update Profile</button>
               </div>
               <input type="hidden" name="_token" value="{{ Session::token() }}">
             </form>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2"></label>
          <div class="tab-content">

          </div>
        </li>
        <li>
           <input type="radio" name="tabs" id="tab-3">
           <label for="tab-3"></label>
           <div class="tab-content">
            
          </div>
        </li>
      </ul>
     
@endsection


@section('scripts')
       <script type="text/javascript">
           var token="{{ Session::token() }}";
       </script>
       <script type="text/javascript" src="{{ URL::to('js/admin.js') }}"></script>
@endsection

