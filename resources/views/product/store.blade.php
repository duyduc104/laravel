@extends('app')

@section('content')

<p>@json($data)</p>
<a href="{{ route('product.index') }}">Quay lại</a>
@endsection