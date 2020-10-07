@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }} 
                <a href="{{url('/post/create')}}" class="btn btn-primary"> New Post </a>
                </div>
            </div>
            @if ($posts ?? '')
                <table class='table'>
                    <thead>
                        <th>id</th>
                        <th>title</th>
                        <th>content</th>
                        <th>modifier</th>
                        <th>supprimer</th>
                    </thead>
                    <tbody>
                        @foreach ($posts as $item)
                            <td> {{$item->id}} </td>
                            <td> {{$item->title}} </td>
                            <td> {{$item->content}} </td>
                            <td> <a href="{{url('post/update').'/'.$item->id}}" class="btn btn-primary">?</a> </td>
                            <td> <a href="{{url('post/delete').'/'.$item->id}}" class="btn btn-primary">X</a> </td>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>
</div>
@endsection
