Hi {{ $username }},

<p>Please click the link to activate your account : </p>

{{ route('users/confirmation', $token) }}