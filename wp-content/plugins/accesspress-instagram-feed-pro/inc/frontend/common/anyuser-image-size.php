<?php 
$img = $vm['images']['standard_resolution']['url'];
if(!empty($extra_options['thumbnailResources'])){
        if($image_size == "standard_resolution"){
            //large
           $largeimg = $extra_options['thumbnailResources']['640']['url'];
           $largeimgwidth = $extra_options['thumbnailResources']['640']['width'];
           $largeimgheight = $extra_options['thumbnailResources']['640']['height'];
          
          if($largeimg != ''){
              $image = $largeimg;
               $width = $largeimgwidth;
               $height = $largeimgheight;
          }else{
              $image = $vm['images']['standard_resolution']['url'];
                if($width != '' && $height > $width){
                   $height = $width;
                }else{
                    $width =  $height = '640';
                }
          }
        }else if($image_size == "low_resolution"){
           $lowimg = $extra_options['thumbnailResources']['480']['url'];
           $lowimgwidth = $extra_options['thumbnailResources']['480']['width'];
           $lowimgheight = $extra_options['thumbnailResources']['480']['height'];
           if($lowimg != ''){
               $image  = $lowimg;
               $width  = $lowimgwidth;
               $height = $lowimgheight;
             }else{
                $image = $vm['images']['low_resolution']['url'];
                if($image == ''){
                    $image = $vm['images']['standard_resolution']['url'];
                }
                if($lowwidth != '' && $lowheight > $lowwidth){
                   $height = $lowwidth;
                }else{
                   $width =  $height = '480';
                }

             }
        }else if($image_size == "thumbnail"){
           $thumbnailimg = $extra_options['thumbnailResources']['150']['url'];
           $thumbnailimgwidth = $extra_options['thumbnailResources']['150']['width'];
           $thumbnailimgheight = $extra_options['thumbnailResources']['150']['height'];
           if($thumbnailimg != ''){
               $image  = $thumbnailimg;
               $width  = $thumbnailimgwidth;
               $height = $thumbnailimgheight;
           }else{
              //thumnail
            $image = $vm['images']['thumbnail']['url'];
             if($image == ''){
                $image = $vm['images']['standard_resolution']['url'];
             }
            if($thumbwidth != '' && $thumbheight > $thumbwidth){
                 $height = $lowwidth;
             }else{
                $width = $height = '150';
             }
           }

        }else if($image_size == "thumbnail-240"){
           $thumbnail240img = $extra_options['thumbnailResources']['240']['url'];
           $thumbnail240imgwidth = $extra_options['thumbnailResources']['240']['width'];
           $thumbnail240imgheight = $extra_options['thumbnailResources']['240']['height'];
           if($thumbnail240img != ''){
               $image  = $thumbnail240img;
               $width  = $thumbnail240imgwidth;
               $height = $thumbnail240imgheight;
           }else{
               $image = $vm['images']['standard_resolution']['url'];
                if($width != '' && $height > $width){
                   $height = $width;
                }else{
                    $width =  $height = '640';
                }
           }
          
        }else if($image_size == "thumbnail-320"){

           $thumbnail320img = $extra_options['thumbnailResources']['320']['url'];
           $thumbnail320imgwidth = $extra_options['thumbnailResources']['320']['width'];
           $thumbnail320imgheight = $extra_options['thumbnailResources']['320']['height'];
           if($thumbnail320img != ''){
               $image  = $thumbnail320img;
               $width  = $thumbnail320imgwidth;
               $height = $thumbnail320imgheight;
           }else{
               $image = $vm['images']['standard_resolution']['url'];
                if($width != '' && $height > $width){
                   $height = $width;
                }else{
                    $width =  $height = '640';
                }
           }
          
        }

}else{ 

      if($image_size == "standard_resolution"){
        //large
         if($img != ''){
            $image = $vm['images']['standard_resolution']['url'];
            if($width != '' && $height > $width){
               $height = $width;
            }else{
                $width =  $height = '640';
            }
         }
    }else if($image_size == "low_resolution"){
        //medium
            $image = $vm['images']['low_resolution']['url'];
            if($image == ''){
                $image = $vm['images']['standard_resolution']['url'];
            }
            if($lowwidth != '' && $lowheight > $lowwidth){
               $height = $lowwidth;
            }else{
               $width =  $height = '300';
            }

    }else{
        //thumnail
         $image = $vm['images']['thumbnail']['url'];
          if($image == ''){
                $image = $vm['images']['standard_resolution']['url'];
            }
            if($thumbwidth != '' && $thumbheight > $thumbwidth){
                 $height = $lowwidth;
            }else{
                $width = $height = '150';
            }
     }

}