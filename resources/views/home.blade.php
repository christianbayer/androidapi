@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">My Trackers</div>
                    <div class="panel-body">
                        @foreach($data['trackers'] as $tracker)
                            <div class="panel panel-default">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                    <div class="panel-heading" style="background-color: #fafafa">
                                        {{ $tracker->name }}
                                    </div>
                                </a>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <a href="{{ route('user.tracker.trace', [1,1]) }}"
                                           style="display: block;">See trace</a>
                                        <a href="{{ route('user.tracker.lastCapture', [1,1]) }}"
                                           style="display: block;">See last capture</a>
                                        <a href="{{ route('user.tracker.lastCoordinate', [1,1]) }}"
                                           style="display: block;">See last coordinate</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
