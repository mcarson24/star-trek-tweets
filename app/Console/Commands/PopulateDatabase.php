<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Tweet;
use App\CSVTweetLoader;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class PopulateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tweets:populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate database with the tweets.';

    protected $tweets;

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
        $this->tweets = $this->getTweets();

        if ($this->wantsSqlLiteDatabase() && !file_exists(database_path('database.sqlite'))) {
            $this->createSqlLiteDatabase();
        }

        if ($this->databaseIsAlreadyPopulated()) {
            $this->error('Database already populated with tweets!');
            exit(1);
        }

        $this->populateDatabase();
    }

    /**
     * Determine if the database is already populated
     * with the tweets. There should only ever
     * be 4551 tweets.
     * 
     * @return boolean
     */
    private function databaseIsAlreadyPopulated()
    {
        return Tweet::all()->count() >= 4551;
    }

    /**
     * Create a sqlite database.
     * 
     * @return void
     */
    private function createSqlLiteDatabase()
    {
        $this->info('Creating database...');
        fopen(database_path('database.sqlite'), 'w');
        Artisan::call('migrate');
        $this->info("Database created!");
    }

    /**
     * Populate the database with the tweets.
     * 
     * @return void                  
     */
    private function populateDatabase()
    {
        $this->info("Populating database with {$this->tweets->count()} tweets...");

        $this->tweets->each(function($tweet) {
            $tweet = explode(',', $tweet);

            Tweet::create([
                'time' => Carbon::parse($tweet[0]),
                'body' => $tweet[1],
            ]);
        });
        
        $this->info("Database populated successfully!");
    }

    /**
     * Return a collection of tweets 
     * from the csv file.
     * 
     * @return Illuminate\Support\Collection
     */
    private function getTweets()
    {
        $csvFile = __DIR__ . '/tweets.csv';
        
        return collect(
            CSVTweetLoader::load(1, $csvFile)
        )->reverse();
    }

    /**
     * Determine if a SQLLite database is required.
     * 
     * @return boolean
     */
    private function wantsSqlLiteDatabase()
    {
        return config('database.default') == 'sqlite';
    }
}
