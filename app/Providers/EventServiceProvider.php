<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
	protected $subscribe = [
		\App\Listeners\UsersEventListener::class,
	];

    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
		],
        \App\Events\ArticlesEvent::class => [
            \App\Listeners\ArticlesEventListener::class,
		],
		\Illuminate\Auth\Events\Login::class => [
            \App\Listeners\UsersEventListener::class,
		],
        \App\Events\ArticlesEvent::class => [
            \App\Listeners\ArticlesEventListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
		parent::boot();


		\Event::listen(
			\App\Events\ArticleCreatedTest::class,
			\App\Listeners\ArticlesEventListenerTest::class
		);

		\Event::listen(
			\App\Events\ArticleCreated::class,
			\App\Listeners\ArticlesEventListener::class
		);

/*
      	\Event::listen('article.created', function($article) {
				// var_dump('받았음2');
				// echo '<br>';
				// var_dump($article->toArray());
				// echo '<br>';
			});
*/
    }
}
