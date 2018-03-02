@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-xs-12 col-md-offset-2" id="app">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                        <br>
                    <upload-form :user="{{ auth()->user()}}"></upload-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
