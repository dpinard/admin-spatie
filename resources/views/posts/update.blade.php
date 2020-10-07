@extends('layouts.app')

@section('content')
<div class="container">
    update post
        <div class="card-body">
            <form method="POST" action="{{url('/post/update/'.$post->id)}}">
                @csrf
    
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                    
                    <div class="col-md-6">
                        <input name="title" id="title" type="text" class="form-control" value={{$post->title ?? ''}}>
                    </div>
                </div>
    
    
                <div class="form-group row">
                    <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>
                    
                    <div class="col-md-6">
                        <textarea name="content" id="content" type="text" class="form-control">{{$post->content ?? ''}}</textarea>
                    </div>
                </div>
    
                <input type="hidden" name="id" value={{$post->id ?? ''}}/>
                
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Send
                        </button>
                    </div>
                </div>
    
            </form>
        </div>
    </div>

@endsection