@extends('layout')

@section('title', __('About'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6">
        <img class="img-fluid mb-4" src="/img/about.svg" alt="Quién soy">
      </div>
      <div class="col-12 col-lg-6">
        <h1 class="display-4 text-primary">{{ __('About') }}</h1>
        <p class="lead text-secondary text-justify">
            Muy lejos, más allá de las montañas de palabras, alejados de los países de las vocales y las consonantes, viven los textos simulados.
            <br><br>

            Viven aislados en casas de letras, en la costa de la semántica, un gran océano de lenguas. Un riachuelo llamado Pons fluye por su pueblo y los abastece con las normas necesarias.
            
            Hablamos de un país paraisomático en el que a uno le caen pedazos de frases asadas en la boca.
            <br><br>
            
            Ni siquiera los todopoderosos signos de puntuación dominan a los textos simulados; una vida, se puede decir, poco ortográfica.
            
            Pero un buen día, una pequeña línea de texto simulado, llamada Lorem Ipsum, decidió aventurarse y salir al vasto mundo de la gramática.
            <br><br>
            El gran Oxmox le desanconsejó hacerlo, ya que esas tierras estaban llenas de comas malvadas, signos de interrogación salvajes y puntos y coma traicioneros, pero el texto simulado no se dejó atemorizar. Empacó sus siete versales, enfundó su inicial en el cinturón y se puso en camino.
        </p>
        <a class="btn btn-lg btn-block btn-primary" href="{{ route('contact') }}">Contáctame</a>
        <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('projects.index') }}">Portafolio</a>
      </div>
    </div>
  </div>
@endsection