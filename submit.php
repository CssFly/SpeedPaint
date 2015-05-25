<?php

/* this test script saves a drawing in existing folder ./img */

if( ($_SERVER['REQUEST_METHOD'] !== 'POST') )
{
  print "error";
  exit;
}

$title = trim($_POST["title"]);

$category = "other";
if($_POST["category"]) $category = $_POST["category"];

if (isset($_FILES['Filedata2']))
{
    if(empty($_FILES['Filedata2']['tmp_name']))
    {
      die("error&message=upload failed");
    }
    $t = time();
    $new = "img/".$category;

    $tt=preg_replace("/[^a-zA-Z0-9_ ]/" , "" , $title);
    $tt = preg_replace("/ /", "_", $tt);

    $destination = $new."/".$t."_".$tt.".jpg";

    if(!file_exists($new))
    {
        if (!mkdir($new, 0755, true))
        {
            //die('error');
        }
    }
    /* do something with uploaded data */
    if(move_uploaded_file($_FILES['Filedata2']['tmp_name'], $destination))
    {
    	print "done=ok&message=Drawing has been saved to SpeedPaint gallery. You will be redirected in a few seconds ...&redirect=http://www.speedpaint.info/queeky/gallery.php"; /* notify tha app that saving succeed */
    } else {
    	die("error&message=upload failed");
    }

} else {
	die("error");
}

?>
