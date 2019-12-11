<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AnimalRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AnimalCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class AnimalCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Animal');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/animal');
        $this->crud->setEntityNameStrings('animal', 'animals');
    }

    protected function setupListOperation()
    {
        $this->crud->setColumns([
            ['label' => 'Nom', 'name' =>'name'],
        ]);
        $this->crud->addColumn([
            'label' => 'Éspèce',
            'type' => 'select',
            'name' => 'species_id',
            'entity' => 'species',
            'attribute' => 'name',
            'model' => "App\Models\Species",
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(AnimalRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
