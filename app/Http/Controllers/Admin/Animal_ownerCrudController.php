<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Animal_ownerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class Animal_ownerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class Animal_ownerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\AnimalOwner');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/animal_owner');
        $this->crud->setEntityNameStrings('propriétaire', 'propriétaires');
    }

    protected function setupListOperation()
    {
        $this->crud->setColumns([
            ['label' => 'Nom', 'name' =>'name'],
            ['label' => 'Prénom', 'name' =>'firstname'],
            ['label' => 'Date de naissance', 'name' =>'birthdate'],
            ['label' => 'Téléphone', 'name' =>'phone'],
        ]);
        $this->crud->addColumn([
            'label' => 'Ville',
            'type' => 'select',
            'name' => 'address_id',
            'entity' => 'address',
            'attribute' => 'city',
            'model' => "App\Models\Address",
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(Animal_ownerRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
