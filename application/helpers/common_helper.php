<?php
function resizeImage($sourcePath,$new_path,$width,$height){
    $CI=&get_instance();
    $config['image_library']    = 'gd2';
    $config['source_image']     = $sourcePath;
    $config['new_image']        = $new_path;
    $config['create_thumb']     = TRUE;
    $config['maintain_ratio']   = TRUE;
    $config['thumb_marker']     = '';
    $config['width']            = $width;
    $config['height']           = $height;

    $CI->load->library('image_lib', $config);
    $CI->image_lib->initialize($config);

    $CI->image_lib->resize();

    $CI->image_lib->clear();
}
?>