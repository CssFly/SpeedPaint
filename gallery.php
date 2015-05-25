<?php

$root = "img";

?>

<!doctype html>
<html lang="en">
<head>
<title>Create Speed Paintings online. Just draw and click Play.</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index,follow" />
<meta name="description" content="Use our free online drawing tools to create animated speed paint drawings and show off your artwork in the public gallery." />
<meta name="revisit-after" content="7 days" />

<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /> -/-->

<style type="text/css">

body, html{ height:100%; }
body {
  font-family: verdana;
  font-size: 1em;
  background: #666;
}

h1 {
  background: #232323 none repeat scroll 0 0;
  color: #fff;
  font-size: 2em;
  font-weight: 100;
  margin: 0;
  padding: 1em 0;
  text-align: center;
  text-shadow: 0 0.021em 0.1em #000;
}
h1 a {
  color: #fe0;
  text-decoration: none;
}
h1 a:hover,
h1 a:active {}

h1 a::before {
  color: #666;
  content: "by Queeky";
  font-size: 11px;
  margin: 3.2em 0 0 3em;
  position: absolute;
}
h2 {
  background: #333 none repeat scroll 0 0;
  border-bottom: 1px solid #666;
  color: #666;
  font-weight: 100;
  letter-spacing: 0.1em;
  margin: 0;
  padding: 1em 2em;
  clear: left;
}
h2::before {
  color: #999;
  content: "+";
  font-size: 0.5em;
  left: -0.4em;
  margin-right: 0.4em;
  position: relative;
  top: -0.5em;
}

.row {
  width: 80%;
  background: #fff;
  box-shadow: 0 0 2em rgba(0,0,0,0.4);
  margin: 0 auto;
  padding: 0;
}

.picture {
  float: left;
  margin: 1em;
}
.picture > div {
  background: 0;
  text-align: center;
}
.picture figcaption {

}
.picture figcaption strong {
  display: block;
  padding: 0.4em 0;
}
.picture figcaption em {
  color: #666;
  font-size: 0.6em;
}
.picture img {
  max-width: 200px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.197);
}
.picture img:hover,
.picture img:active {

}
.hint {
  color: #666;
  font-size: 0.6em;
  display: block;
  padding: 1em;
  text-align: right;
}
</style>

</head>

<body>

<div class="row">
<h1><a href="http://www.speedpaint.info" title="Back to paint app">SpeedPaint</a> Gallery</h1>

<?php
read_Dir($root, $edit);
?>
<br clear="all" />

<div class="hint">SpeedPaint is an API example of <a href="http://www.queeky.com/api">QueekyPaint's API</a></div>

</div>

</body>
</html>



<?php

function read_Dir($dir, $edit)
{
  $files=glob($dir.'/*');
  if(!is_array($files))
   return;
  foreach($files as $file)
   {
    if(is_dir($file)&&is_readable($file)) {

     list($nix, $cat) = explode("/", $file);

      echo '<h2>' .$cat. '</h2>';

     read_Dir($file, $edit);
    } else {
     list($nix, $cat, $name) = explode("/", $file);
     list($time, $name) = explode("_", $name, 2);
     $name = preg_replace("/_/", " ", $name);
     $time++; $time--;
     $date = date('m/d/Y h:i:s a', $time);

     echo '<figure class="picture"><div><a href="'.$file.'"><img alt="image" src="'.$file.'" /></a></div><figcaption><strong>'.$name.'</strong><em>'.$date.'</em></figcaption></figure>';
    }
    }
   }
 }

?>
