@extends('layouts.admin-master')

@section('styles')
       <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
@endsection

@section('content')

      <ul class="tabs">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Patient List</label>
          <div class="tab-content">
            <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Patient Name</th>
                      <th>Age</th>
                      <th>Sex</th>
                      <th>Blood Group</th>
                      <th>Birth Date</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 @include('info-box')
                 @if(count($patient)==0)
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Patient</td>
                         </tr>
                     @endif
                  @foreach($patient as $patient)
                  <tr>
                   <td class="number">{{ $patient->id }}</td>
                   <td>{{ $patient->name }}</td>
                   <td>{{ $patient->age }}</td>
                   <td>{{ $patient->sex }}</td>
                   <td>{{ $patient->blood }}</td>
                   <td>{{ $patient->birth }}</td>
                   <td><a href="{{ route('delete.patient',['patient_id'=>$patient->id,'patient_email'=>$patient->email]) }}" class="danger">Delete</a></td>
                   </tr>
                  @endforeach
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2">+Add Patient</label>
          <div class="tab-content">
             <form action="{{ route('insert.patient') }}" method="post">
               <input type="text" name="name" placeholder="Patient Name" {{ $errors->has('name') ? 'class=has-error' : '' }}  value="{{ Request::old('name')}}" >
               <input type="text" name="email" placeholder="E-mail" {{ $errors->has('email') ? 'class=has-error' : '' }}  value="{{ Request::old('email')}}" >
               <input type="text" name="password" placeholder="Password" {{ $errors->has('password') ? 'class=has-error' : '' }}  value="{{ Request::old('password')}}" >
               <input type="text" name="address" placeholder="Address" {{ $errors->has('address') ? 'class=has-error' : '' }}  value="{{ Request::old('address')}}" >
               <input type="text" name="phone" placeholder="Phone" {{ $errors->has('phone') ? 'class=has-error' : '' }}  value="{{ Request::old('phone')}}" >
               <input type="text" id="sex" name="sex" placeholder="Sex" {{ $errors->has('sex') ? 'class=has-error' : '' }}  value="{{ Request::old('sex')}}" >
                    <select id="selectSex" onchange="getSelectedSex();">
                      <option>Select Sex</option>
                      <option>Male</option>
                      <option>Female</option>
                    </select>
               <input type="hidden" id="birth" name="birth">
               <p style="font-weight: bold;
                         color: indigo;">Date Of Birth:</p>
               <select id="selectDate" onchange="getSelectedBirth();">
                <option>Day</option>
                 @for($i=1;$i<=31;$i++)
                    <option>{{ $i }}</option>
                 @endfor
               </select>
               <select id="selectMonth" onchange="getSelectedBirth();">
                <option>Month</option>
                 @for($i=1;$i<=12;$i++)
                    <option>{{ $i }}</option>
                 @endfor
               </select>
               <select id="selectYear" onchange="getSelectedBirth();">
                 <option>Year</option>
                 @for($i=2017;$i>=1800;$i--)
                    <option>{{ $i }}</option>
                 @endfor
               </select>
               <input type="text" name="age" placeholder="Age" {{ $errors->has('age') ? 'class=has-error' : '' }}  value="{{ Request::old('age')}}" >
               <input type="text" id="blood" name="blood" placeholder="Blood Group" {{ $errors->has('blood') ? 'class=has-error' : '' }}  value="{{ Request::old('blood')}}" >
                    <select id="selectBlood" onchange="getSelectedBlood();">
                      <option>Select Blood</option>
                      <option>A+</option>
                      <option>A-</option>
                      <option>B+</option>
                      <option>B-</option>
                      <option>AB+</option>
                      <option>AB-</option>
                      <option>O+</option>
                      <option>O-</option>
                    </select>
               <div class="button-shadow">
                   <button type="submit" class="btn">Add Patient</button>
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

