<?php

namespace Modules\Report\Console;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Modules\Report\Entities\ReportRevenueDaily;
use Modules\Report\Entities\ReportRevenueMonthly;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class InitialReportCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'report:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Init Report for new days.';

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
     * @return mixed
     */
    public function handle()
    {
        $today = Carbon::now();

        ReportRevenueDaily::firstOrCreate([
            "day" => $today->toDateString()
        ]);

        ReportRevenueMonthly::firstOrCreate([
            "month" => $today->month,
            "year"  => $today->year,
        ]);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
