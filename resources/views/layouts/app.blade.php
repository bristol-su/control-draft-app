@extends(\Illuminate\Support\Facades\View::exists('bristolsu::base')?'bristolsu::base':'control::layouts.base')

@section('content')
    <div id="control-vue-root">
        @yield('control-content')
    </div>
@endsection


@push('scripts')
    <script>
        window.apiUrl = '{{config('app.api_url')}}';
    </script>
    <script src="{{ asset('control/js/control.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('control/css/control.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
@endpush
