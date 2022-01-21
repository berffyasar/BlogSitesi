<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class aboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $about=new About();
            $about->title_1="ilk başlık";
            $about->title_2="ikinci başlık";
            $about->content_1="bu içerik dinamik olarak gelmiştir";
            $about->content_2="content 2";
            $about->save();

    }
}
