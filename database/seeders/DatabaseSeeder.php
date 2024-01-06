<?php

namespace Database\Seeders;

use App\Models\OtherParents;
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
        $this->call([
            NotariesTableSeeder::class,
            NationalityTableSeeder::class,
            TypeDocumentsTableSeeder::class,
            IssuerDocumentsTableSeeder::class,
            SexesTableSeeder::class,
            MinorTableSeeder::class,
            AuthorizingRelartivesTableSeeder::class,
            AccreditationLinkTableSeeder::class,
            AuthorizationsTableSeeder::class,
            OtherParensTableSeeder::class,
            OrderTableSeeder::class,
            UsersTableSeeder::class,
            PersonsTableSeeder::class
        ]);
    }
}
