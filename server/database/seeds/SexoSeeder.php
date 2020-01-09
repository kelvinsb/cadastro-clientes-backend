<?php

use Illuminate\Database\Seeder;

use App\Sexo;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sexos')->delete();
        // Sexo::truncate();

        Sexo::create([
            'descricao'     =>  'Masculino',
        ]);
        Sexo::create([
            'descricao'     =>  'Feminino',
        ]);
    }
}
