<!DOCTYPE html>
<html>
<head>
    <title>Prospector theater</title>

</head>

<body>
<h3>Hello {{ $name }},</h3>

<p>Your Qr code</p>


<br />
<br />
<br />
<img src="{{ asset('storage/'.$qr) }}" />
{{--{!! $qr !!}--}}

<p>Thank you,</p>
<br />
<p>Sanjay Dhali</p>
</body>
</html>