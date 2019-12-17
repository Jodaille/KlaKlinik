<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
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
        ]);
        $this->crud->addColumn([
            'label' => 'Opération',
            'type' => 'select',
            'name' => 'operation_id',
            'entity' => 'operation',
            'attribute' => 'name',
            'model' => "App\Models\Operation",
        ]);
    }


    protected function setupCreateOperation()
    {
        $this->crud->setValidation(TimelineRequest::class);
        $this->crud->addField([
            'name' => 'name',
            'label' => 'Nom',
            'type' => 'text',
            'placeholder' => 'le nom de l\'évènement',
        ]);

        $this->crud->addField([
            'name' => 'start_at',
            'label' => 'Début',
            'type' => 'datetime_picker',
            'default' => Carbon::now(),

        ]);
        $this->crud->addField([
            'name' => 'end_at',
            'label' => 'Fin',
            'type' => 'datetime_picker',
            'default' => Carbon::now(),
        ]);
        $this->crud->addField([
            'name' => 'description',
            'label' => 'description',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'label' => 'Animal',
            'type' => 'select2',
            'name' => 'animal_id',
            'entity' => 'animal',
            'attribute' => 'name',
        ]);
        $this->crud->addField([
            'label' => 'Opération',
            'type' => 'select2',
            'name' => 'operation_id',
            'entity' => 'operation',
            'attribute' => 'name',
        ]);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
