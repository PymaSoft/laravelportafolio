<?php

namespace Tests\Feature;

use App\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListProjectsTest extends TestCase
{
  use RefreshDatabase;

  public function test_can_see_all_projects()
  {
    $this->withoutExceptionHandling();

    /* $project = Project::create([
      'title' => 'Mi nuevo proyecto',
      'url'   => 'mi_nuevo_proyecto',
      'description' => 'Descripción de mi nuevo proyecto'
    ]);

    $project2 = Project::create([
      'title' => 'Mi segundo proyecto',
      'url'   => 'mi_segundo_proyecto',
      'description' => 'Descripción de mi segundo proyecto'
    ]); */

    //$project = factory('App\Project')->create();
    //$project = factory('App\Project')->times(3)->create();
    $project  = factory(Project::class)->create();
    //dd($project->toArray());
    $project2 = factory(Project::class)->create();

    $response = $this->get(route('projects.index'));

    $response->assertStatus(200);

    $response->assertViewIs('projects.index');

    $response->assertSee($project->title);

    $response->assertSee($project2->title);
  }

  public function test_can_see_individual_projects()
  {
    /* $project = Project::create([
      'title' => 'Mi nuevo proyecto',
      'url'   => 'mi_nuevo_proyecto',
      'description' => 'Descripción de mi nuevo proyecto'
    ]);

    $project2 = Project::create([
      'title' => 'Mi segundo proyecto',
      'url'   => 'mi_segundo_proyecto',
      'description' => 'Descripción de mi segundo proyecto'
    ]); */

    $project  = factory(Project::class)->create();
    $project2 = factory(Project::class)->create();

    $response = $this->get(route('projects.show', $project));

    $response->assertSee($project->title);
    
    $response->assertDontSee($project2->title);
  }
}