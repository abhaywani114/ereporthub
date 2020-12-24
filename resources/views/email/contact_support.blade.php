@extends('email.template')

@section('content')
You received a message from : {{ $data['name'] }}
 
<p>
Name: {{ $data['name'] }}
</p>
 
<p>
Email: {{ $data['email'] }}
</p>

<p>
Subject: {{ $data['subject'] }}
</p>
 
<p>
Message: {!! nl2br($data['message']) !!}
</p>
----------End of message------
@endsection