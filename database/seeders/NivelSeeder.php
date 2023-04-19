<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $niveles = ['PRIMERO','SEGUNDO','TERCERO','CUARTO','QUINTO','SEXTO'];

        foreach($niveles as $nivel){
           DB::table('niveles')->insert([
               'nombre' => $nivel

           ]);


        }
    }
}
