<?php

namespace Photon\Providers;

use Illuminate\Support\ServiceProvider;
use Photon\Repositories\HomePage\HomePageInterface;
use Photon\Repositories\HomePage\HomePageRepository;
use Photon\Repositories\Numbers\NumbersInterface;
use Photon\Repositories\Numbers\NumbersRepository;
use Photon\Repositories\AboutPage\AboutPageInterface;
use Photon\Repositories\AboutPage\AboutPageRepository;
use Photon\Repositories\Teams\TeamsInterface;
use Photon\Repositories\Teams\TeamsRepository;
use Photon\Repositories\Games\GamesInterface;
use Photon\Repositories\Games\GamesRepository;
use Photon\Repositories\CalendarPage\CalendarPageInterface;
use Photon\Repositories\CalendarPage\CalendarPageRepository;
use Photon\Repositories\DonatePage\DonatePageInterface;
use Photon\Repositories\DonatePage\DonatePageRepository;
use Photon\Repositories\News\NewsInterface;
use Photon\Repositories\News\NewsRepository;
use Photon\Repositories\Contact\ContactInterface;
use Photon\Repositories\Contact\ContactRepository;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        // \DB::listen(function ($query) {
        //     \Log::info(json_encode([
        //         $query->sql,
        //         $query->bindings,
        //         $query->time
        //     ]));
        // });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        $services = [
            HomePageInterface::class => HomePageRepository::class,
            NumbersInterface::class => NumbersRepository::class,
            AboutPageInterface::class => AboutPageRepository::class,
            TeamsInterface::class => TeamsRepository::class,
            GamesInterface::class => GamesRepository::class,
            CalendarPageInterface::class => CalendarPageRepository::class,
            DonatePageInterface::class => DonatePageRepository::class,
            NewsInterface::class => NewsRepository::class,
            ContactInterface::class => ContactRepository::class,
        ];

        foreach ($services as $key => $value) {
            $this->app->bindIf($key, $value);
        }
    }

}
