<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::insert('INSERT INTO alunos(nome, curso, turma) VALUES(?, ?, ?)',
            array('João Paulo França', 'TADS', 'TADS18'));
        DB::insert('INSERT INTO alunos(nome, curso, turma) VALUES(?, ?, ?)',
            array('Mariana Ramos Albernaz', 'INFO', 'INFO12'));
        DB::insert('INSERT INTO curso_models(nome, abreviatura) VALUES(?, ?)',
            array('ANÁLISE E DESENVOLVIMENTO DE SISTEMAS', 'TDAS'));
        DB::insert('INSERT INTO curso_models(nome, abreviatura) VALUES(?, ?)',
            array('EMI EM INFORMÁTICA', 'INFO'));
    }
}
