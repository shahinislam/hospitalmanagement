@extends('layouts.doctor-master')

@section('styles')
       <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
@endsection

@section('content')

      <ul class="tabs" id="managereport">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Operation</label>
          <div class="tab-content">
               <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Patient</th>
                      <th>Doctor</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 @include('info-box')
                     @if(count($operation)==0)
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Operation</td>
                         </tr>
                     @endif
                  @foreach($operation as $operation)
                  <tr>
                   <td class="number">{{ $operation->id }}</td>
                   <td>{{ $operation->description }}</td>
                   <td>{{ $operation->date }}</td>
                   <td>{{ $operation->patient }}</td>
                   <td>{{ $operation->doctor }}</td>
                   <td><a href="{{ route('doctor.report.delete',['report_id'=>$operation->id]) }}" class="danger">Delete</a></td>
                   </tr>
                  @endforeach
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2">Birth</label>
          <div class="tab-content">
               <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Patient</th>
                      <th>Doctor</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 @include('info-box')
                     @if(count($birth)==0)
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Birth Report</td>
                         </tr>
                     @endif
                  @foreach($birth as $birth)
                  <tr>
                   <td class="number">{{ $birth->id }}</td>
                   <td>{{ $birth->description }}</td>
                   <td>{{ $birth->date }}</td>
                   <td>{{ $birth->patient }}</td>
                   <td>{{ $birth->doctor }}</td>
                   <td><a href="{{ route('doctor.report.delete',['report_id'=>$birth->id]) }}" class="danger">Delete</a></td>
                   </tr>
                  @endforeach
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-3">
          <label for="tab-3">Death</label>
          <div class="tab-content">
            <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Patient</th>
                      <th>Doctor</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 @include('info-box')
                     @if(count($death)==0)
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Death Report</td>
                         </tr>
                     @endif
                  @foreach($death as $death)
                  <tr>
                   <td class="number">{{ $death->id }}</td>
                   <td>{{ $death->description }}</td>
                   <td>{{ $death->date }}</td>
                   <td>{{ $death->patient }}</td>
                   <td>{{ $death->doctor }}</td>
                   <td><a href="{{ route('doctor.report.delete',['report_id'=>$death->id]) }}" class="danger">Delete</a></td>
                   </tr>
                  @endforeach
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-4">
          <label for="tab-4">Other</label>
          <div class="tab-content">
              <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Patient</th>
                      <th>Doctor</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 @include('info-box')
                     @if(count($other)==0)
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Other Report</td>
                         </tr>
                     @endif
                  @foreach($other as $other)
                  <tr>
                   <td class="number">{{ $other->id }}</td>
                   <td>{{ $other->description }}</td>
                   <td>{{ $other->date }}</td>
                   <td>{{ $other->patient }}</td>
                   <td>{{ $other->doctor }}</td>
                   <td><a href="{{ route('doctor.report.delete',['report_id'=>$other->id]) }}" class="danger">Delete</a></td>
                   </tr>
                  @endforeach
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-5">
          <label for="tab-5">+Add Report</label>
          <div class="tab-content">
              <form action="{{ route('doctor.report.insert') }}" method="post">
                  <input id="selectedManageReport" type="text" name="type" placeholder="Manage Type" {{ $errors->has('type') ? 'class=has-error' : '' }}  value="{{ Request::old('type')}}" >
                  <select id="selectManageReport" onchange="getSelectedManageReport();">
                        <option>Select Type</option>
                        <option>Operation</option>
                        <option>Birth</option>
                        <option>Death</option>
                        <option>Other</option>
                  </select>
                  <input type="text" name="description" placeholder="Description" {{ $errors->has('description') ? 'class=has-error' : '' }}  value="{{ Request::old('description')}}" >

                  <input type="text" name="date" placeholder="Date" {{ $errors->has('date') ? 'class=has-error' : '' }}  value="{{ Request::old('date')}}" >

                  <input type="text" placeholder="Doctor Name" id="selectedDoctor" name="doctor" {{ $errors->has('doctor') ? 'class=has-error' : '' }}>
                 <select id="selectDoctor" onchange="getSelectedDoctor();">
                    <option>Doctor Name</option>
                    
                    @foreach($doctor as $doctor)
                        <option>{{ $doctor->name }}</option>
                    @endforeach
                 </select>

                 <input type="text" placeholder="Patient Name" id="selectedPatient" name="patient" {{ $errors->has('patient') ? 'class=has-error' : '' }}>
                 <select id="selectPatient" onchange="getSelectedPatient();">
                    <option>Patient Name</option>
                    @foreach($patient as $patient)
                        <option>{{ $patient->name }}</option>
                    @endforeach
                 </select>

                 <div class="button-shadow">
                   <button type="submit" class="btn">Add Report</button>
               </div>
               <input type="hidden" name="_token" value="{{ Session::token() }}">

              </form>
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

