@extends('layouts.doctor-master')

@section('styles')
       <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
@endsection

@section('content')

      <ul class="tabs">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Blood Donor List</label>
          <div class="tab-content">
            <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Name</th>
                      <th>Age</th>
                      <th>Sex</th>
                      <th>Blood Group</th>
                      <th>Last Donation Date</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 @include('info-box')
                     @if(count($bloodbank)==0)
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Blood Donor</td>
                         </tr>
                     @endif
                  @foreach($bloodbank as $bloodbank)
                  <tr>
                   <td class="number">{{ $bloodbank->id }}</td>
                   <td>{{ $bloodbank->name }}</td>
                   <td>{{ $bloodbank->age }}</td>
                   <td>{{ $bloodbank->sex }}</td>
                   <td>{{ $bloodbank->blood }}</td>
                   <td>{{ $bloodbank->date }}</td>
                   <td><a href="{{ route('doctor.bloodbank.delete',['bloodbank_id'=>$bloodbank->id]) }}" class="danger">Delete</a></td>
                   </tr>
                  @endforeach
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2">Blood Bank</label>
          <div class="tab-content">
            <form action="{{ route('doctor.bloodbank.insert') }}" method="post">
               <input type="text"  placeholder="Donor Name" name="name" {{ $errors->has('name') ? 'class=has-error' : '' }}  value="{{ Request::old('name') }}" >

               <input type="text"  placeholder="Age" name="age" {{ $errors->has('age') ? 'class=has-error' : '' }}  value="{{ Request::old('age') }}" >

               <input type="text"  id="sex" placeholder="Sex" name="sex" {{ $errors->has('sex') ? 'class=has-error' : '' }}  value="{{ Request::old('sex') }}" >

               <select id="selectSex" onchange="getSelectedSex();">
                      <option>Select Sex</option>
                      <option>Male</option>
                      <option>Female</option>
                </select>

               <input type="text" id="blood" placeholder="Blood Group" name="blood" {{ $errors->has('blood') ? 'class=has-error' : '' }}  value="{{ Request::old('blood') }}" >

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

               <input type="text"  placeholder="Last Donation Date" name="date" {{ $errors->has('date') ? 'class=has-error' : '' }}  value="{{ Request::old('date') }}" >

               <div class="button-shadow">
                   <button type="submit" class="btn">Add Blood Bank</button>
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

