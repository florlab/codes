<?php

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('employees')->delete();

        \DB::statement(
        "INSERT INTO employees(name, email, contact_number, position) VALUES ('adf', 'asdf', 'asdf', 'adsf')");
    }
}
