
<div class='mediaModal'>
	<div class="closeModal">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8 8">
			<path data-name="X" d="M11.854,4.853a.5.5,0,0,0-.707-.707L8,7.293,4.853,4.146a.5.5,0,0,0-.707.707L7.293,8,4.146,11.146a.5.5,0,0,0,.707.707L8,8.707l3.146,3.147a.5.5,0,0,0,.707-.707L8.707,8Z" transform="translate(-4 -4)" fill="#303d4d" fill-rule="evenodd"/>
		</svg>			  
	</div>
	<h2>Editează element media</h2>

	<div class='mediaModalElement'>
		<div class="media-item">
			<div class="media-image">
				<img  alt="" src="{{$media->file}}">
			</div>
			<div class="media-content">
				<p class="mediaName"><strong>Nume fișier:</strong> {{$media->name}}</p>
				<p class="mediaName"><strong>Nume original:</strong> {{$media->original_name}}</p>
				<p class="mediaName"><strong>Link:</strong> {{$media->file}}</p>
			</div>
			<div class="media-buttons">
				<a href="" class="general-btn modal-media-delete" data-id='{{$media->id}}'>Șterge</a>
				<a href="" class="general-btn modal-media-copy">Copiază link</a>
			</div>
			</div>
	</div>
</div>