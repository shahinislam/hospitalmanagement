@extends('layouts.doctor-master')

@section('styles')
       <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
@endsection

@section('content')

      <ul class="tabs">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Appointment List</label>
          <div class="tab-content">
            <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Date</th>
                      <th>Patient</th>
                      <th>Doctor</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody>
                 @include('info-box')
                 @if(count($appointment)==0)
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Appointment</td>
                         </tr>
                  @endif
                  @foreach($appointment as $appointment)
                  <tr>
                   <td class="number">{{ $appointment->id }}</td>
                   <td>{{ $appointment->date }}</td>
                   <td>{{ $appointment->patient }}</td>
                   <td>{{ $appointment->doctor }}</td>
                   <td><a href="{{route('doctor.appointment.delete',['appointment_id'=>$appointment->id]) }}" class="danger">Delete</a></td>
                   </tr>
                  @endforeach
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2">+Add Appointment</label>
          <div class="tab-content">
             <form action="{{ route('doctor.appointment.insert') }}" method="post">
                 <input type="text" name="doctor" {{ $errors->has('doctor') ? 'class=has-error' : '' }}  value="{{ Request::old('doctor') ? Request::old('doctor') : isset($doctor) ? $doctor->name : '' }}" >

                 <input type="text" placeholder="Patient Name" id="selectedPatient" name="patient" {{ $errors->has('patient') ? 'class=has-error' : '' }}>
                 <select id="selectPatient" onchange="getSelectedPatient();">
                    <option>Patient Name</option>
                    @foreach($patient as $patient)
                        <option>{{ $patient->name }}</option>
                    @endforeach
                 </select>

                 <input type="text" placeholder="Date" name="date" {{ $errors->has('doctor') ? 'class=has-error' : '' }}>

                 <div class="button-shadow">
                   <button type="submit" class="btn">Add Appointment</button>
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

