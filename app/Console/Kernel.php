<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

     protected $commands = [
        \App\Console\Commands\Netsigl::class,
     ];
    protected function schedule(Schedule $schedule)
    {
        //$schedule->command('netsigl:data')->everyFiveMinutes();
        $schedule->command('backup:clean')->weekly()->at('01:00');
        $schedule->command('backup:run')->daily()->at('05:00');
        $schedule->command('backup:monitor')->daily()->at('06:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
