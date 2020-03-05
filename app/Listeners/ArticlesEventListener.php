<?php

namespace App\Listeners;

// use App\Events\article.created;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ArticlesEventListener
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
     * @param  article.created  $event
     * @return void
     */
	// public function handle(\App\Article $event)
    // {
	// 	if ($event->action === 'created'){
	// 		\Log::info(sprintf(
	// 			'새로운 글 : %s',
	// 			$event->article->title
	// 		));
	// 	}
    // }
    public function handle(\App\Events\ArticlesEvent $event)
    {
		if ($event->action === 'created'){
			\Log::info(sprintf(
				'새로운 글 : %s',
				$event->article->title
			));
		}
		// var_dump('받았음3');
		// echo '<br>';
		// // var_dump($event->toArray());
		// var_dump($event->article->toArray());
		// echo '<br>';
    }
}
