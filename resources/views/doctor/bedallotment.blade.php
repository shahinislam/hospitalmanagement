@extends('layouts.doctor-master')

@section('styles')
       <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
@endsection

@section('content')

      <ul class="tabs">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Bed Allotment List</label>
          <div class="tab-content">
            <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Bed Number</th>
                      <th>Patient</th>
                      <th>Allotment Date Time</th>
                      <th>Discharge Date Time</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 @include('info-box')
                 @if(count($bedallotment)==0)
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Bed Allotment</td>
                         </tr>
                     @endif
                  @foreach($bedallotment as $bedallotment)
                  <tr>
                   <td class="number">{{ $bedallotment->id }}</td>
                   <td>{{ $bedallotment->bed_number }}</td>
                   <td>{{ $bedallotment->patient }}</td>
                   <td>{{ $bedallotment->allotment }}</td>
                   <td>{{ $bedallotment->discharge }}</td>
                   <td><a href="{{ route('doctor.bedallotment.delete',['bedallotment_id'=>$bedallotment->id]) }}" class="danger">Delete</a></td>
                   </tr>
                  @endforeach
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2">+Add Bed Allotment</label>
          <div class="tab-content">
            <form action="{{ route('doctor.bedallotment.insert') }}" method="post">
               <input type="text" id="selectedBedNumber" placeholder="Bed Number" name="bed_number" {{ $errors->has('bed_number') ? 'class=has-error' : '' }}  value="{{ Request::old('bed_number') }}" >
               <select id="selectBedNumber"  onchange="getSelectedBedNumber();">
                   <option>Bed Number</option>
                 @foreach($bed as $bed)
                   <option>{{ $bed->bed_number }} - {{ $bed->bed_type }}</option>
                 @endforeach
               </select>

               <input type="text" id="selectedPatient" placeholder="Patient" name="patient" {{ $errors->has('patient') ? 'class=has-error' : '' }}  value="{{ Request::old('patient') }}" >
               <select id="selectPatient"  onchange="getSelectedPatient();">
                   <option>Patient Name</option>
                 @foreach($patient as $patient)
                   <option>{{ $patient->name }}</option>
                 @endforeach
               </select>

               <input type="text" placeholder="Allotment Time" name="allotment" {{ $errors->has('allotment') ? 'class=has-error' : '' }}  value="{{ Request::old('allotment') }}" >

               <input type="text" placeholder="Discharge Time" name="discharge" {{ $errors->has('discharge') ? 'class=has-error' : '' }}  value="{{ Request::old('discharge') }}" >

               <div class="button-shadow">
                   <button type="submit" class="btn">Add Bed Allotment</button>
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

