<?php
include_once ROOTDIR . 'admin/include/functions.php';
include_once ROOTDIR . 'admin/classes/class.login.php';

class User {
        var $id;
        var $username;
        var $email;

    function __construct($ID = NULL) {
        $this->id = $ID;
        
        if ($this->id <> null) {
            $this->refreshData();
        }
    }

    public function refreshData() {
        $mysqli = connectdbMySQLI();

        $query = "SELECT * FROM tblUser WHERE ID = " . $this->id;
        $result = $mysqli->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $this->setData($row);
        $mysqli->close();
    }

    public function setData($row) {
        $this->id = $row['ID'];
        $this->username = $row['Username'];
        $this->email = $row['Email'];
    }

    public function save() {
        try {
            $mysqli = connectdbMySQLI();
            //Update
            if ($this->id <> null) {
                $stmt = $mysqli->prepare('UPDATE tblUser SET
                                            Username = ?,                                            
                                            Email = ?
                                            WHERE ID = ?');

                $stmt->bind_param('ssi',
                        $this->username, 
                        $this->email,
                        $this->id);
            }
            //Insert
            else {
                $secure = Login::generatePassword('abcdef');       
                $salt = $secure['salt'];
                $password = $secure['password'];
                $stmt = $mysqli->prepare('INSERT INTO tblUser(
                                            Username,
                                            Email,
                                            Salt,
                                            Password) 
                                        VALUES (?, ?, ?, ?)');
                
                $stmt->bind_param('ssis',
                        $this->username,
                        $this->email,
                        $salt,
                        $password
                );
            }
            $stmt->execute();
            $stmt->close();

            if ($this->id <> null)
                $this->id = $mysqli->insert_id;

        } catch (Exception $e) { echo $e->getTraceAsString();}
    }
    
    public function delete() {
        try
        {
            $mysqli = connectdbMySQLI();

            $stmt = $mysqli->prepare("DELETE FROM tblUser WHERE ID = ?");
            $stmt->bind_param('i', $this->id);

            $stmt->execute();
            $stmt->close();
        }
        catch (Exception $e) {}
    }
}
?>
