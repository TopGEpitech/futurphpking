<?php
$opt = getopt("a:b:c");
while (getopt("a:b:c")) {
  switch ($opt) {
    case "a":
      getImages(".");
    case "b":
      argv();
    case NULL:
      echo "Invalid option : -$opt";
  }
}
