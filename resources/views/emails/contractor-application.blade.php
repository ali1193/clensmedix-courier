<p>You have received a new independent contractor application.</p>

<h3>Applicant Information</h3>
<p><strong>Full Name:</strong> {{ $application->full_name }}</p>
<p><strong>Email:</strong> {{ $application->email }}</p>
<p><strong>Phone:</strong> {{ $application->phone }}</p>
<p><strong>Signature:</strong> {{ $application->applicant_signature }}</p>
<p><strong>Date:</strong> {{ $application->application_date->format('F j, Y') }}</p>

<h3>Availability</h3>
<p><strong>Hours Available:</strong> {{ $application->hours_available }}</p>
<p><strong>Preferred Service Area(s):</strong></p>
<p>{!! nl2br(e($application->preferred_service_areas)) !!}</p>

<h3>Experience</h3>
<p><strong>Previous courier or delivery experience:</strong> {{ $application->has_courier_experience ? 'Yes' : 'No' }}</p>
@if ($application->has_courier_experience && $application->courier_experience_description)
<p><strong>Courier experience description:</strong></p>
<p>{!! nl2br(e($application->courier_experience_description)) !!}</p>
@endif
<p><strong>Medical specimens or sensitive deliveries experience:</strong> {{ $application->has_medical_experience ? 'Yes' : 'No' }}</p>
@if ($application->has_medical_experience && $application->medical_experience_explanation)
<p><strong>Medical experience explanation:</strong></p>
<p>{!! nl2br(e($application->medical_experience_explanation)) !!}</p>
@endif

<h3>Technology &amp; Communication</h3>
<p><strong>Smartphone with GPS capability:</strong> {{ $application->has_smartphone_gps ? 'Yes' : 'No' }}</p>
<p><strong>Comfortable using delivery and routing apps:</strong> {{ $application->comfortable_with_apps ? 'Yes' : 'No' }}</p>

<h3>Emergency Contact</h3>
<p><strong>Name:</strong> {{ $application->emergency_contact_name }}</p>
<p><strong>Relationship:</strong> {{ $application->emergency_contact_relationship }}</p>
<p><strong>Phone:</strong> {{ $application->emergency_contact_phone }}</p>

<p><em>Required documents are attached to this email.</em></p>
