@extends('admin::inc/header')
@section('title', 'Media lists')


@section('content')
<div class='details-list'><!--details-list-->
	<div class='details-left'>
		<h2>Elemente media</h2>
	</div>
	<div class='details-right'>
		
	</div>
</div><!--details-list-->
<div class='filter-tab'>
	<form method='POST' action='' class='filter-form'>
		<div class='filter-element flexed align-center-flex'>
			<p>Arată:</p>
			<div class='filter-hold'>
				<select name="items" id="items" value=''>
					<option value="10">10</option>
					<option value="50">50</option>
					<option value="100">100</option>
				</select>
			</div>
		</div><!--filter-element-->
		<div class='filter-element'>
			<div class='filter-hold'>
				<select name="category" id="category" value=''>
					<option value="10">10</option>
					<option value="50">50</option>
					<option value="100">100</option>
				</select>
			</div>
		</div><!--filter-element-->
		<div class='filter-element flexed align-center-flex'>
			<div class='filter-hold'>
				<select name="status" id="status" value=''>
					<option value="All">All</option>
					<option value="Published">Published</option>
					<option value="Hidden">Hidden</option>
				</select>
			</div>
		</div><!--filter-element-->
		
	</form>
	<div class='actions-tab'>
		<ul class='action-controls'>
			<li>
				<a href="/admin/media/create" class='iconControl'>
					<span>
						<svg id="Plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12">
							<path id="Plus-2" data-name="Plus" d="M11,5A1,1,0,0,0,9,5V9H5a1,1,0,0,0,0,2H9v4a1,1,0,0,0,2,0V11h4a1,1,0,0,0,0-2H11Z" transform="translate(-4 -4)" fill="#ffffff" fill-rule="evenodd"/>
						  </svg>											
					</span>
				</a>
			</li>
		</ul>
	</div>
</div>

<div class="content-container">
	<div class='media-list'>
		<div class='media-holder'>

			@foreach ($media as $media)
			<div class='media-element editable' data-id='{{$media->id}}'>
				<div class='media-item'>
					<img src="{{$media->file}}" alt="">
				</div>
			</div><!--media-element-->	
			@endforeach
			

		</div><!--media-holder-->
	</div>
</div>

@endsection

