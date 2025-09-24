<x-mail::message>
	{{-- hero image --}}
	<p align="center">
		<img src="{{ asset('images/email-hero.jpg') }}" alt="" width="600" style="max-width:100%; border-radius:12px;">
	</p>

	# New Contact
	Name: {{ $m->name }}

	Email: {{ $m->address }}

	Subject: {{ $m->subject ?? '—' }}

	Message:
	{{ $m->message }}
</x-mail::message>