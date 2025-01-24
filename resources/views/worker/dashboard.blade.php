@extends('layouts.worker')

@section('content')
<div>
    {{auth()->user()->email}}
    

        @foreach (auth()->user()->roles as $role)
            <p>{{$role->name}}</p>
        @endforeach
    
</div>
                                            
@endsection