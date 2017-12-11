@extends('layouts.app')
@section('content')
    <div class="container">
        
   
        @if($cart_deleted != NULL)
        <h2>Courses you can't register because of coincident</h2>
        @foreach($cart_deleted as $delete_item)
            {
            <td><h5>{!!$delete_item->course->title!!}</h5></td><br/>
            }
        @endforeach
        @endif
         @if($cart != NULL)
        <h2>Registered Courses: </h2>
        @foreach($cart as $data_item)
            {
            <td>{!!$data_item->course->title!!}</td><br/>
            }
        @endforeach
    @elseif($cart == NULL)
        <h2> You have no course in registration! </h2>
    @endif
   
    </div>
@endsection