<?php
function argv()
{
  global $argv, $argc;
  $padding = 0;
  // Scan all img / get size , calculer la taille de notre background
  for ($i = 1; $i < $argc; $i++) {
    $size = getimagesize($argv[$i]);
    $x = $size[0];
    $y = $size[1];
    //longueur $x
    $x += $x;
    // tout les hauteurs seront ds tab y
    $array_y[] = $y;
  }
  // ds ce tableau, sort moi la max hauteur
  $y = max($array_y);

  $backgrd = imagecreatetruecolor($x, $y);
  imagealphablending($backgrd, false);
  imagesavealpha($backgrd, true);

  for ($h = 1; $h < $argc; $h++) {
    $x = $size[0];
    $y = $size[1];
    // attribut prmtr a la var image;
    $image = imagecreatefromstring(file_get_contents($argv[$h]));
    // copy var img sur bckgrd;
    imagecopy($backgrd, $image, $padding, 0, 0, 0, $x, $y);
    echo "$x $y";
    $padding += $x;
  }

  imagepng($backgrd, 'sprite.png');
}

argv();
