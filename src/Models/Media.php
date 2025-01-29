<?php

namespace Locomotif\Media\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    static function getMainImage($owner, $ownerID, $isMain = true){
        $query = Media::where('owner', '=', $owner)
                    ->where('owner_id', '=', $ownerID);
        if ($isMain) {
            $query->where('main', '=', 1);
        }
        $media = $query->first();

        $mediaPath = !empty($media) ? '/'.$media->folder.'/'.$media->file : asset('/img/noimg.png');

        return $mediaPath;
    }

    static function getImagesWithoutMain($owner, $ownerID){
        $media = Media::where('owner',    '=', $owner)
                ->where('owner_id', '=', $ownerID)
                ->where('main', '=', 0)
                ->orderBy('ordering_owner', 'ASC')
                ->get();
                
        $media->map(function($mediaElement){
            $mediaElement->file = (!empty($mediaElement->file) || $mediaElement->file!=null) ? $mediaElement->folder.'/'.$mediaElement->file : asset('img/noimg.png');
        });
        
        return $media;
    }
    static function getAllImages($owner, $ownerID){
        $media = Media::where('owner',  '=', $owner)
                    ->where('owner_id', '=', $ownerID)
                    ->get();
        
        $media->map(function($mediaElement){
            $mediaElement->file = (!empty($mediaElement->file) || $mediaElement->file!=null) ? $mediaElement->folder.'/'.$mediaElement->file : asset('img/noimg.png');
        });

        return $media;
    }
    
}
