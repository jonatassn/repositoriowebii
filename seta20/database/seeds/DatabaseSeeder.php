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
        DB::insert('INSERT INTO alunos(nome, curso, turma)values(?,?,?)',
            array('João Paulo França', 'TADS', 'TADS18'));
        DB::insert('insert into alunos(nome,curso,turma) values(?,?,?)',
            array('Mariana Ramos Albernaz', 'INFO', 'INFO12'));

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
