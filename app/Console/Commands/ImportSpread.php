<?php

namespace App\Console\Commands;

use App\Models\Animal;
use App\Models\Species;
use App\Models\Location;
use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportSpread extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:spread {filepath}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function addAnimal($row)
    {
        $id = $row['E'];
        $name = $row['A'];
        $speciesname = $row['B'];
        $locationname = $row['D'];
        $animal = Animal::firstOrNew(['id' => $id]);
        $animal->name = $name;
        $species = Species::firstOrNew(['name' => $speciesname]);
        $species->save();
        $animal->species_id = $species->id;
        $location = Location::firstOrNew(['name' => $locationname]);
        $location->save();
        $animal->location_id = $location->id;
        $animal->save();

    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $filepath = $this->argument('filepath');
        $this->info($filepath);
        $spreadsheet = IOFactory::load($filepath);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        $line = 1;
        foreach ($sheetData as $row) {
            if ($line > 1 && $row['E']) {
                $this->addAnimal($row);

            }
            $line++;
        }
    }
}
