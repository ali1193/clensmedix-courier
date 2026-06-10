<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractorApplication extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'hours_available',
        'preferred_service_areas',
        'has_courier_experience',
        'courier_experience_description',
        'has_medical_experience',
        'medical_experience_explanation',
        'has_smartphone_gps',
        'comfortable_with_apps',
        'emergency_contact_name',
        'emergency_contact_relationship',
        'emergency_contact_phone',
        'applicant_signature',
        'application_date',
        'drivers_license_path',
        'vehicle_registration_path',
        'auto_insurance_path',
        'vehicle_photos_paths',
        'resume_path',
    ];

    protected function casts(): array
    {
        return [
            'has_courier_experience' => 'boolean',
            'has_medical_experience' => 'boolean',
            'has_smartphone_gps' => 'boolean',
            'comfortable_with_apps' => 'boolean',
            'vehicle_photos_paths' => 'array',
            'application_date' => 'date',
        ];
    }
}
