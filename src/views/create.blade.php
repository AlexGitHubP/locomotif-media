@extends('admin::inc/header')
@section('title', 'Adaugă media')
@include('admin::inc/generalErrors')

@section('content')
<div class='details-bar'><!--details-bar-->
	<div class='details-left'>
		<h2>Adaugă media</h2>
	</div>
	<div class='details-center'>
		
	</div>
	<div class='details-right'>
		<a class='general-btn backBtn' href="/admin/media">Înapoi</a>	
	</div>
</div><!--details-bar-->

<div>
	<div class='media-element' id='mediaTemplate'>
		<div class='media-item'>
			<div class='uploadStatus'>
				<span>✔</span>
			</div>
			<div class='media-image'>
				<img data-dz-thumbnail>
			</div>
			<div class='media-content'>
				<p data-dz-name class='mediaName'></p>
				<p data-dz-size></p>
			</div>
			<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
				<div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
			</div>
			<p class="dz-error-message" data-dz-errormessage></p>
			<div class='media-buttons'>
				<a href="" data-dz-remove class='general-btn media-delete'>Șterge</a>
			</div>
		</div>
		
	</div><!--media-element-->
</div>

<div class="content-container">
    <div class="cms-body">
	<form method="POST" action='/admin/media/' enctype="multipart/form-data">
		@csrf
		
		<div class='dropzoneArea' data-postUrl='/admin/media/'>
			<p class='general-btn addMediaBtn'>Click pentru a adăuga elemente media</p>
		</div>

		<div class='dropzonePreview'></div>

		<input class="general-btn mediaUpload" type="submit" value="Adaugă elementele media">
	</form>
	</div>
</div>


@endsection
