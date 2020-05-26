<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $guarded = [];

  public function getRouteKeyName()
  {
    return 'url';
  }

  /**
   * Una Categoría puede tener muchos Proyectos
   */
  public function projects()
  {
    return $this->hasMany(Project::class);
  }
}