@component('mail::message')

# Thank you for contacting us

<strong>Name: </strong> {{ $data['name'] }} <br>
<strong>Email: </strong> {{ $data['email'] }} <br>
<strong>Phone: </strong> {{ $data['phone'] }} <br>

<strong>Message:</strong> <br>
{{ $data['message'] }}


@endcomponent
