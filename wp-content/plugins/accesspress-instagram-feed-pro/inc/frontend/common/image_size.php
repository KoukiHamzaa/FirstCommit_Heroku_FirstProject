<?php
// echo "<pre>";
// print_r($vm['images']);
// echo "</pre>";
if($image_size === 'thumbnail'){
    $image = $vm['images']['thumbnail']['url'];
}else if($image_size === 'thumbnail-200'){
    $image = $vm['images']['thumbnail']['url'];
    // $image = str_replace('s150x150/', 's200x200/', $image);
}else if($image_size ==='thumbnail-320'){
    $image = $vm['images']['thumbnail']['url'];
    // $image = str_replace('s150x150/', 's320x320/', $image);
}else if($image_size ==='thumbnail-600'){
    $image = $vm['images']['thumbnail']['url'];
    // $image = str_replace('s150x150/', 's600x600/', $image);
}else if($image_size ==='thumbnail-640'){
    $image = $vm['images']['thumbnail']['url'];
    // $image = str_replace('s150x150/', 's640x640/', $image);
}else if($image_size ==='thumbnail-800'){
    $image = $vm['images']['thumbnail']['url'];
    // $image = str_replace('s150x150/', 's800x800/', $image);
}else if($image_size == 'low_resolution'){
    $image = $vm['images']['low_resolution']['url'];
}else if($image_size == 'standard_resolution'){
    $image = $vm['images']['standard_resolution']['url'];
}else{
    $image = $vm['images']['standard_resolution']['url'];
}
