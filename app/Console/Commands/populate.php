<?php

namespace App\Console\Commands;

use App\Models\Dog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;


class populate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populates the database with an amount of dogs from the DogAPI';

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
     * @return int
     */
    public function handle()
    {
        $count = $this->ask('How many dogs do you want to get?');

        $response = Http::withHeaders([
            'x-api-key' => 'live_Lxr9f2gwJiDPRnOi2EC3uRBFx1RruCvYifITEws697whqj8HPGSH2JvU0jBw1iJH',
            'Content-Type' => 'application/json'
        ])->get('https://api.thedogapi.com/v1/breeds?limit=1&page=0', []);

        $data = json_decode($response->getBody()->getContents(), true);


        $this->info('Data retrieved! Processing...');

        $all_dog_ids = range(1, count($data)-1);
        shuffle($all_dog_ids);
        $dog_ids = array_slice($all_dog_ids, 0, $count);

        foreach($dog_ids as $id) {
            $max_tries = count($data);  //Stop condition if all the API dogs are in the database already
            $tries = 0;
            while(Dog::where('name', $data[$id]['name'])->exists() && $tries <= $max_tries) {
                shuffle($all_dog_ids);
                $id = $all_dog_ids[0];
                $tries += 1;
            }

            if ($tries >= $max_tries) {
                $this->error('All the dogs from the API are already imported!');
                return 1;
            }
                $data[$id];
                $dog = new Dog;
                $dog->fill($data[$id]);
                $dog->reference_image_url = $data[$id]['image']['url'] ? $data[$id]['image']['url'] : null;
                $dog->save();
            $this->info('Imported: ' . $data[$id]['name']);
        }

        $this->info('Populating successful! Count:'.$count);

        return 0;
    }
}
