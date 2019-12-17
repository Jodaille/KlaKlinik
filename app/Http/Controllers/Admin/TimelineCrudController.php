<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TimelineRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TimelineCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TimelineCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Timeline');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/timeline');
        $this->crud->setEntityNameStrings('timeline', 'timelines');
    }

    protected function setupListOperation()
    {
        $this->crud->setColumns([
            ['label' => 'Nom', 'name' =>'name'],
            ['label' => 'Début', 'name' =>'start_at'],
            ['label' => 'Fin', 'name' =>'end_at'],
            ['label' => 'Description', 'name' =>'description'],
            ['label' => 'Opération', 'name' =>'Opération'],
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(TimelineRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
