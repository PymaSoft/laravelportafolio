<?php

namespace App\Listeners;

use App\Events\ProjectSaved;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OptimizeProjectImage
{
  /**
   * Create the event listener.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the event.
   *
   * @param  ProjectSaved  $event
   * @return void
   */
  public function handle(ProjectSaved $event)
  {
    // Optimización de la imagen con Intervention Image
    // Obtener la imagen, pasar el contenido de la imagen al método make
    // del Facade Image, redimensionar la imagen y guardarla en la BD
    $image = Image::make(Storage::get($event->project->image))
                  ->widen(600)
                  ->limitColors(255)
                  ->encode();
    
    Storage::put($event->project->image, (string) $image);
  }
}