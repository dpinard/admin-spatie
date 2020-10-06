@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-body">
            <form method="POST" action="">
                @csrf
    
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                    
                    <div class="col-md-6">
                        <input name="title" id="title" type="text" class="form-control" value={{old('title')}}>
                    </div>
                </div>
    
    
                <div class="form-group row">
                    <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>
                    
                    <div class="col-md-6">
                        <textarea name="content" id="content" type="text" class="form-control" value={{old('content')}}></textarea>
                    </div>
                </div>
    
                
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send') }}
                        </button>
                    </div>
                </div>
    
            </form>
        </div>
    </div>
@endsection