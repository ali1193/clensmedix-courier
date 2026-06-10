<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contractor_applications', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('hours_available');
            $table->text('preferred_service_areas');
            $table->boolean('has_courier_experience');
            $table->text('courier_experience_description')->nullable();
            $table->boolean('has_medical_experience');
            $table->text('medical_experience_explanation')->nullable();
            $table->boolean('has_smartphone_gps');
            $table->boolean('comfortable_with_apps');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_relationship');
            $table->string('emergency_contact_phone');
            $table->string('applicant_signature');
            $table->date('application_date');
            $table->string('drivers_license_path');
            $table->string('vehicle_registration_path');
            $table->string('auto_insurance_path');
            $table->json('vehicle_photos_paths');
            $table->string('resume_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contractor_applications');
    }
};
