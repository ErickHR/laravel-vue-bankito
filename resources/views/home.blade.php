@extends('layouts.app')

@section('content')
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    {{-- <example-component></example-component> --}}
    <router-view></router-view>
    
    {{-- <app-menu/> --}}
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    {{-- <example-component></example-component> --}}
                    {{-- <router-view></router-view> --}}
                    
                    {{-- <app-menu/> --}}
                {{-- </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
