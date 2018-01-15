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
        // $this->call(UsersTableSeeder::class);
        $this->call('CountriesSeeder');
        $this->command->info('Seeded the countries!');
        
        DB::table('users')->insert([
        	'firstname'=>'Admin',
        	'lastname'=>'Webmaster',
        	'country'=>'N/A',
        	'mobile_number'=>'N/A',
        	'gender'=>'N/A',
        	'role'=>'Admin',
        	'status'=>1,
        	'email'=>'admin@webmaster.com',
        	'password'=>bcrypt('123Qwe1!'),
        ]);

        // DB::table('users')->insert([
        //     'firstname'=>'Edeeson',
        //     'lastname'=>'Opina',
        //     'country'=>'Philippines',
        //     'mobile_number'=>'09563919724',
        //     'gender'=>'Male',
        //     'type'=>'Entrepreneur',
        //     'role'=>'Client',
        //     'status'=>1,
        //     'email'=>'edeesonopinav4@gmail.com',
        //     'password'=>bcrypt('123Qwe1!'),
        // ]);

        // DB::table('users')->insert([
        //     'firstname'=>'Nin',
        //     'lastname'=>'Abayata',
        //     'country'=>'Philippines',
        //     'mobile_number'=>'09563919724',
        //     'gender'=>'Female',
        //     'educational_attainment'=>'College Degree',
        //     'course'=>'BS Marketing',
        //     'type'=>'VA',
        //     'role'=>'Client',
        //     'status'=>1,
        //     'email'=>'ninabayata@gmail.com',
        //     'password'=>bcrypt('123Qwe1!'),
        // ]);

        // DB::table('users')->insert([
        //     'firstname'=>'Lara',
        //     'lastname'=>'Cruz',
        //     'country'=>'Philippines',
        //     'mobile_number'=>'09563919724',
        //     'gender'=>'Female',
        //     'educational_attainment'=>'College Degree',
        //     'course'=>'BS Mass Communications',
        //     'type'=>'VA',
        //     'role'=>'Client',
        //     'status'=>1,
        //     'email'=>'laracruz@gmail.com',
        //     'password'=>bcrypt('123Qwe1!'),
        // ]);

        // DB::table('users')->insert([
        //     'firstname'=>'Haydee',
        //     'lastname'=>'Opina',
        //     'country'=>'Thailand',
        //     'mobile_number'=>'09563919724',
        //     'gender'=>'Female',
        //     'educational_attainment'=>'College Degree',
        //     'course'=>'BS ECE',
        //     'type'=>'VA',
        //     'role'=>'Client',
        //     'status'=>1,
        //     'email'=>'haydeopina@gmail.com',
        //     'password'=>bcrypt('123Qwe1!'),
        // ]);

        // DB::table('users')->insert([
        //     'firstname'=>'Julita',
        //     'lastname'=>'Opina',
        //     'country'=>'Philippines',
        //     'mobile_number'=>'09563919724',
        //     'gender'=>'Female',
        //     'educational_attainment'=>'College Degree',
        //     'course'=>'BS CE',
        //     'type'=>'VA',
        //     'role'=>'Client',
        //     'status'=>1,
        //     'email'=>'jopina@gmail.com',
        //     'password'=>bcrypt('123Qwe1!'),
        // ]);

        // DB::table('users')->insert([
        //     'firstname'=>'Ayesha',
        //     'lastname'=>'Opina',
        //     'country'=>'Singapore',
        //     'mobile_number'=>'09563919724',
        //     'gender'=>'Female',
        //     'educational_attainment'=>'College Degree',
        //     'course'=>'BS Information Technology',
        //     'type'=>'VA',
        //     'role'=>'Client',
        //     'status'=>1,
        //     'email'=>'aopina@gmail.com',
        //     'password'=>bcrypt('123Qwe1!'),
        // ]);

        // DB::table('users')->insert([
        //     'firstname'=>'Given',
        //     'lastname'=>'De Guzman',
        //     'country'=>'Thailand',
        //     'mobile_number'=>'09563919724',
        //     'gender'=>'Female',
        //     'educational_attainment'=>'High School',
        //     'type'=>'VA',
        //     'role'=>'Client',
        //     'status'=>1,
        //     'email'=>'gdeguzman@gmail.com',
        //     'password'=>bcrypt('123Qwe1!'),
        // ]);

        DB::table('areas')->insert([
            'description'=>'Personal',
            'status'=>1,
        ]);

        DB::table('areas')->insert([
            'description'=>'Preferences',
            'status'=>1,
        ]);

        DB::table('areas')->insert([
            'description'=>'Experience',
            'status'=>1,
        ]);

        DB::table('areas')->insert([
            'description'=>'Skills',
            'status'=>1,
        ]);

        DB::table('areas')->insert([
            'description'=>'Goals',
            'status'=>1,
        ]);

        DB::table('areas')->insert([
            'description'=>'Feedbacks',
            'status'=>1,
        ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>1,
        //     'type'=>'File',
        //     'description'=>'Please upload a professional profile photograph',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>1,
        //     'type'=>'File',
        //     'description'=>'Please upload your latest resume/cv or portfolio',
        //     'status'=>1,
        // ]);

        DB::table('questions')->insert([
            'scope'=>'VA',
            'area_id'=>1,
            'type'=>'Text',
            'description'=>'Link to your resume/cv or portfolio (if not uploaded)',
            'status'=>1,
        ]);

        DB::table('questions')->insert([
            'scope'=>'VA',
            'area_id'=>1,
            'type'=>'E-mail',
            'description'=>'Your Email',
            'status'=>1,
        ]);

        DB::table('questions')->insert([
            'scope'=>'VA',
            'area_id'=>1,
            'type'=>'Text',
            'description'=>'Your Fullname',
            'status'=>1,
        ]);

        DB::table('questions')->insert([
            'scope'=>'VA',
            'area_id'=>1,
            'type'=>'Text',
            'description'=>'Mobile Number',
            'status'=>1,
        ]);

        DB::table('questions')->insert([
            'scope'=>'VA',
            'area_id'=>1,
            'type'=>'Text',
            'description'=>'Mobile Country Code',
            'status'=>1,
        ]);

        DB::table('questions')->insert([
            'scope'=>'VA',
            'area_id'=>1,
            'type'=>'Gender',
            'description'=>'Gender',
            'status'=>1,
        ]);

        DB::table('questions')->insert([
            'scope'=>'VA',
            'area_id'=>1,
            'type'=>'Date',
            'description'=>'Date of Birth',
            'status'=>1,
        ]);

        DB::table('questions')->insert([
            'scope'=>'VA',
            'area_id'=>1,
            'type'=>'Marital Status',
            'description'=>'Marital Status',
            'status'=>1,
        ]);

        DB::table('questions')->insert([
            'scope'=>'VA',
            'area_id'=>1,
            'type'=>'Text',
            'description'=>'Nationality',
            'status'=>1,
        ]);

        DB::table('questions')->insert([
            'scope'=>'VA',
            'area_id'=>1,
            'type'=>'Text',
            'description'=>'Province Of Residence',
            'status'=>1,
        ]);

        DB::table('questions')->insert([
            'scope'=>'VA',
            'area_id'=>1,
            'type'=>'Country',
            'description'=>'Country Of Residence',
            'status'=>1,
        ]);

        DB::table('questions')->insert([
            'scope'=>'VA',
            'area_id'=>1,
            'type'=>'Number',
            'description'=>'Dependents',
            'status'=>1,
        ]);

        DB::table('questions')->insert([
            'scope'=>'VA',
            'area_id'=>1,
            'type'=>'Textarea',
            'description'=>'Please provide a short summary',
            'status'=>1,
        ]);

        DB::table('questions')->insert([
            'scope'=>'VA',
            'area_id'=>1,
            'type'=>'Textarea',
            'description'=>'Tell us more about you',
            'status'=>1,
        ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>2,
        //     'type'=>'Text',
        //     'description'=>'Professional title',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>2,
        //     'type'=>'Dropdown',
        //     'description'=>'Are you actively looking for an online job?',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>2,
        //     'type'=>'Dropdown',
        //     'description'=>'How soon do you want an online job?',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>2,
        //     'type'=>'Dropdown',
        //     'description'=>'What type of online job are you looking for?',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>2,
        //     'type'=>'Dropdown',
        //     'description'=>'Whats your preferred work schedule?',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>2,
        //     'type'=>'Dropdown',
        //     'description'=>'What is your monthly salary expectation?',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>3,
        //     'type'=>'Dropdown',
        //     'description'=>'Highest level of education achieved',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>3,
        //     'type'=>'Text',
        //     'description'=>'What is your diploma or degree (if any) or write "none"',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>3,
        //     'type'=>'Dropdown',
        //     'description'=>'How many years of work experience do you have? - Offline',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>3,
        //     'type'=>'Dropdown',
        //     'description'=>'How many years of work experience do you have? - Online',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>3,
        //     'type'=>'Text',
        //     'description'=>'Name of the Company',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>3,
        //     'type'=>'Dropdown',
        //     'description'=>'What is the highest position that you have held in your career?',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>3,
        //     'type'=>'Text',
        //     'description'=>'onlinejobs.ph profile (link)',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>3,
        //     'type'=>'Dropdown',
        //     'description'=>'What is your current employment status?',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>4,
        //     'type'=>'Ranking',
        //     'description'=>'Skills and work experience - Editorial',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>4,
        //     'type'=>'Ranking',
        //     'description'=>'Skills and work experience - Marketing',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>4,
        //     'type'=>'Ranking',
        //     'description'=>'Skills and work experience - Admin',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>4,
        //     'type'=>'Ranking',
        //     'description'=>'Skills and work experience - Finance',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>4,
        //     'type'=>'Ranking',
        //     'description'=>'Skills and work experience - Design',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>4,
        //     'type'=>'Ranking',
        //     'description'=>'Skills and work experience - Sales / CRM',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>4,
        //     'type'=>'Ranking',
        //     'description'=>'What you most enjoy - Editorial',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>4,
        //     'type'=>'Ranking',
        //     'description'=>'What you most enjoy - Marketing',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>4,
        //     'type'=>'Ranking',
        //     'description'=>'What you most enjoy - Admin',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>4,
        //     'type'=>'Ranking',
        //     'description'=>'What you most enjoy - Finance',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>4,
        //     'type'=>'Ranking',
        //     'description'=>'What you most enjoy - Design',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>4,
        //     'type'=>'Ranking',
        //     'description'=>'What you most enjoy - Sales / CRM',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>4,
        //     'type'=>'Yes/No',
        //     'description'=>'Are you able to make or receive phone calls as part of your role?',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>4,
        //     'type'=>'Dropdown',
        //     'description'=>'English language proficiency level',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>5,
        //     'type'=>'Text',
        //     'description'=>'What is your main career goal for 2017?',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>5,
        //     'type'=>'Text',
        //     'description'=>'How can an online job best support you in achieving your goal?',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>5,
        //     'type'=>'Text',
        //     'description'=>'What is the biggest challenge in your career right now?',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>5,
        //     'type'=>'Text',
        //     'description'=>'How can an online job best support you in overcoming this challenge?',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>5,
        //     'type'=>'Ranking',
        //     'description'=>'Importance - Wealth',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>5,
        //     'type'=>'Ranking',
        //     'description'=>'Importance - Success',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>5,
        //     'type'=>'Ranking',
        //     'description'=>'Importance - Freedom',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>5,
        //     'type'=>'Ranking',
        //     'description'=>'Importance - Stability',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>6,
        //     'type'=>'Dropdown',
        //     'description'=>'Which sites do you currently use to look for online jobs?',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>6,
        //     'type'=>'Text',
        //     'description'=>'What was your experience using these sites',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>6,
        //     'type'=>'Dropdown',
        //     'description'=>'Which do you consider the biggest employment challenge for women in Philippines?',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>6,
        //     'type'=>'Yes/No',
        //     'description'=>'Are these problems that you have personally experienced?',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>6,
        //     'type'=>'Dropdown',
        //     'description'=>'Which of these areas will you be investing in for yourself in next year',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>6,
        //     'type'=>'Dropdown',
        //     'description'=>'How did you find out about Connected Women?',
        //     'status'=>1,
        // ]);

        // DB::table('questions')->insert([
        //     'scope'=>'VA',
        //     'area_id'=>6,
        //     'type'=>'Text',
        //     'description'=>'Any comments or feedback?',
        //     'status'=>1,
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>2,
        //     'description'=>'Im actively seeking an online job',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>2,
        //     'description'=>'I plan to find an online job in the future',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>2,
        //     'description'=>'Im still considering an online job',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>3,
        //     'description'=>'Immediately',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>3,
        //     'description'=>'Within 1 month',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>3,
        //     'description'=>'Within 3 months',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>4,
        //     'description'=>'Full-Time Home-Based Work (Fixed Hours)',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>4,
        //     'description'=>'Part-Time Home-Based Work (Fixed Hours)',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>4,
        //     'description'=>'Freelance Home-Based Work (Flexible Hours)',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>5,
        //     'description'=>'Mon - Fri | 9am to 6pm | PH Time (GMT +8)',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>5,
        //     'description'=>'Mon - Fri | 9am to 1pm | PH Time (GMT +8)',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>5,
        //     'description'=>'Mon - Fri | 2pm to 6pm | PH Time (GMT +8)',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>6,
        //     'description'=>'15,000-20,000 PHP',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>6,
        //     'description'=>'20,000-25,000 PHP',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>6,
        //     'description'=>'25,000-30,000 PHP',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>7,
        //     'description'=>'High School',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>7,
        //     'description'=>'Vocational',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>7,
        //     'description'=>'College Degree',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>7,
        //     'description'=>'Post Graduate',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>9,
        //     'description'=>'Offline Work - None',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>9,
        //     'description'=>'Offline Work - 0-1 year',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>9,
        //     'description'=>'Offline Work - 1-2 years',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>9,
        //     'description'=>'Offline Work - 2-5 years',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>9,
        //     'description'=>'Offline Work - 5+ years',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>10,
        //     'description'=>'Online Work - 0-1 years',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>10,
        //     'description'=>'Online Work - 1-2 years',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>10,
        //     'description'=>'Online Work - 2-5 years',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>10,
        //     'description'=>'Online Work - 5+ years',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>12,
        //     'description'=>'Senior Manager',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>12,
        //     'description'=>'Manager/Supervisor',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>12,
        //     'description'=>'Team Leader',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>12,
        //     'description'=>'General Staff',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>29,
        //     'description'=>'Unemployed',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>29,
        //     'description'=>'Employed Part-Time',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>29,
        //     'description'=>'Employed Full-Time',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>29,
        //     'description'=>'Freelancing',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>30,
        //     'description'=>'1 - No Experience',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>30,
        //     'description'=>'2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>30,
        //     'description'=>'3',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>30,
        //     'description'=>'4 - Highly Experienced',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>31,
        //     'description'=>'1 - No Experience',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>31,
        //     'description'=>'2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>31,
        //     'description'=>'3',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>31,
        //     'description'=>'4 - Highly Experienced',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>32,
        //     'description'=>'1 - No Experience',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>32,
        //     'description'=>'2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>32,
        //     'description'=>'3',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>32,
        //     'description'=>'4 - Highly Experienced',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>33,
        //     'description'=>'1 - No Experience',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>33,
        //     'description'=>'2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>33,
        //     'description'=>'3',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>33,
        //     'description'=>'4 - Highly Experienced',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>34,
        //     'description'=>'1 - No Experience',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>34,
        //     'description'=>'2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>34,
        //     'description'=>'3',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>34,
        //     'description'=>'4 - Highly Experienced',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>35,
        //     'description'=>'1 - No Experience',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>35,
        //     'description'=>'2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>35,
        //     'description'=>'3',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>35,
        //     'description'=>'4 - Highly Experienced',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>36,
        //     'description'=>'1 - No Experience',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>36,
        //     'description'=>'2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>36,
        //     'description'=>'3',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>36,
        //     'description'=>'4 - Highly Experienced',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>37,
        //     'description'=>'1 - No Experience',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>37,
        //     'description'=>'2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>37,
        //     'description'=>'3',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>37,
        //     'description'=>'4 - Highly Experienced',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>38,
        //     'description'=>'1 - No Experience',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>38,
        //     'description'=>'2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>38,
        //     'description'=>'3',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>38,
        //     'description'=>'4 - Highly Experienced',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>24,
        //     'description'=>'1 - No Experience',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>24,
        //     'description'=>'2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>24,
        //     'description'=>'3',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>24,
        //     'description'=>'4 - Highly Experienced',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>25,
        //     'description'=>'1 - No Experience',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>25,
        //     'description'=>'2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>25,
        //     'description'=>'3',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>25,
        //     'description'=>'4 - Highly Experienced',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>26,
        //     'description'=>'1 - No Experience',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>26,
        //     'description'=>'2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>26,
        //     'description'=>'3',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>26,
        //     'description'=>'4 - Highly Experienced',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>27,
        //     'description'=>'Yes',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>27,
        //     'description'=>'No',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>28,
        //     'description'=>'A1',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>28,
        //     'description'=>'A2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>28,
        //     'description'=>'B1',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>28,
        //     'description'=>'B2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>28,
        //     'description'=>'C1',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>28,
        //     'description'=>'C2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>33,
        //     'description'=>'1 - Least Important',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>33,
        //     'description'=>'2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>33,
        //     'description'=>'3',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>33,
        //     'description'=>'4 Most Important',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>34,
        //     'description'=>'1 - Least Important',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>34,
        //     'description'=>'2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>34,
        //     'description'=>'3',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>34,
        //     'description'=>'4 Most Important',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>35,
        //     'description'=>'1 - Least Important',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>35,
        //     'description'=>'2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>35,
        //     'description'=>'3',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>35,
        //     'description'=>'4 Most Important',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>36,
        //     'description'=>'1 - Least Important',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>36,
        //     'description'=>'2',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>36,
        //     'description'=>'3',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>36,
        //     'description'=>'4 Most Important',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>37,
        //     'description'=>'Onlinejobs.PH',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>37,
        //     'description'=>'Upwork',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>37,
        //     'description'=>'Freelancer',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>37,
        //     'description'=>'None',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>39,
        //     'description'=>'Location from available jobs/travel',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>39,
        //     'description'=>'Family/parenting commitments',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>39,
        //     'description'=>'Not enough suitable jobs available',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>39,
        //     'description'=>'Lack of education/qualifications/skills',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>39,
        //     'description'=>'Access to trainings/resources/tools',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>40,
        //     'description'=>'Yes',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>40,
        //     'description'=>'No',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>41,
        //     'description'=>'Internet',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>41,
        //     'description'=>'Computer',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>41,
        //     'description'=>'Education',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>41,
        //     'description'=>'Vehicle',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>41,
        //     'description'=>'Property',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>41,
        //     'description'=>'Savings',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>42,
        //     'description'=>'Facebook',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>42,
        //     'description'=>'Friends',
        // ]);

        // DB::table('choices')->insert([
        //     'question_id'=>42,
        //     'description'=>'Search',
        // ]);

        DB::table('verifications')->insert([
            'user_id'=>1,
            'status'=>1,
        ]);

        // factory(App\User::class, 60)->create();

    }
}
