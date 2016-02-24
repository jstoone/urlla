@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create new URL</div>

                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('url.store') }}" method="POST">
                        {{ csrf_field() }}
                        
                        @include('url.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
