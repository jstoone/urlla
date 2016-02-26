@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="row">
        <h1>All your URL's</h1>
        <a class="btn btn-success btn-xs" href="{{ route('url.create') }}">Create new short URL</a>
        
        <hr>
    </div>

    <div class="row">
        <table class="table talbe-striped col-md-12">
            <colgroup>
                <col width="70%">
                <col width="15%">
                <col width="15%">
            </colgroup>
            <thead>
                <tr>
                    <th>
                        Destination
                    </th>
                    <th>
                        Short URL
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>
            @foreach($urls as $url)
            <tr>
                <td>
                    <a href="{{ $url->destination }}">
                        {{ $url->destination }}
                    </a>
                </td>
                <td>
                    <a href="{{ url($url->shortcode) }}">
                        {{ url($url->shortcode) }}
                    </a>
                </td>
                <td>
                    <a class="btn btn-xs btn-info" href="{{ url($url->shortcode) }}">
                        Test URL
                    </a>
                    <a class="btn btn-xs btn-warning" href="{{ route('url.edit', $url) }}">
                        Edit
                    </a>
                    <a class="btn btn-xs btn-danger js-resource-delete" href="">
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
