<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class SaveProjectRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    //return true;

    //return Gate::allows('create-projects');
    // Lección 20 - Políticas de acceso
    //return Gate::authorize('create', new \App\Project);

    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    //dd($this->route('project'));

    return [
      'title' => 'required',
      // Ejemplo para validar campos únicos al crear y actualizar
      // Al actualizar ignore la url actual
      'url'   => [
        'required',
        Rule::unique('projects')->ignore($this->route('project')),
      ],
/*       'url'   => [
        'required',
        Rule::unique('projects', 'url')->ignore($this->project)
      ], */
      'category_id' => 'required',
      'image' => [
        // Al actualizar que sea nula de lo contrario requerido
        $this->route('project') ? 'nullable' : 'required', 
        'mimes:jpeg,png,gif', // 'image' => jpeg, png, bmp, gif, svg o webp
        //'dimensions:min_width=400,min_height=200', 
        //'max:2000',
      ],
      'description' => 'required|min:3',
    ];
  }

  public function messages()
  {
    return [
      'title.required' => 'El proyecto necesita un título.'
    ];
  }
}