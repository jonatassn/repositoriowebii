<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('INSERT INTO alunos(nome, curso, turma)values(?,?,?)',
            array('João Paulo França', 'TADS', 'TADS18'));

        DB::insert('insert into alunos(nome,curso,turma) values(?,?,?)',
            array('Mariana Ramos Albernaz', 'INFO', 'INFO12'));

        DB::insert('insert into cursos(nome, abreviatura) values(?,?)',
            array('ANÁLISE E DESENVOLVIMENTO DE SISTEMAS', 'TADS'));
        DB::insert('insert into cursos(nome, abreviatura) values(?,?)',
            array('EMI EM INFORMÁTICA', 'INFO'));
        // $this->call(UsersTableSeeder::class);
    }
}
