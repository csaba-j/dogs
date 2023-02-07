<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Laravel\Sanctum\PersonalAccessToken;


class token_create extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'token:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates an API key for the application and stores it in the database.';

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
        $token = Str::random(60);
        $hashed_token = hash('sha256',$token);

        $user = User::auth();

        $accessToken = PersonalAccessToken::create([
            'name' => 'cli_access',
            'token' => $hashed_token,
            'abilities' => '[*]',
        ]);

        $token = $user->createToken();


        //$accessToken->save();
        $this->info('Personal access token generated! Your token is:');
        $this->info($token->plainTextToken);
     
        return 0;
    }
}
