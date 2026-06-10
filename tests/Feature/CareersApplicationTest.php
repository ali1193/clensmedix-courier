<?php

namespace Tests\Feature;

use App\Mail\ContractorApplicationNotification;
use App\Models\ContractorApplication;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CareersApplicationTest extends TestCase
{
    use RefreshDatabase;

    public function test_careers_apply_page_loads(): void
    {
        $this->get(route('careers.apply'))
            ->assertOk()
            ->assertSeeText('Contractor')
            ->assertSeeText('Application');
    }

    public function test_careers_application_submission_succeeds(): void
    {
        Mail::fake();
        Storage::fake('public');

        $payload = [
            'full_name' => 'Test Applicant',
            'email' => 'test.applicant@example.com',
            'phone' => '832-555-0100',
            'hours_available' => 'Mon-Fri 8am-6pm',
            'preferred_service_areas' => 'Houston, Katy, Cypress',
            'has_courier_experience' => '1',
            'courier_experience_description' => '3 years local delivery experience',
            'has_medical_experience' => '0',
            'has_smartphone_gps' => '1',
            'comfortable_with_apps' => '1',
            'emergency_contact_name' => 'Jane Applicant',
            'emergency_contact_relationship' => 'Spouse',
            'emergency_contact_phone' => '832-555-0101',
            'contractor_acknowledgment' => '1',
            'information_certification' => '1',
            'applicant_signature' => 'Test Applicant',
            'application_date' => '2026-06-10',
            'drivers_license' => UploadedFile::fake()->image('license.jpg'),
            'vehicle_registration' => UploadedFile::fake()->image('registration.jpg'),
            'auto_insurance' => UploadedFile::fake()->image('insurance.jpg'),
            'vehicle_photos' => [
                UploadedFile::fake()->image('front.jpg'),
                UploadedFile::fake()->image('side.jpg'),
                UploadedFile::fake()->image('interior.jpg'),
            ],
        ];

        $response = $this->withoutMiddleware()->post(route('careers.apply.submit'), $payload);

        $response->assertRedirect(route('careers.apply'));
        $response->assertSessionHas('success');

        $this->assertDatabaseCount('contractor_applications', 1);

        $application = ContractorApplication::first();
        $this->assertSame('Test Applicant', $application->full_name);
        $this->assertTrue($application->has_courier_experience);
        $this->assertFalse($application->has_medical_experience);
        $this->assertCount(3, $application->vehicle_photos_paths);

        Storage::disk('public')->assertExists($application->drivers_license_path);
        Storage::disk('public')->assertExists($application->vehicle_registration_path);
        Storage::disk('public')->assertExists($application->auto_insurance_path);

        Mail::assertSent(ContractorApplicationNotification::class);
    }

    public function test_careers_application_validation_fails_without_required_fields(): void
    {
        $response = $this->withoutMiddleware()->post(route('careers.apply.submit'), []);

        $response->assertSessionHasErrors([
            'full_name',
            'email',
            'phone',
            'hours_available',
            'preferred_service_areas',
            'drivers_license',
        ]);

        $this->assertDatabaseCount('contractor_applications', 0);
    }

    public function test_courier_experience_description_required_when_yes(): void
    {
        Storage::fake('public');

        $payload = [
            'full_name' => 'Test Applicant',
            'email' => 'test.applicant@example.com',
            'phone' => '832-555-0100',
            'hours_available' => 'Mon-Fri 8am-6pm',
            'preferred_service_areas' => 'Houston',
            'has_courier_experience' => '1',
            'has_medical_experience' => '0',
            'has_smartphone_gps' => '1',
            'comfortable_with_apps' => '1',
            'emergency_contact_name' => 'Jane Applicant',
            'emergency_contact_relationship' => 'Spouse',
            'emergency_contact_phone' => '832-555-0101',
            'contractor_acknowledgment' => '1',
            'information_certification' => '1',
            'applicant_signature' => 'Test Applicant',
            'application_date' => '2026-06-10',
            'drivers_license' => UploadedFile::fake()->image('license.jpg'),
            'vehicle_registration' => UploadedFile::fake()->image('registration.jpg'),
            'auto_insurance' => UploadedFile::fake()->image('insurance.jpg'),
            'vehicle_photos' => [UploadedFile::fake()->image('front.jpg')],
        ];

        $response = $this->withoutMiddleware()->post(route('careers.apply.submit'), $payload);

        $response->assertSessionHasErrors('courier_experience_description');
    }
}
