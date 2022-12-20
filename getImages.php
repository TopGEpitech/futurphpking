<?php
$imgs = array();
function getImages($path)
{
    getopt("r:");
    global $imgs, $entry, $argv, $argc;
    // $option = getopt('r:');
    // prend ton chemin, test si c bien un dossier
    if ($opendir = opendir($path)) {
        // Tant que  je peux lire ds mon dossier,
        while (false !== ($entry = readdir($opendir))) {
            /*            echo "<br>".  $entry ;*/
            if ($entry != "." && $entry != "..") {
                $subpath = "$path/$entry";
                if (preg_match("/.png|.jpe?g|.gif|.webp|.bmp|.tiff$/i", $entry)) {
                    echo $entry . "\n";
                    /*                  echo $entry . "<br/>";*/
                    array_push($imgs, $subpath);
                } else {
                    if (is_dir($subpath)) {
                        /*                        echo  " " . $subpath . "<br>" ;*/
                        getImages($subpath);
                    }
                }
            }
        }
        closedir($opendir);
    }
}



// function Spritescripter($array)
// {
//     /*    var_dump($gentry);*/
//     /*    $size = getimagesize($entry);*/
//     foreach ($array as $entry) {
//         /* getimagesize($entry);*/
//         // echo "<img src='$entry'>";
//         echo $entry;
//     }


//     /*        echo "<img src='".$value."<br>";*/
//     /*       getimagesize($value) . "<br>";*/
// }



// addition($imgs);
