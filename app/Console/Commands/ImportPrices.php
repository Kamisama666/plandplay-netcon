<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:prices {prices_file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports the list of prices';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $prices_file = $this->argument('prices_file');

        $handle = fopen($prices_file, "r");

        if ($handle === false) {
            return;
        }

        $count = 0;
        $keys = [];
        $new_prices = [];

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

            if ($count === 0) {
                $keys = $data;
                $count++;
                continue;
            }
            
            $price = array_combine($keys, $data);

            $new_prices[] = [
                'user_id' => (int) trim($price['ID']),
                'description' => trim($price['Premio']),
                'code' => 'premio' . (int) trim($price['ID']) . uniqid(),
            ];
        }

        fclose($handle);

        DB::table('prices')->insert($new_prices);
    }
}
