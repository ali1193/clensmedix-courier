<p>You have received a new website inquiry.</p>

<p><strong>Name:</strong> {{ $submission->name }}</p>
<p><strong>Email:</strong> {{ $submission->email ?? '—' }}</p>
<p><strong>Phone:</strong> {{ $submission->phone ?? '—' }}</p>
<p><strong>Pickup location:</strong> {{ $submission->pickup_location ?? '—' }}</p>
<p><strong>Delivery location:</strong> {{ $submission->delivery_location ?? '—' }}</p>
<p><strong>Package type:</strong> {{ $submission->package_type ?? '—' }}</p>
<p><strong>Preferred pickup time:</strong> {{ $submission->preferred_pickup_time ?? '—' }}</p>
<p><strong>Source:</strong> {{ $submission->source ?? '—' }}</p>

<p><strong>Message:</strong></p>
<p>{!! nl2br(e($submission->message ?? '—')) !!}</p>

