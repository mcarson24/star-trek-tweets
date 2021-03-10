<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Tweet;
use Illuminate\Database\Eloquent\Factories\Factory;

class TweetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tweet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'time' => Carbon::parse('2017-01-01 12:00:00 +0000')->setTimezone('America/Los_Angeles'), 
            'body' => 'Tweet body!'
        ];
    }

    /**
     * Indicate that the tweet contains a link.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function containsLink()
    {
        return $this->state(function () {
            return [
                'body' => 'Just click here https://example.com!',
            ];
        });
    }

    /**
     * Indicate that the tweet contains a twitter handle.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function containsTwitterHandle()
    {
        return $this->state(function () {
            return [
                'body' => 'Thanks alot @twitter!',
            ];
        });
    }

    /**
     * Indicate that the tweet contains a hashtag.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function containsHashtag()
    {
        return $this->state(function () {
            return [
                'body' => 'So cool! #sample',
            ];
        });
    }
}
