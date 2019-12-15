@extends('layouts.admin-master')

@section('styles')
       <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
@endsection

@section('content')

      <ul class="tabs">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Accountant List</label>
          <div class="tab-content">
            <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Accountant Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 @include('info-box')
    
                     @if(count($accountant)==0)
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Accountant</td>
                         </tr>
                     @endif
                  @foreach($accountant as $accountant)
                  <tr>
                   <td class="number">{{ $accountant->id }}</td>
                   <td>{{ $accountant->name }}</td>
                   <td>{{ $accountant->email }}</td>
                   <td>{{ $accountant->address }}</td>
                   <td>{{ $accountant->phone }}</td>
                   <td><a href="{{ route('delete.accountant',['accountant_id'=>$accountant->id,'accountant_email'=>$accountant->email]) }}" class="danger">Delete</a></td>
                   </tr>
                  @endforeach
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2">+Add Accountant</label>
          <div class="tab-content">
             <form action="{{ route('insert.accountant') }}" method="post">
               <input type="text" name="name" placeholder="Accountant Name" {{ $errors->has('name') ? 'class=has-error' : '' }}  value="{{ Request::old('name')}}" >
               <input type="text" name="email" placeholder="E-mail" {{ $errors->has('email') ? 'class=has-error' : '' }}  value="{{ Request::old('email')}}" >
               <input type="text" name="password" placeholder="Password" {{ $errors->has('password') ? 'class=has-error' : '' }}  value="{{ Request::old('password')}}" >
               <input type="text" name="address" placeholder="Address" {{ $errors->has('address') ? 'class=has-error' : '' }}  value="{{ Request::old('address')}}" >
               <input type="text" name="phone" placeholder="Phone" {{ $errors->has('phone') ? 'class=has-error' : '' }}  value="{{ Request::old('phone')}}" >

               <div class="button-shadow">
                   <button type="submit" class="btn">Add Accountant</button>
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

