<?php

namespace App\Http\Controllers;

use App\Project;
use App\Category;
use App\Events\ProjectSaved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveProjectRequest;

class ProjectController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except('index', 'show');
  }

  public function index()
  {
    //$projects = DB::table('projects')->get();
    //$projects = Project::orderBy('created_at', 'DESC')->get();
    //$projects = Project::latest('created_at', 'DESC')->get();
    /* projects = Project::latest()->get();
  
    return view('portfolio', compact('projects')); */

    return view('projects.index', [
      'newProject' => new Project,
      'projects' => Project::with('category')->latest()->paginate()
    ]);
  }
  
  public function create()
  {
    /* return view('projects.create', [
      'project'    => new Project,
      'categories' => Category::pluck('name', 'id') // Array asociativo
    ]); */

    /* if (Gate::allows('create-projects')) {
      return view('projects.create', [
        'project'    => new Project,
        'categories' => Category::pluck('name', 'id') // Array asociativo
      ]);
    }
    abort(403); */

    //abort_unless(Gate::allows('create-projects'), 403);   // ó
    //Gate::authorize('create-projects');   // ó
    //$this->authorize('create-projects');
    $this->authorize('create', $project = new Project);

    return view('projects.create', [
      'project'    => $project,
      'categories' => Category::pluck('name', 'id') // Array asociativo
    ]);
  }
  
  public function store(SaveProjectRequest $request)
  {
/*     Project::create([
      'title' => request('title'),
      'url'   => request('url'),
      'description' => request('description'),
    ]); */
    //Project::create(request()->all());  // No recomendado

    // Protección contra la asignación masiva
/*     $fields = request()->validate([
      'title' => 'required',
      'url'   => 'required',
      'description' => 'required|min:3',
    ]); */

    //dd($request->file('image'));
    // Mover la imagen a storage/app/images
    //return $request->file('image')->store('images');
    // Mover la imagen a storage/app/images
    //return $request->file('image')->store('images', 'public');
    // Cambiar la configuración del disco de config/filesystems.php:
    // 'default' => env('FILESYSTEM_DRIVER', 'local')
    // en .env FILESYSTEM_DRIVER=public
    //return $request->file('image')->store('images');

    // Nueva instancia del Proyecto
    $project = new Project($request->validated());

    // Lección 20 - Políticas de acceso
    $this->authorize('create', $project);

    // Asignar la imagen y guardar
    $project->image = $request->file('image')->store('images');
    $project->save();

    // Disparar los eventos y oyentes (Events - Listeners)
    ProjectSaved::dispatch($project);

    return redirect()->route('projects.index')->with('status', 'El proyecto fue creado con éxito!');
  }
  
/*   public function show($id)
  {
    //return Project::find($id);

    return view('projects.show', [
      'project' => Project::findOrFail($id)
    ]);
  } */
  
  // Route Model Binding
  public function show(Project $project)
  {
    return view('projects.show', [
      'project'    => $project,
      'categories' => Category::pluck('name', 'id') // Array asociativo
    ]);
  }
  
  public function edit(Project $project)
  {
    // Lección 20 - Políticas de acceso
    $this->authorize('update', $project);

    return view('projects.edit', [
      'project'    => $project,
      'categories' => Category::pluck('name', 'id') // Array asociativo
    ]);

    // Array asociativo: Acceder a la llave ($id) da cada valor ($name)
    /* @foreach ($categories as $id => $name)
        <option value="{{ $id }}"
          // 1a. forma - Preseleccionar una opción:
          // Verificar si el $id de la Categoria es = a la Categoria del Proyecto
          // Si es = se preselecciona, de lo contrario se deja en blanco
          {{ $id === $project->category_id ? 'selected' : '' }}
          // 2a. forma - Preseleccionar una opción: Con la directiva de blade
          @if($id === $project->category_id) selected @endif
        >
          {{ $name }}
        </option>
    @endforeach */
  }
  
  public function update(Project $project, SaveProjectRequest $request)
  {
    //ddd(array_filter($request->validated()));   // Ignition

    $this->authorize('update', $project);

    // Si se quiere actualizar la imagen
    if ($request->hasFile('image')) {
      // Eliminar la anterior imagen
      Storage::delete($project->image);

      // Rellenar todos los campos sin guardarlos en la BD
      $project->fill($request->validated());

      // Asignar la imagen y guardar
      $project->image = $request->file('image')->store('images');
      $project->save();

      ProjectSaved::dispatch($project);
    } else {
      // Si tiene imagen, quitar el campo image con el valor null (funcion de php array_filter),
      // se actualizarán los demás datos en la BD y la imagen que tenía va a permanecer
      $project->update(array_filter($request->validated()));
    }

    return redirect()->route('projects.show', $project)
                     ->with('status', 'El proyecto fue actualizado con éxito!');
  }
  
  public function destroy(Project $project)
  {
    $this->authorize('delete', $project);

    Storage::delete($project->image);
    $project->delete();

    return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado con éxito!');
  }
}