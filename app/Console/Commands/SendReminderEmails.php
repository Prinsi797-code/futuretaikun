<?php

namespace App\Console\Commands;

use App\Models\Investor;
use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Entrepreneur;
use App\Models\Setting;
use App\Mail\ReminderMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder emails to users with incomplete profiles after specified days';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emailsSent = 0;
        $reminderDays = Setting::where('key', 'reminder_days')->value('value');
        $reminderDate = now()->subDays($reminderDays)->toDateString();

        // Fetch entrepreneurs registered on the reminder date
        $entrepreneurs = Entrepreneur::whereDate('created_at', $reminderDate)->get();
        foreach ($entrepreneurs as $entrepreneur) {
            $incompleteFields = $this->getIncompleteFields($entrepreneur);
            if (!empty($incompleteFields)) {
                $this->sendReminderEmail($entrepreneur->email, $incompleteFields, 'Entrepreneur');
            }
            // $ php artisan reminder:send
            // if (!empty($incompleteFields)) {
            //     $this->sendReminderEmail($entrepreneur->email, $incompleteFields, 'Entrepreneur');
            //     $emailsSent++;
            //     $this->info("Reminder email sent to: {$entrepreneur->email} (Type: Entrepreneur)");
            // }
        }

        // Fetch investors registered on the reminder date
        $investors = Investor::whereDate('created_at', $reminderDate)->get();
        foreach ($investors as $investor) {
            $incompleteFields = $this->getIncompleteFields($investor);
            if (!empty($incompleteFields)) {
                $this->sendReminderEmail($investor->email, $incompleteFields, 'Investor');
            }
            // if (!empty($incompleteFields)) {
            //     $this->sendReminderEmail($investor->email, $incompleteFields, 'Investor');
            //     $emailsSent++;
            //     $this->info("Reminder email sent to: {$investor->email} (Type: Investor)");
            // }
        }

        // $this->info("Total reminder emails sent: {$emailsSent}");

        $this->info('Reminder emails sent successfully.');
    }

    private function getIncompleteFields($user)
    {
        $incompleteFields = [];

        if ($user instanceof Entrepreneur) {
            $fieldsToCheck = $user->register_business == 0 ? [
                'full_name' => 'Full Name',
                'phone_number' => 'Phone Number',
                'country' => 'Country',
                'business_name' => 'Business Name',
                'industry' => 'Industry',
                'pitch_deck' => 'Pitch Deck',
                'country_code' => 'Country Code',
                'qualification' => 'Qualification',
                'age' => 'Age',
                'current_address' => 'Current Address',
                'city' => 'City',
                'state' => 'State',
                'pin_code' => 'Pin Code',
                'dob' => 'Date of Birth',
                'business_state' => 'Business State',
                'business_city' => 'Business City',
                'business_describe' => 'Business Description',
                'invested_amount' => 'Invested Amount',
                'business_address' => 'Business Address',
                'market_capital' => 'Market Capital',
                'your_stake' => 'Your Stake',
                'stake_funding' => 'Stake Funding',
                'business_logo' => 'Business Logo',
                'product_photos' => 'Product Photos',
                'own_fund' => 'Own Fund',
                'loan' => 'Loan',
                'business_country' => 'Business Country',
                'brand_name' => 'Brand Name',
                'video_upload' => 'Video Upload'
            ] : [
                'full_name' => 'Full Name',
                'phone_number' => 'Phone Number',
                'country' => 'Country',
                'website_links' => 'Website Links',
                'country_code' => 'Country Code',
                'qualification' => 'Qualification',
                'age' => 'Age',
                'current_address' => 'Current Address',
                'city' => 'City',
                'state' => 'State',
                'pin_code' => 'Pin Code',
                'dob' => 'Date of Birth',
                'founder_number' => 'Founder Number',
                'business_year' => 'Business Year',
                'business_year_count' => 'Business Year Count',
                'business_revenue1' => 'Business Revenue 1',
                'business_revenue2' => 'Business Revenue 2',
                'business_revenue3' => 'Business Revenue 3',
                'business_mobile' => 'Business Mobile',
                'business_email' => 'Business Email',
                'registration_type_of_entity' => 'Registration Type of Entity',
                'tax_registration_number' => 'Tax Registration Number',
                'employee_number' => 'Employee Number',
                'y_business_name' => 'Business Name (Year)',
                'y_brand_name' => 'Brand Name (Year)',
                'y_describe_business' => 'Business Description (Year)',
                'y_business_address' => 'Business Address (Year)',
                'y_business_country' => 'Business Country (Year)',
                'y_business_state' => 'Business State (Year)',
                'y_business_city' => 'Business City (Year)',
                'y_zipcode' => 'Zipcode (Year)',
                'y_type_industries' => 'Type Industries (Year)',
                'y_own_fund' => 'Own Fund (Year)',
                'y_loan' => 'Loan (Year)',
                'y_invested_amount' => 'Invested Amount (Year)',
                'y_product_photos' => 'Product Photos (Year)',
                'y_business_logo' => 'Business Logo (Year)',
                'y_pitch_deck' => 'Pitch Deck (Year)',
                'video_upload' => 'Video Upload',
                'y_market_capital' => 'Market Capital (Year)',
                'y_stake_funding' => 'Stake Funding (Year)'
            ];
        } else {
            $fieldsToCheck = $user->existing_company == 0 ? [
                'full_name' => 'Full Name',
                'country_code' => 'Country Code',
                'phone_number' => 'Phone Number',
                'current_address' => 'Current Address',
                'country' => 'Country',
                'city' => 'City',
                'state' => 'State',
                'pin_code' => 'Pin Code',
                'linkedin_profile' => 'LinkedIn Profile',
                'age' => 'Age',
                'dob' => 'Date of Birth',
                'qualification' => 'Qualification',
                'photo' => 'Photo',
                'professional_phone' => 'Professional Phone',
                'company_country_code' => 'Company Country Code',
                'investment_experince' => 'Investment Experience',
                'investor_type' => 'Investor Type',
                'investment_range' => 'Investment Range',
                'preferred_geographies' => 'Preferred Geographies'
            ] : [
                'full_name' => 'Full Name',
                'country_code' => 'Country Code',
                'phone_number' => 'Phone Number',
                'current_address' => 'Current Address',
                'country' => 'Country',
                'city' => 'City',
                'state' => 'State',
                'pin_code' => 'Pin Code',
                'linkedin_profile' => 'LinkedIn Profile',
                'age' => 'Age',
                'dob' => 'Date of Birth',
                'qualification' => 'Qualification',
                'photo' => 'Photo',
                'professional_phone' => 'Professional Phone',
                'company_country_code' => 'Company Country Code',
                'investment_experince' => 'Investment Experience',
                'investor_type' => 'Investor Type',
                'investment_range' => 'Investment Range',
                'preferred_geographies' => 'Preferred Geographies',
                'organization_name' => 'Organization Name',
                'company_address' => 'Company Address',
                'company_country' => 'Company Country',
                'company_state' => 'Company State',
                'company_city' => 'Company City',
                'company_zipcode' => 'Company Zipcode',
                'professional_email' => 'Professional Email',
                'website' => 'Website',
                'tax_registration_number' => 'Tax Registration Number',
                'designation' => 'Designation',
                'business_logo' => 'Business Logo',
                'investor_profile' => 'Investor Profile',
                'preferred_industries' => 'Preferred Industries',
                'preferred_startup_stage' => 'Preferred Startup Stage'
            ];
        }

        foreach ($fieldsToCheck as $field => $displayName) {
            $value = $user->$field;
            if ($this->isFieldEmpty($value)) {
                $incompleteFields[] = $displayName;
            }
        }

        return $incompleteFields;
    }

    private function isFieldEmpty($value)
    {
        if (is_null($value)) {
            return true;
        }
        if (is_string($value) && trim($value) === '') {
            return true;
        }
        if (is_array($value) && empty($value)) {
            return true;
        }
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            if (is_array($decoded) && empty($decoded)) {
                return true;
            }
        }
        return false;
    }

    private function sendReminderEmail($email, $incompleteFields, $userType)
    {
        Mail::send('emails.reminder', [
            'incompleteFields' => $incompleteFields,
            'userType' => $userType
        ], function ($message) use ($email) {
            $message->to($email)
                ->subject('Complete Your Profile');
        });
    }
}