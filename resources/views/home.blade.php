@extends('layouts.index')

@section('content')
    <div>{{ $data }}11</div>
@endsection

@section('script')
    <script type="module">
        import useData from "{{ asset('module/1.js') }}";
        console.log(useData)
    </script>
@endsection