<?php

namespace Database\Seeders;

use App\Models\Resume;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class ResumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resume = Resume::create([
            'user_id' => 1,
            'father_name' => 'ماهان',
            'national_code' => '0012345678',
            'phone' => '02187654321',
            'bank_name' => 'Bank Melli',
            'sheba_number' => 'IR123456789012345678901234',
            'address' => 'Tehran, Iran',
            // 'cooperation_with_other_company' => true,
            // 'other_company_name' => 'Company XYZ',
            'personal_image' => 'personal.jpg',
            'national_card_image' => 'national_card.jpg',
            'residence_document_image' => 'residence_document.jpg',
            'work_experience' => '5 years of experience in cleaning.',
            'status' => 'approved',
            'commission_rate' => 75.00,
        ]);

        // ایجاد توانایی‌ها
        $skill = Skill::create([
            'name' => 'نظافت'
            // ['name' => 'شستشو'],
            // ['name' => 'باغبانی'],
        ]);

        // اتصال توانایی‌ها به رزومه
        $resume->skills()->attach($skill->id);
    }
}
