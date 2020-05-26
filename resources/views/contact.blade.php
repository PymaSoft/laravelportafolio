@extends('layout')

@section('title', __('Contact'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-10 col-lg-6 mx-auto">
        <form class="bg-white shadow rounded py-3 px-4" 
          method="POST" 
          action="{{ route('message.store') }}"
        >
          @csrf

          <h1 class="display-4">{{ __('Contact') }}</h1>
          <hr>
          
          <div class="form-group">
            <label for="name">Nombre</label>
            <input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror" 
              id="name" name="name" type="text"
              placeholder="Nombre..." value="{{ old('name') }}">
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>  
              @enderror
          </div>
          <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror" 
              id="email" name="email" type="email" 
              placeholder="Correo electrónico" value="{{ old('email') }}">
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>  
              @enderror
          </div>
          <div class="form-group">
            <label for="subject">Asunto</label>
            <input class="form-control bg-light shadow-sm @error('subject') is-invalid @else border-0 @enderror" 
              id="subject" name="subject" type="text" 
              placeholder="Asunto del mensaje" value="{{ old('subject') }}">
              @error('subject')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>  
              @enderror
          </div>
      
          <div class="form-group">
            <label for="content">Contenido</label>
            <textarea class="form-control bg-light shadow-sm @error('content') is-invalid @else border-0 @enderror"
              name="content" id="content" placeholder="Contenido del mensaje"
            >{{ old('content') }}</textarea>
            @error('content')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>  
            @enderror
          </div>
      
          <button class="btn btn-primary btn-lg btn-block">{{ __('Send') }}</button>
        </form>
      </div>
    </div>
  </div>
@endsection