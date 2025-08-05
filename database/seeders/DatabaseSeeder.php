<?php

namespace Database\Seeders;

use App\Models\Settings;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
        ]);

        Settings::create([
            'user_id' => 1,
            'public_email' => 'info@gmail.com',
            'phone' => '+8801712345621',
            'about' => 'Experienced full-stack developer with expertise in Laravel and Vue.js.',
            'institute' => 'Dhaka Uni',
            'degree' => 'Masters',
            'photo' => 'uploads/photos/user101.jpg',
            'cover' => 'uploads/photos/user101.jpg',
            'resume' => 'uploads/resumes/user101_resume.pdf',
            'address' => '123/B, Dhanmondi, Dhaka, Bangladesh',
            'interests' => ["Web Development", "Open Source", "UI/UX"],
            'awards' => ["Best Developer 2023", "Top Contributor GitHub"],
            'links' => [
                ['name' => 'GitHub', 'url' => 'https://github.com/user101'],
                ['name' => 'LinkedIn', 'url' => 'https://linkedin.com/in/user101']
            ],
            'skills' => [
                ['name' => 'Laravel', 'level' => 'Expert'],
                ['name' => 'Vue.js', 'level' => 'Advanced']
            ],
            'languages' => [
                ['name' => 'English', 'proficiency' => 'Fluent'],
                ['name' => 'Bangla', 'proficiency' => 'Native']
            ],
            'facts' => [
                ['name' => 'Project Completed', 'projects' => 100],
                ['name' => 'Lines of Code', 'projects' => '45k']
            ],
            'educations' => [
                ['institution' => 'Dhaka Clg', 'degree' => 'Entermediate', 'start' => '2018', 'end' => '2018'],
                ['institution' => 'Dhaka University', 'degree' => 'BSc in CSE', 'start' => '2018', 'end' => '2018']
            ],
            'experiences' => [
                ['company' => 'Tech Firm Ltd.', 'role' => 'Senior Developer', 'start' => '2019', 'end' => '2022'],
                ['company' => 'Santo Mariam Institute', 'role' => 'Senior Designer', 'start' => '2022', 'end' => '']
            ],
            'designation' => ["Creative Design", "Graphics Design"],
        ]);
    }
}
