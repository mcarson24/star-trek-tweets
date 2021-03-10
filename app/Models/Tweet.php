<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'time' => 'datetime',
    ];

    public function getFormattedTextAttribute()
    {
    	$this->formatText();

        return $this->body;
    }

    /**
     * Return the time in the desired format.
     *
     * @return string
     */
    public function getFullTimeAttribute()
    {	
        return $this->time->format('l, F jS, g:ia');
    }

    /**
     * Return the time in the shorter format.
     *
     * @return string
     */
    public function getShortTimeAttribute()
    {
        return $this->time->format('M jS');
    }

    /**
     * Completely format the text of the tweet.
     *
     * @return void
     */
    public function formatText()
    {
        $this->linksToAnchorTags()
             ->twitterHandlesToAnchorTags()
             ->hashtagsToAnchorTags();
    }

    /**
     * Convert links to anchor tags for displaying in a web browser.
     *
     * @return App\Tweet
     */
    private function linksToAnchorTags()
    {
        $this->body = preg_replace('/(http[s]?:\/\/[a-z.\/0-9_?=-]*)/i', '<a target="_blank" href="$1">$1</a>', $this->body);

        return $this;
    }

    /**
     * Convert twitter handles to anchor tags for displaying in a web browser.
     *
     * @return App\Tweet
     */
    private function twitterHandlesToAnchorTags()
    {
        $this->body =  preg_replace('/@(\w+)/', '<a target="_blank" href="https://twitter.com/$1">@$1</a>', $this->body);

        return $this;
    }

    /**
     * Convert hash tags to anchor tags for displaying in a web browser.
     *
     * @return string
     */
    private function hashtagsToAnchorTags()
    {
        $this->body = preg_replace('/#([a-z0-9]+)/i', '<a target="_blank" href="https://twitter.com/hashtag/$1?src=hash">#$1</a>', $this->body);

        return $this;
    }
}
