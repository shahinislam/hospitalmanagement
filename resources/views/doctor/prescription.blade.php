@extends('layouts.doctor-master')

@section('styles')
       <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
@endsection

@section('content')

      <ul class="tabs">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Prescription List</label>
          <div class="tab-content">
            <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Date</th>
                      <th>Patient</th>
                      <th>Doctor</th>
                      <th>Medication</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 @include('info-box')
                 @if(count($prescription)==0)
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Prescription</td>
                         </tr>
                  @endif
                  @foreach($prescription as $prescription)
                  <tr>
                   <td class="number">{{ $prescription->id }}</td>
                   <td>{{ $prescription->date }}</td>
                   <td>{{ $prescription->patient }}</td>
                   <td>{{ $prescription->doctor }}</td>
                   <td>{{ $prescription->medication }}</td>
                   <td><a href="{{ route('doctor.prescription.delete',['prescription_id'=>$prescription->id]) }}" class="danger">Delete</a></td>
                   </tr>
                  @endforeach
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2">+Add Prescription</label>
          <div class="tab-content">
            <form action="{{ route('doctor.prescription.insert') }}" method="post">
               <input type="text" id="selectedDoctor" placeholder="Doctor" name="doctor" {{ $errors->has('doctor') ? 'class=has-error' : '' }}  value="{{ Request::old('doctor') }}" >
               <select id="selectDoctor"  onchange="getSelectedDoctor();">
                   <option>Name Of Doctor</option>
                 @foreach($doctor as $doctor)
                   <option>{{ $doctor->name }}</option>
                 @endforeach
               </select>

               <input type="text" id="selectedPatient" placeholder="Patient" name="patient" {{ $errors->has('patient') ? 'class=has-error' : '' }}  value="{{ Request::old('patient') }}" >
               <select id="selectPatient"  onchange="getSelectedPatient();">
                   <option>Patient Name</option>
                 @foreach($patient as $patient)
                   <option>{{ $patient->name }}</option>
                 @endforeach
               </select>

               <textarea  placeholder="Case History" name="case" {{ $errors->has('case') ? 'class=has-error' : '' }}>{{ Request::old('case') }}</textarea>

              <textarea  placeholder="Medication" name="medication" {{ $errors->has('medication') ? 'class=has-error' : '' }}>{{ Request::old('medication') }}</textarea>

               <textarea  placeholder="Description" name="description" {{ $errors->has('description') ? 'class=has-error' : '' }}>{{ Request::old('description') }}</textarea>

               <input type="text" placeholder="Date" name="date" {{ $errors->has('date') ? 'class=has-error' : '' }}  value="{{ Request::old('date') }}" >

               <div class="button-shadow">
                   <button type="submit" class="btn">Add Prescription</button>
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

