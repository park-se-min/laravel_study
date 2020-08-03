<?php

namespace App\Listeners;

// use App\Events\article.created.test;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ArticlesEventListenerTest
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  article.created.test  $event
     * @return void
     */
    public function handle(\App\Events\ArticleCreatedTest $event)
    {
		echo "2222223333333222";
        //
    }
}
