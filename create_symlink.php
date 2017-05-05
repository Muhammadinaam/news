<?php
$target = '/home/eninewsp/public_html/storage/app'; 
$shortcut = '/home/eninewsp/public_html/public/uploads';
symlink($target, $shortcut); 

echo 'done'

?>