@extends('admin::inc/header')
@section('title', 'Product detail')


@section('content')
<div class="content-container">
    <div class="cms-body">
		<p>Product details</p>
		<p>Name is: {{ $product->name }}</p>
    <p>status is: {{ $product->status }}</p>
    <a href="/admin/products">Go back</a>
	</div>
</div>
@endsection
