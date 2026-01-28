@extends('app')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Nhập tuổi</title>
</head>
<body>
<h2>Nhập tuổi của bạn</h2>

<form method="POST" action="{{ route('age.check') }}">
    @csrf
    Tuổi: <input type="text" name="age">
    <button type="submit">Gửi</button>
</form>

</body>
</html>
@endsection