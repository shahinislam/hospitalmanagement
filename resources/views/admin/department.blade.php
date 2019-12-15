@extends('layouts.admin-master')

@section('styles')
       <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
@endsection

@section('content')

      <ul class="tabs">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Department List</label>
          <div class="tab-content">
            <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Department</th>
                      <th>Description</th>
                      <th>Option</th>
                   </tr>
               </thead>
               <tbody> 
                 @include('info-box')
                 @if(count($department)==0)
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Department</td>
                         </tr>
                     @endif
                 @foreach($department as $department)                 
                   <tr>
                      <td class="number">{{ $department->id }}</td>
                      <td style="color: indigo;">{{ $department->dept_name }}</td>
                      <td>{{ $department->dept_description }}</td>
                      <td><a href="{{ route('delete.department',['department_id'=>$department->id]) }}" class="danger">Delete</a></td>
                   </tr>
                 @endforeach
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2">+Add Department</label>
          <div class="tab-content">
             <form action="{{ route('insert.department') }}" method="post">
               <input type="text" name="dept_name" placeholder="Name"  {{ $errors->has('dept_name') ? 'class=has-error' : '' }}  value="{{ Request::old('dept_name')}}" >
               <textarea name="dept_description" placeholder="Description"  {{ $errors->has('dept_description') ? 'class=has-error' : '' }}  value="{{ Request::old('dept_description')}}" >{{ Request::old('dept_description')}}</textarea>
               <div class="button-shadow">
                   <button type="submit" class="btn">Add Department</button>
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

