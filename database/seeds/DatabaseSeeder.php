<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed the Countries
        $this->call(CountriesTableSeeder::class);

        // Seed the States
        $this->call(StatesTableSeeder::class);

        // Seed the Cites
        $this->call(CitiesTableSeeder::class);

        // Seed the Time Zones
        $this->call(TimeZonesTableSeeder::class);

        // Seed the Languages
        $this->call(LanguagesTableSeeder::class);

        // Seed the Categories
        $this->call(CategoriesTableSeeder::class);

        // Seed the Currencies
        $this->call(CurrenciesTableSeeder::class);

        // Seed the Content
        $this->call(ContentTableSeeder::class);

        // Seed the Testimonials
//        $this->call(TestimonialsTableSeeder::class);

        // Seed the Blogs
//        $this->call(BlogsTableSeeder::class);

        // Seed the Roles
        $this->call(RolesTableSeeder::class);

        // Seed the Users
        $this->call(UsersTableSeeder::class);

        // Seed the Event Topics
        $this->call(EventTopicsTableSeeder::class);

        //Seed the Event Types
        $this->call(EventTypesTableSeeder::class);

        // Seed the Refund Policies
        $this->call(RefundPolicyTableSeeder::class);

        // Seed the Event Layouts
        $this->call(EventLayoutsTableSeeder::class);

        // Seed the Admin Panel Menu
        $this->call(AdminMenuSeeder::class);

        // Seed the Admin User
        $this->call(AdminUser::class);

        // Seed the Admin Role
        $this->call(AdminRole::class);

        // Seed the Admin Role User
        $this->call(AdminRoleUser::class);

        // Seed the Admin Permissions
        $this->call(AdminPermissions::class);

        // Seed the Admin Permissions
        $this->call(AdminRolePermission::class);



    }
}
