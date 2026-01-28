@extends('app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
</head>
<body>
<h2>Đăng ký tài khoản</h2>
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<form method="POST" action="{{ route('check.signIn') }}">
    @csrf

    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    Re-Password: <input type="password" name="repass" required><br><br>
    MSSV: <input type="text" name="mssv" required><br><br>
    Lớp môn học: <input type="text" name="lopmonhoc" required><br><br>

    Giới tính:
    <select name="gioitinh" required>
        <option value="nam">Nam</option>
        <option value="nu">Nữ</option>
    </select>
    <br><br>
    {{-- Tuổi:  <input type="number" class="form-control" id="age" name="age" required><br><br> --}}
    <button type="submit">Sign In</button>
</form>

</body>
</html>
@endsection