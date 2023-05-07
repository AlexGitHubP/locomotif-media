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

<div class='media-list'>
    @if (count($media) > 0)
    <div class='media-holder'>
        @foreach ($media as $media)
        <div class='media-element editable' data-id='{{$media->id}}'>
            <div class='media-item'>
                <img src="{{$media->file}}" alt="">
            </div>
        </div><!--media-element-->	
        @endforeach
    </div><!--media-holder-->
    @else
    <p>Nu există imagini asociate.</p>
    @endif
</div>

<form method="POST" action='/admin/media/' enctype="multipart/form-data">
    @csrf
    <input type="hidden" name='owner' id='owner' value='{{$owner}}'>
    <input type="hidden" name='owner_id' id='owner_id' value='{{$owner_id}}'>
    <div class='dropzoneArea' data-postUrl='/admin/media/'>
        <p class='general-btn addMediaBtn'>Click pentru a adăuga elemente media</p>
    </div>

    <div class='dropzonePreview'></div>

    <input class="general-btn mediaUpload" type="submit" value="Adaugă elementele media">
</form>