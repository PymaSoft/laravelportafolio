@extends('layout')

@section('title', 'Inicio')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6">
        <h1 class="display-4 text-primary">Desarrollo Web</h1>
        <p class="lead text-secondary text-justify">
            Y, viéndole don Quijote de aquella manera, con muestras de tanta tristeza, le dijo: Sábete, Sancho, que no es un hombre más que otro si no hace más que otro.
            <br><br>
            Todas estas borrascas que nos suceden son señales de que presto ha de serenar el tiempo y han de sucedernos bien las cosas; porque no es posible que el mal ni el bien sean durables, y de aquí se sigue que, habiendo durado mucho el mal, el bien está ya cerca.
            <br><br>
            Así que, no debes congojarte por las desgracias que a mí me suceden, pues a ti no te cabe parte dellas.
            <br><br>
            Y, viéndole don Quijote de aquella manera, con muestras de tanta tristeza, le dijo: Sábete, Sancho, que no es un hombre más que otro si no hace más que otro.
            <br><br>
            Todas estas borrascas que nos suceden son señales de que presto ha de serenar el tiempo y han de sucedernos bien las cosas; porque no es posible que el mal ni el bien sean durables, y de aquí se sigue que, habiendo durado mucho el mal, el bien está ya cerca.
            <br><br>
            Así que, no debes congojarte por las desgracias que a mí me suceden, pues a ti no te cabe parte dellas.
            <br><br>
        </p>
        <a class="btn btn-lg btn-block btn-primary" href="{{ route('contact') }}">Contáctame</a>
        <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('projects.index') }}">Portafolio</a>
      </div>
      <div class="col-12 col-lg-6">
        <img class="img-fluid mb-4" src="/img/home.svg" alt="Desarrollo Web">
      </div>
    </div>
  </div>
@endsection