@extends('back.layouts.master', [
    'title' => 'Appointment'
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('back/vendor/full-calendar/css/fullcalendar.css') }}">
    <link rel="stylesheet" href="{{ asset('back/vendor/full-calendar/css/fullcalendar.print.css') }}" media="print">
@endpush

@push('scripts')
    <script src="{{ asset('back/vendor/full-calendar/js/moment.min.js') }}"></script>
    <script src="{{ asset('back/vendor/full-calendar/js/fullcalendar.js') }}"></script>
    <script src="{{ asset('back/vendor/full-calendar/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('back/vendor/full-calendar/js/calendar.js') }}"></script>
@endpush

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div id='calendar1'></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div id='wrap'>
                        <div id='external-events'>
                            <h4>Draggable Events</h4>
                            <div class='fc-event'>My Event 1</div>
                            <div class='fc-event bg-secondary border-secondary'>My Event 2</div>
                            <div class='fc-event bg-brand border-brand'>My Event 3</div>
                            <div class='fc-event bg-info border-info'>My Event 4</div>
                            <div class='fc-event bg-success border-success'>My Event 5</div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id='drop-remove'>
                                <label class="custom-control-label" for="drop-remove">Remove after drop</label>
                            </div>
                        </div>
                        <div id='calendar2'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection