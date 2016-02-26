@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit URL</div>

                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('url.update', $url) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        
                        @include('url.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
