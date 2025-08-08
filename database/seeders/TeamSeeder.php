<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update existing teams or create new ones with complete CMS data
        $teamsData = [
            [
                'name' => 'Sarah Johnson',
                'position' => 'Creative Director',
                'company' => 'Design Studio Pro',
                'bio' => 'Creative visionary with 15+ years of experience in branding and digital design.',
                'phone' => '+1 555-0123',
                'email' => 'sarah.johnson@designstudio.com',
                'availability' => '9:00AM - 6:00PM',
                'experience' => 'More Than 15 Years',
                'facebook' => 'https://facebook.com/sarahjohnsondesign',
                'twitter' => 'https://twitter.com/sarahdesigns',
                'instagram' => 'https://instagram.com/sarahcreative',
                'linkedin' => 'https://linkedin.com/in/sarahjohnsondesign',
                'personal_biography' => 'Sarah is a passionate creative director who has worked with Fortune 500 companies to create compelling brand experiences. Her innovative approach to design has earned her numerous industry awards and recognition.',
                'professional_skills_description' => 'Sarah specializes in brand strategy, visual identity design, and digital marketing campaigns. She has a proven track record of increasing brand awareness and engagement through creative solutions.',
                'skills' => [
                    ['name' => 'Brand Strategy', 'percentage' => 98],
                    ['name' => 'Visual Design', 'percentage' => 95],
                    ['name' => 'Digital Marketing', 'percentage' => 90],
                    ['name' => 'Team Leadership', 'percentage' => 93]
                ],
                'activities_description' => 'Sarah actively participates in design communities and mentors young designers. She regularly speaks at design conferences and workshops.',
                'activities_list' => [
                    'Leading creative teams across multiple projects',
                    'Mentoring junior designers and interns',
                    'Speaking at international design conferences',
                    'Contributing to design publications and blogs'
                ],
                'educational_qualification' => 'Sarah holds a Master\'s degree in Graphic Design from Rhode Island School of Design and has completed advanced courses in Digital Marketing and Brand Strategy.',
                'experience_timeline' => [
                    ['position' => 'Creative Director', 'company' => 'Design Studio Pro', 'period' => '2018 - Present', 'order' => 1],
                    ['position' => 'Senior Art Director', 'company' => 'Global Creative Agency', 'period' => '2014 - 2018', 'order' => 2],
                    ['position' => 'Art Director', 'company' => 'Boutique Design Firm', 'period' => '2010 - 2014', 'order' => 3],
                    ['position' => 'Graphic Designer', 'company' => 'Creative Collective', 'period' => '2008 - 2010', 'order' => 4]
                ],
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'name' => 'Michael Chen',
                'position' => 'Technical Lead',
                'company' => 'CloudTech Solutions',
                'bio' => 'Full-stack developer and technical architect with expertise in cloud technologies.',
                'phone' => '+1 555-0124',
                'email' => 'michael.chen@cloudtech.com',
                'availability' => '8:00AM - 5:00PM',
                'experience' => 'More Than 12 Years',
                'facebook' => 'https://facebook.com/michaelchentech',
                'twitter' => 'https://twitter.com/mchen_dev',
                'instagram' => 'https://instagram.com/michaelchencode',
                'linkedin' => 'https://linkedin.com/in/michaelchentech',
                'personal_biography' => 'Michael is a seasoned technical lead with extensive experience in building scalable web applications and cloud infrastructure. He is passionate about clean code and modern development practices.',
                'professional_skills_description' => 'Michael has deep expertise in cloud-native development, microservices architecture, and DevOps practices. He has successfully led multiple digital transformation projects.',
                'skills' => [
                    ['name' => 'Cloud Architecture', 'percentage' => 96],
                    ['name' => 'Full-Stack Development', 'percentage' => 94],
                    ['name' => 'DevOps & CI/CD', 'percentage' => 92],
                    ['name' => 'Team Management', 'percentage' => 88]
                ],
                'activities_description' => 'Michael is an active contributor to open-source projects and regularly participates in tech meetups and conferences.',
                'activities_list' => [
                    'Leading architecture design and code reviews',
                    'Contributing to open-source projects',
                    'Organizing tech meetups and workshops',
                    'Mentoring junior developers and engineers'
                ],
                'educational_qualification' => 'Michael holds a Bachelor\'s degree in Computer Science from UC Berkeley and has multiple cloud certifications from AWS and Google Cloud.',
                'experience_timeline' => [
                    ['position' => 'Technical Lead', 'company' => 'CloudTech Solutions', 'period' => '2020 - Present', 'order' => 1],
                    ['position' => 'Senior Software Engineer', 'company' => 'Tech Innovations Inc', 'period' => '2017 - 2020', 'order' => 2],
                    ['position' => 'Software Engineer', 'company' => 'Digital Products Co', 'period' => '2014 - 2017', 'order' => 3],
                    ['position' => 'Junior Developer', 'company' => 'Startup Hub', 'period' => '2012 - 2014', 'order' => 4]
                ],
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'name' => 'Emily Rodriguez',
                'position' => 'UX/UI Designer',
                'company' => 'User Experience Lab',
                'bio' => 'User experience specialist focused on creating intuitive and accessible digital products.',
                'phone' => '+1 555-0125',
                'email' => 'emily.rodriguez@uxlab.com',
                'availability' => '10:00AM - 6:00PM',
                'experience' => 'More Than 8 Years',
                'facebook' => 'https://facebook.com/emilyuxdesign',
                'twitter' => 'https://twitter.com/emily_ux',
                'instagram' => 'https://instagram.com/emilydesignux',
                'linkedin' => 'https://linkedin.com/in/emilyrodriguezux',
                'personal_biography' => 'Emily is a user experience designer who believes in the power of human-centered design. She has worked on products used by millions of users worldwide.',
                'professional_skills_description' => 'Emily specializes in user research, interaction design, and usability testing. She has a strong background in design systems and accessibility standards.',
                'skills' => [
                    ['name' => 'User Research', 'percentage' => 94],
                    ['name' => 'Interaction Design', 'percentage' => 92],
                    ['name' => 'Prototyping', 'percentage' => 90],
                    ['name' => 'Design Systems', 'percentage' => 88]
                ],
                'activities_description' => 'Emily is passionate about design accessibility and regularly conducts workshops on inclusive design practices.',
                'activities_list' => [
                    'Conducting user research and usability testing',
                    'Creating comprehensive design systems',
                    'Teaching accessibility workshops',
                    'Participating in design critique sessions'
                ],
                'educational_qualification' => 'Emily holds a Master\'s degree in Human-Computer Interaction from Carnegie Mellon University and is certified in accessibility design.',
                'experience_timeline' => [
                    ['position' => 'Senior UX/UI Designer', 'company' => 'User Experience Lab', 'period' => '2019 - Present', 'order' => 1],
                    ['position' => 'UX Designer', 'company' => 'Digital Design Agency', 'period' => '2017 - 2019', 'order' => 2],
                    ['position' => 'UI Designer', 'company' => 'Mobile App Studio', 'period' => '2015 - 2017', 'order' => 3],
                    ['position' => 'Design Intern', 'company' => 'Creative Workshop', 'period' => '2014 - 2015', 'order' => 4]
                ],
                'is_active' => true,
                'sort_order' => 3
            ]
        ];

        foreach ($teamsData as $teamData) {
            Team::updateOrCreate(
                ['email' => $teamData['email']], // Use email as unique identifier
                $teamData
            );
        }
    }
}
