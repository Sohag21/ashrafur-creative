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
            'name' => 'Ashrafur Rahman',
            'email' => 'ashrafur.admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Settings::create([
            'user_id' => 1,
            'public_email' => 'ashrafur.gdm@gmail.com',
            'phone' => '+8801680565411',
            'about' => 'Mr. Ashrafur Rahman is a passionate Graphic Designer based in Dhaka,        Bangladesh, with over 10 years of experience in the creative industry. He holds a graduation in Graphic Design & Multimedia and a post-graduation in Fine Art, blending technical precision with artistic depth in every project. Known for his spontaneous creativity and love for artistic freedom, Ashrafur specializes in minimalist design that communicates clearly and powerfully. He enjoys crafting visual stories across a variety of formats — from book covers and logos to posters and beyond. Driven by curiosity and a love for new challenges, he thrives on transforming ideas into unique design concepts that leave a lasting impact. With each project, Ashrafur brings not only skill and experience but also a deep passion for meaningful, timeless design.',
            'motivation' => 'motivation text.',
            'institute' => 'Dhaka Uni',
            'degree' => 'Masters',
            'photo' => 'uploads/photos/user101.jpg',
            'cover' => 'uploads/photos/user101.jpg',
            'resume' => 'uploads/resumes/user101_resume.pdf',
            'address' => '13NA/2, Bashonti, Lake City Concord, Khilkhet, Dhaka, Bangladesh',
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
            'designation' => ["Graphic Designer"],
        ]);
    }
}
