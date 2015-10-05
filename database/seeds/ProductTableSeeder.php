<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Flynsarmy\CsvSeeder\CsvSeeder;

class ProductCsvSeeder extends CsvSeeder
{


  public function __construct($filename)
  {
    $this->table = 'products';
    $this->csv_delimiter = ',';
    $this->filename = 'csv/'.$filename;

    $this->mapping = [
        0=> 'product_code',
        1=> 'image',
        2=> 'pridce_cny',
        3=> 'status',
        4=>'bussiness_group',
        5=>'product_group',
        6=>'stock',
        7=>'supplier',
        8=>'marketplaces',
        9=>'added_time',
        10=>'added_user',
        11=>'modified_time',
        12=>'modified_user'
    ];
  }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();
        //
        // $this->call(UserTableSeeder::class);
        //
        // Model::reguard();

        DB::disableQueryLog();
        parent::run();
    }
}
