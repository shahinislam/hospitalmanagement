@extends('layouts.admin-master')

@section('styles')
       <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
@endsection

@section('content')

      <ul class="tabs">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Doctor List</label>
          <div class="tab-content">
            <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Doctor Name</th>
                      <th>Department</th>
                      <th>Option</th>
                   </tr>
               </thead>
               <tbody> 
                 @include('info-box')
                 @if(count($doctor)==0)
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Doctor</td>
                         </tr>
                     @endif
                 @foreach($doctor as $doctor)                 
                   <tr>
                      <td class="number">{{ $doctor->id }}</td>
                      <td style="color: indigo;">{{ $doctor->name }}</td>
                      <td>{{ $doctor->department }}</td>
                      <td><a href="{{ route('delete.doctor',['doctor_id'=>$doctor->id,'doctor_email'=>$doctor->email]) }}" class="danger">Delete</a></td>
                   </tr>
                 @endforeach
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2">+Add Doctor</label>
          <div class="tab-content">
             <form action="{{ route('insert.doctor') }}" method="post">
               <input type="text" name="name" placeholder="Name"  {{ $errors->has('name') ? 'class=has-error' : '' }}  value="{{ Request::old('name')}}" >
               <input type="text" name="email" placeholder="E-mail"  {{ $errors->has('email') ? 'class=has-error' : '' }}  value="{{ Request::old('email')}}" >
               <input type="text" name="password" placeholder="Password"  {{ $errors->has('password') ? 'class=has-error' : '' }}  value="{{ Request::old('password')}}" >
               <input type="text" name="address" placeholder="Address"  {{ $errors->has('address') ? 'class=has-error' : '' }}  value="{{ Request::old('address')}}" >
               <input type="text" name="phone" placeholder="Phone"  {{ $errors->has('phone') ? 'class=has-error' : '' }}  value="{{ Request::old('phone')}}" >
               <input type="text" id="selectedDept" name="department" placeholder="Department"  {{ $errors->has('department') ? 'class=has-error' : '' }}  value="{{ Request::old('department')}}" >
               <select class="sel" id="selectDept" onchange="getSelectedDept();">
                 <option>Select</option>
                 @foreach($department as $department)
                     <option>{{ $department->dept_name }}</option>
                 @endforeach
               </select>
               <input type="text" name="profile" placeholder="Profile"  {{ $errors->has('profile') ? 'class=has-error' : '' }}  value="{{ Request::old('profile')}}" >
               <div class="button-shadow">
                   <button type="submit" class="btn">Add Doctor</button>
               </div>
               <input type="hidden" name="_token" value="{{ Session::token() }}">
             </form>
          </div>
        </li>
        <li>
           <input type="radio" name="tabs" id="tab-3">
           <label for="tab-3"></label>
        </li>
      </ul>
     
@endsection


@section('scripts')
       <script type="text/javascript">
           var token="{{ Session::token() }}";
       </script>
       <script type="text/javascript" src="{{ URL::to('js/admin.js') }}"></script>
@endsection

