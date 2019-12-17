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
        $this->crud->setEntityNameStrings('animal', 'animaux');
    }

    protected function setupListOperation()
    {
        $this->crud->setColumns([
            ['label' => 'Nom', 'name' =>'name'],
            ['label' => 'N° identité', 'name' =>'identity'],
        ]);
        $this->crud->addColumn([
            'label' => 'Espèce',
            'type' => 'select',
            'name' => 'species_id',
            'entity' => 'species',
            'attribute' => 'name',
            'model' => "App\Models\Species",
        ]);
        $this->crud->addColumn([
            'label' => 'Propriétaire',
            'type' => 'select',
            'name' => 'owner_id',
            'entity' => 'owner',
            'attribute' => 'name',
            'model' => "App\Models\AnimalOwner",
        ]);
        $this->crud->addColumn([
            'label' => 'Emplacement',
            'type' => 'select',
            'name' => 'location_id',
            'entity' => 'location',
            'attribute' => 'name',
            'model' => "App\Models\Location",
        ]);
        $this->crud->orderBy('name', 'ASC');
    }
    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        $this->crud->setColumns([
            ['label' => 'Nom', 'name' =>'name'],
        ]);
        $this->crud->addColumn([
            'label' => 'Espèce',
            'type' => 'select',
            'name' => 'species_id',
            'entity' => 'species',
            'attribute' => 'name',
            'model' => "App\Models\Species",
        ]);
        $this->crud->addColumn([
            'label' => 'Propriétaire',
            'type' => 'select',
            'name' => 'owner_id',
            'entity' => 'owner',
            'attribute' => 'name',
            'model' => "App\Models\AnimalOwner",
        ]);
        $this->crud->addColumn([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'closure',
            'function' => function($entry) {
                return html_entity_decode($entry->description);
            }
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(AnimalRequest::class);
        $this->crud->addField([
            'name' => 'name',
            'label' => 'Nom',
            'type' => 'text',
            'placeholder' => 'le nom de l\'animal',
        ]);

        $this->crud->addField([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'ckeditor',
            'placeholder' => 'Votre description',
        ]);
        $this->crud->addField([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'image',
            'upload' => true,
            'crop' => true,
        ]);
        $this->crud->addField([
            'label' => 'Espèce',
            'type' => 'select2',
            'name' => 'species_id',
            'entity' => 'species',
            'attribute' => 'name',
        ]);
        $this->crud->addField([
            'label' => 'Emplacement',
            'type' => 'select2',
            'name' => 'location_id',
            'entity' => 'location',
            'attribute' => 'name',
        ]);
        $this->crud->addField([
            'label' => 'Propriétaire',
            'type' => 'select2',
            'name' => 'owner_id',
            'entity' => 'owner',
            'attribute' => 'name',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
