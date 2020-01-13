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
@endpush
