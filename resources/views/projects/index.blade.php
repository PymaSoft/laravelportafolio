@extends('layout')

@section('title', 'Proyecto')

@section('content')
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      @isset($category)
        <div>
          <h1 class="display-4 mb-0">{{ $category->name }}</h1>
          <a href="{{ route('projects.index') }}">Regresar al portafolio</a>
        </div>
      @else
        <h1 class="display-4 mb-0">@lang('Projects')</h1>
      @endisset

      {{-- @auth
        <a class="btn btn-primary" href="{{ route('projects.create') }}">Crear proyecto</a>
      @endauth --}}

      {{-- @can('create-projects') --}}
      {{-- @can('create', new App\Project) --}}
      @can('create', $newProject)
        <a class="btn btn-primary" href="{{ route('projects.create') }}">
          Crear proyecto
        </a>
      @endcan
    </div>

    @include('partials.session-status')
    
    <p class="lead text-secondary">
      Proyectos realizados. Así que, no debes congojarte por las desgracias que a mí me suceden, pues a ti no te cabe parte de ellas.
    </p>

    <div class="d-flex flex-wrap justify-content-between align-items-start">
      @forelse($projects as $project)
        <div class="card border-0 shadow-sm mt-4 mx-auto" style="width: 18rem;">
          @if ($project->image)
            <img class="card-img-top img-thumbnail"
              src="/storage/{{ $project->image }}" 
              alt="{{ $project->title }}"
            >
          @endif
          <div class="card-body">
            <h5 class="card-title">
              <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
            </h5>
            <h6 class="card-subtitle">{{ $project->created_at->format('d/m/Y') }}</h6>
            <p class="card-text">{{ $project->description }}</p>
            <div class="d-flex justify-content-between align-items-center">
              <a href="{{ route('projects.show', $project) }}"
                class="btn btn-primary btn-sm">
                Ver más...
              </a>
              @if ($project->category_id)
                <a href="{{ route('categories.show', $project->category) }}" 
                  class="badge badge-secondary">
                  {{ $project->category->name }}
                </a>   
              @endif
            </div>
          </div>
        </div>
      @empty
        <div class="card">
          <div class="card-body">
            No hay proyectos para mostrar
          </div>
        </div>
      @endforelse
    </div>
    <div class="mt-4">
      {{ $projects->links() }}
    </div>
  </div>
@endsection