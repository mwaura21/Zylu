<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Carbon;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $employees = 
        [
            ['name' => 'Employee 1', 'email' => 'employee1@gmail.com', 'department' => 'Department 1', 'active_since' => Carbon::createFromFormat('Y-m-d H:s:i', '2017-7-20 12:15:10'), 'active' => 'Yes'],
            ['name' => 'Employee 2', 'email' => 'employee2@gmail.com', 'department' => 'Department 2', 'active_since' => NULL, 'active' => 'No'],
            ['name' => 'Employee 3', 'email' => 'employee3@gmail.com', 'department' => 'Department 3', 'active_since' => Carbon::createFromFormat('Y-m-d H:s:i', '2017-6-30  12:15:10'), 'active' => 'Yes']
        ];

        foreach($employees as $employee){
            Employee::create($employee);
        }
    }
}
