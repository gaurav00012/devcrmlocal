<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p>Dear {{$client['company_name']}},</p>
<p><br></p>
<p>Congratulations! Your account with {{$client['company_name']}} has been created.</p>
<p><br></p>
<p>You can manage your projects &amp; tasks from the following link: <a href="{{ url($user['slug']) }}">{{ url( $user['slug']) }}</a></p>
<p><br></p>
<p>Your email is : {{$user['email']}}</p>
<p>Your password is: {{$user['text_password']}}</p>
<p><br></p>
<p>Thank You!</p>
</body>
</html>