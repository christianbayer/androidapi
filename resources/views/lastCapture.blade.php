@extends('layouts.app')

@section('content')
    <img src="{{ URL::asset($data['location']) }}" alt="">
@endsection