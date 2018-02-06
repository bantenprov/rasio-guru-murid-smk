<?php namespace Bantenprov\RasioGMSMK\Console\Commands;

use Illuminate\Console\Command;

/**
 * The RasioGMSMKCommand class.
 *
 * @package Bantenprov\RasioGMSMK
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RasioGMSMKCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:rasio-guru-murid-smk';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\RasioGMSMK package';

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
        $this->info('Welcome to command for Bantenprov\RasioGMSMK package');
    }
}
