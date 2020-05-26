@csrf

@if ($project->image)
  <img class="card-img-top img-thumbnail mb-2"
    src="/storage/{{ $project->image }}" 
    alt="{{ $project->title }}"
  >
@endif

<div class="custom-file mb-2">
  <input name="image" type="file" class="custom-file-input" id="image">
  <label class="custom-file-label" for="image">Seleccionar imagen</label>
</div>

<div class="form-group">
  <label for="category_id">Categoría del Proyecto</label>
  <select name="category_id" id="category_id"
    class="form-control bg-light shadow-sm border-0"
  >
    <option value="">Seleccionar</option>
    @foreach ($categories as $id => $name)
      <option value="{{ $id }}"
        {{-- {{ $id === $project->category_id ? 'selected' : '' }} --}}
        {{-- 1 == '1' --}}
        @if($id == old('category_id', $project->category_id)) selected @endif
      >
        {{ $name }}
      </option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label for="title">Título</label>
  <input class="form-control bg-light shadow-sm border-0" 
    type="text" name="title" id="title"
    value="{{ old('title', $project->title) }}">
  {!! $errors->first('title', '<div class="text-danger">:message</div>') !!}
</div>
<div class="form-group">
  <label for="url">URL</label>
  <input class="form-control bg-light shadow-sm border-0" 
    type="text" name="url" id="url"
    value="{{ old('url', $project->url) }}">
  {!! $errors->first('url', '<div class="text-danger">:message</div>') !!}
</div>
<div class="form-group">
  <label for="description">Descripción</label>
  <textarea class="form-control bg-light shadow-sm border-0" 
    name="description" id="description" cols="30" rows="10"
  >{{ old('description', $project->description) }}</textarea>
  {!! $errors->first('description', '<div class="text-danger">:message</div>') !!}
</div>

<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
<a class="btn btn-link btn-block" href="{{ route('projects.index') }}">Cancelar</a>