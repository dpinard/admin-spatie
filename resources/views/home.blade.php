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
                @foreach ($posts as $item)
                    <li>
                            {{$item->title}}
                    </li>
                
                @endforeach
            @endif
        </div>

    </div>
</div>
@endsection
