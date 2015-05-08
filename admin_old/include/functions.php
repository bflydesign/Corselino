<?php
//verbinding maken met de database
//verbinding maken met de database
function connectdb()
{    
//        $sHost = 'atrox.no-ip.org';
//        $sUser = 'bflydesign';
//        $sPass = 'nikbar81';
//        $sDb = 'dbCorselino';
        $sHost = 'corselino.be.mysql';
        $sUser = 'corselino_be';
        $sPass = 'sqtwwLnU';
        $sDb = 'corselino_be';
	
    if(!$rDbConn=mysql_connect($sHost,$sUser,$sPass))
    {
        echo 'Kon niet verbinden met de databaseserver';
        return FALSE;
    }
    else
    {
        if(!mysql_select_db($sDb,$rDbConn))
        {
            echo 'Kon de database niet selecteren';
            return FALSE;
        }
    }
    return $rDbConn;
}
function connectdbMySQLI()
{    
//        $sHost = 'atrox.no-ip.org';
//        $sUser = 'bflydesign';
//        $sPass = 'nikbar81';
//        $sDb = 'dbCorselino';
        $sHost = 'corselino.be.mysql';
        $sUser = 'corselino_be';
        $sPass = 'sqtwwLnU';
        $sDb = 'corselino_be';
	
    $mysqli = new mysqli($sHost, $sUser, $sPass, $sDb);

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }    

    return $mysqli;
}

function resize($width, $height)
{
    /* Get original image x y*/
    list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
    /* calculate new image size with ratio */
    $ratio = max($width/$w, $height/$h);
    $h = ceil($height / $ratio);
    $x = ($w - $width / $ratio) / 2;
    $w = ceil($width / $ratio);
    /* new file name */
    $path = 'uploads/'.$width.'x'.$height.'_'.$_FILES['image']['name'];
    /* read binary data from image file */
    $imgString = file_get_contents($_FILES['image']['tmp_name']);
    /* create image from string */
    $image = imagecreatefromstring($imgString);
    $tmp = imagecreatetruecolor($width, $height);
    imagecopyresampled($tmp, $image,
      0, 0,
      $x, 0,
      $width, $height,
      $w, $h);
    /* Save image */
    switch ($_FILES['image']['type'])
    {
        case 'image/jpeg':
            imagejpeg($tmp, $path, 100);
            break;
        case 'image/png':
          imagepng($tmp, $path, 0);
          break;
        case 'image/gif':
          imagegif($tmp, $path);
          break;
        default:
          exit;
          break;
    }
    return $path;
    /* cleanup memory */
    imagedestroy($image);
    imagedestroy($tmp);
  }
?>