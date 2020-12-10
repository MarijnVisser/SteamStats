<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;


class scrapeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scraper:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $client = new Client();

        $crawler = $client->request('GET', 'https://store.steampowered.com/stats/');
        $crawler->filter('td > .statsTopHi')->each(function ($node) {
            print $node->text()."\n";
        });
    }
}
