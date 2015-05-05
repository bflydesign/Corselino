<?php
include_once ROOTDIR . 'admin/include/functions.php';

class Brands {
        var $id;
        var $page;
        var $content;

        function __construct($Page = NULL) {
                $this->page = $Page;

                if ($this->page <> null) {
                    $this->refreshData();
                }
        }

        public function refreshData() {
                $mysqli = connectdbMySQLI();

                $query = "SELECT * FROM tblBrands WHERE Page = '" . $this->page."'";
                $result = $mysqli->query($query);
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $this->setData($row);
                $mysqli->close();
        }

        public function setData($row) {
                $this->id = $row['ID'];
                $this->page = $row['Page'];
                $this->content = $row['Content'];
        }

        public function save() {
                $mysqli = connectdbMySQLI();
                //Update
                if ($this->id <> null) {
                    $stmt = $mysqli->prepare('UPDATE tblBrands SET
                                                Content = ?
                                                WHERE ID = ?');

                    $stmt->bind_param('si',
                            $this->content,
                            $this->id);
                }
                $stmt->execute();
                $stmt->close();

                if ($this->id <> null)
                    $this->id = $mysqli->insert_id;
        }
        
        public static function getPageContent($page)
        {
                $brands = new Brands($page);
                echo $brands->content;
        }

        public static function savePageContent()
        {
                $lingerie = new Brands('lingerie');
                $lingerie->content = $_POST['lingerie'];
                $lingerie->save();
                
                $badmode = new Brands('badmode');
                $badmode->content = $_POST['badmode'];
                $badmode->save();
                
                $nachtmode = new Brands('nachtmode');
                $nachtmode->content = $_POST['nachtmode'];
                $nachtmode->save();
                
                $heren = new Brands('heren');
                $heren->content = $_POST['heren'];
                $heren->save();
        }
}
?>
