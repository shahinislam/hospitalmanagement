@extends('layouts.admin-master')

@section('styles')
       <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
@endsection

@section('content')

      <ul class="tabs">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Noticeboard List</label>
          <div class="tab-content">
            <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Title</th>
                      <th>Notice</th>
                      <th>Date</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 @include('info-box')
                 @if(count($notice)==0)
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Notice</td>
                         </tr>
                     @endif
                  @foreach($notice as $notice)
                  <tr>
                   <td class="number">{{ $notice->id }}</td>
                   <td>{{ $notice->title }}</td>
                   <td>{{ $notice->notice }}</td>
                   <td>{{ $notice->date }}</td>
                   <td><a href="{{ route('delete.notice',['notice_id'=>$notice->id]) }}" class="danger">Delete</a></td>
                   </tr>
                  @endforeach
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2">+Add Noticeboard</label>
          <div class="tab-content">
             <form action="{{ route('insert.notice') }}" method="post">
               <input type="text" name="title" placeholder="Title" {{ $errors->has('title') ? 'class=has-error' : '' }}  value="{{ Request::old('title')}}" >
               <textarea name="notice" placeholder="Notice" {{ $errors->has('notice') ? 'class=has-error' : '' }}>{{ Request::old('notice') }}</textarea>
               <input type="text" name="date" placeholder="date" {{ $errors->has('password') ? 'class=has-error' : '' }}  value="{{ Request::old('date')}}" >

               <div class="button-shadow">
                   <button type="submit" class="btn">Add Noticeboard</button>
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

