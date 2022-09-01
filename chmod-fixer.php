<pre><?php

print_r(scan('.'));

function scan($dir){
  $path = [];
  if(is_dir($dir)){
    chmod($dir, 0755);
    foreach(glob($dir.'/*') as $data){
      // $data = $dir .'/'. $data;
      $path = array_merge($path, scan($data));
    }
  }else{
    chmod($dir, 0644);
    $path[] = $dir;
  }

  return $path;
}