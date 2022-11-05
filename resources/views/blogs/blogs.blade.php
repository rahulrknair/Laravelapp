@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Blogs') }}
                    <a class="navbar-brand" href="{{ url('/addblog') }}" style="float:right">
                    {{ __('Add New') }}
                    </a>
                </div>
                <div class="card-body">
                    <table border="1">
                    <tr>
                        <td>ID</td>
                        <td>Title</td>
                        <td>Author</td>
                        <td>Description</td>
                    </tr>
                    @foreach($blogs as $blog)
                    <tr>
                        <td>{{$blog->id}}</td>
                        <td>{{$blog->title}}</td>
                        <td>{{$blog->author}}</td>
                        <td>{{$blog->description}}</td>
                    </tr>
                    @endforeach
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
