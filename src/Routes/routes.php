<?php

Route::group(['middleware'=>'web'], function(){
	Route::resource('/admin/media',                 'Locomotif\Media\Controller\MediaController');	
	Route::POST('/admin/media/ajaxEdit',            'Locomotif\Media\Controller\MediaController@ajaxEdit');
	Route::POST('/admin/media/ajaxDelete',          'Locomotif\Media\Controller\MediaController@ajaxDelete');
	
});
