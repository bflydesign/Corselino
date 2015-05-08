<?php
include_once '../remote.php';
include_once ROOTDIR.'admin/include/imageResize.php';

class Upload {
        public function __construct() {

        }

        public function uploadFile($map)
        {
                if ($map == 'lingerie') {
                        if ($_FILES['fileLingerie']['error'] !== UPLOAD_ERR_OK) {
                                return false;
                        }
                        $finfo = finfo_open(FILEINFO_MIME_TYPE);
                        $mime = finfo_file($finfo, $_FILES['fileLingerie']['tmp_name']);
                        switch ($mime) {
                                case 'image/jpeg':
                                        $ok = true;
                                        break;
                                case 'image/jpg':
                                        $ok = true;
                                        break;
                                default:
                                        $ok = false;
                                        break;
                        }
                        //Bij het juiste bestandstype mag het bestand worden geüpload
                        if ($ok) {
                                //put in folder
                                move_uploaded_file($_FILES["fileLingerie"]["tmp_name"],
                                "../images/".$map."/" . $_FILES["fileLingerie"]["name"]);
                                //copy to thumbs
                                exportimg("../images/".$map."/".$_FILES['fileLingerie']['name'] , "../images/thumbs/".$map."/".$_FILES['fileLingerie']['name'] , 200 , 300 , 80 , 0 , 1);
                                return true;
                        }
                        else
                                return false;
                }
                
                if ($map == 'badmode') {
                        if ($_FILES['fileBadmode']['error'] !== UPLOAD_ERR_OK) {
                                return false;
                        }
                        $finfo = finfo_open(FILEINFO_MIME_TYPE);
                        $mime = finfo_file($finfo, $_FILES['fileBadmode']['tmp_name']);
                        switch ($mime) {
                                case 'image/jpeg':
                                        $ok = true;
                                        break;
                                case 'image/jpg':
                                        $ok = true;
                                        break;
                                default:
                                        $ok = false;
                                        break;
                        }
                        //Bij het juiste bestandstype mag het bestand worden geüpload
                        if ($ok) {
                                //put in folder
                                move_uploaded_file($_FILES["fileBadmode"]["tmp_name"],
                                "../images/".$map."/" . $_FILES["fileBadmode"]["name"]);
                                //copy to thumbs
                                exportimg("../images/".$map."/".$_FILES['fileBadmode']['name'] , "../images/thumbs/".$map."/".$_FILES['fileBadmode']['name'] , 200 , 300 , 80 , 0 , 1);
                                return true;
                        }
                        else
                                return false;
                }
                
                if ($map == 'nachtmode') {
                        if ($_FILES['fileNachtmode']['error'] !== UPLOAD_ERR_OK) {
                                return false;
                        }
                        $finfo = finfo_open(FILEINFO_MIME_TYPE);
                        $mime = finfo_file($finfo, $_FILES['fileNachtmode']['tmp_name']);
                        switch ($mime) {
                                case 'image/jpeg':
                                        $ok = true;
                                        break;
                                case 'image/jpg':
                                        $ok = true;
                                        break;
                                default:
                                        $ok = false;
                                        break;
                        }
                        //Bij het juiste bestandstype mag het bestand worden geüpload
                        if ($ok) {
                                //put in folder
                                move_uploaded_file($_FILES["fileNachtmode"]["tmp_name"],
                                "../images/".$map."/" . $_FILES["fileNachtmode"]["name"]);
                                //copy to thumbs
                                exportimg("../images/".$map."/".$_FILES['fileNachtmode']['name'] , "../images/thumbs/".$map."/".$_FILES['fileNachtmode']['name'] , 200 , 300 , 80 , 0 , 1);
                                return true;
                        }
                        else
                                return false;
                }
                
                if ($map == 'heren') {
                        if ($_FILES['fileHeren']['error'] !== UPLOAD_ERR_OK) {
                                return false;
                        }
                        $finfo = finfo_open(FILEINFO_MIME_TYPE);
                        $mime = finfo_file($finfo, $_FILES['fileHeren']['tmp_name']);
                        switch ($mime) {
                                case 'image/jpeg':
                                        $ok = true;
                                        break;
                                case 'image/jpg':
                                        $ok = true;
                                        break;
                                default:
                                        $ok = false;
                                        break;
                        }
                        //Bij het juiste bestandstype mag het bestand worden geüpload
                        if ($ok) {
                                //put in folder
                                move_uploaded_file($_FILES["fileHeren"]["tmp_name"],
                                "../images/".$map."/" . $_FILES["fileHeren"]["name"]);
                                //copy to thumbs
                                exportimg("../images/".$map."/".$_FILES['fileHeren']['name'] , "../images/thumbs/".$map."/".$_FILES['fileHeren']['name'] , 200 , 300 , 80 , 0 , 1);
                                return true;
                        }
                        else
                                return false;
                }
        }

        public function deleteFile($filename)
        {
                //delete img
                unlink($filename);
                //delete thumb
                $base = substr($filename, 10);
                unlink("../images/thumbs/".$base);
                header("location: upload images");
        }
}

?>
