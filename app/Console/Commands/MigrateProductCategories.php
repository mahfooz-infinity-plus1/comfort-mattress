<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateProductCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:product-categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate legacy category_id to the new map_category_product pivot table';

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
        $products = \App\Model\TxnProduct::all();
        $this->info("Starting migration of " . $products->count() . " products...");

        $count = 0;
        foreach ($products as $product) {
            if ($product->category_id) {
                // Keep the record if already present
                $product->categories()->syncWithoutDetaching([$product->category_id]);
                $count++;
            }
        }

        $this->info("Migration completed! Associated $count products to their categories.");
        return 0;
    }
}
