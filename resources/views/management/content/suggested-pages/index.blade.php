@extends('layouts.admin')

@section('content')
<div class="  grow">

    <h1 class="text-2xl font-bold mb-4 text-right">صفحات پیشنهادی</h1>
    <div class=" p-4">
        <x-suggested-pages.partials :menus="$menus"/>
    </div>

</div>

                                            
@endsection



