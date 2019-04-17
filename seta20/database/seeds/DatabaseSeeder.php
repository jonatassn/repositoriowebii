<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //alunos
        DB::insert('INSERT INTO alunos(nome, curso, turma)values(?,?,?)',
            array(mb_strtoupper('João Paulo França', 'UTF-8'), 'TADS', 'TADS18'));
        DB::insert('insert into alunos(nome,curso,turma) values(?,?,?)',
            array(mb_strtoupper('Mariana Ramos Albernaz','UTF-8'), 'INFO', 'INFO18'));

        //niveis
        DB::insert('insert into nivel_models(nome, abreviatura) values(?,?)',
                    array('Ensino Médio', 'Médio'));
        DB::insert('insert into nivel_models(nome, abreviatura) values(?,?)',
                    array('Graduação Técnico', 'Técnico'));
        DB::insert('insert into nivel_models(nome, abreviatura) values(?,?)',
                    array('Graduação Bacharel', 'Bacharel'));
        DB::insert('insert into nivel_models(nome, abreviatura) values(?,?)',
                    array('Graduação Licenciatura', 'Licenciatura'));

    }
}
