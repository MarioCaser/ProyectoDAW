<?php

    namespace App\Console;

    use Illuminate\Console\Scheduling\Schedule;
    use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
    use Illuminate\Support\Facades\Log;

    class Kernel extends ConsoleKernel
    {
        // ...

        protected function schedule(Schedule $schedule): void
        {
            $schedule->command('app:ordenes')->everyMinute();
            // $schedule->command('app:pagosearn')->everyMinute()->withoutOverlapping();
            // $schedule->command('app:reembolsos')->everyMinute()->withoutOverlapping();
        }

        // ...

        protected function commands(): void
        {
            $this->load(__DIR__.'/Commands');

            require base_path('routes/console.php');
        }

        // Agrega esta función para manejar las excepciones
        protected function handleException($exception)
        {
            Log::error($exception->getMessage());
        }
    }