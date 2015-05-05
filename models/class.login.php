<?php
include_once '../remote.php';

include_once ROOTDIR.'admin/include/functions.php';
include_once ROOTDIR.'admin/classes/class.mail.php';

class Login {    
    
        public static function sec_session_start()
        {
            $session_name = 'sec_session_id'; // Set a custom session name
            $secure = false; // Set to true if using https.
            $httponly = true; // This stops javascript being able to access the session id. 

            ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies. 
            $cookieParams = session_get_cookie_params(); // Gets current cookies params.
            session_set_cookie_params($cookieParams['lifetime'], $cookieParams['path'], $cookieParams['domain'], $secure, $httponly); 
            session_name($session_name); // Sets the session name to the one set above.
            session_start(); // Start the php session
            session_regenerate_id(true); // regenerated the session, delete the old one.     
        }

        private static function checkCredentials($username, $password)
        {
            $valid = false;

            $mysqli = connectdbMySQLI();
            if ($stmt = $mysqli->prepare("SELECT ID, Username, Salt, Password FROM tblUser WHERE Username = ? LIMIT 1"))
            { 
                $stmt->bind_param('s', $username);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($id, $username, $salt, $db_password);
                $stmt->fetch();
                $password = hash('sha512', $password.$salt);

                if($stmt->num_rows == 1)
                { 
                    if($db_password == $password)
                    { 
                        $valid = true;
                    }
                }            
            }
            return $valid;
        }

        private static function loginUser($username, $password, $mysqli)
        {   
            // Using prepared Statements means that SQL injection is not possible. 
            if ($stmt = $mysqli->prepare("SELECT ID, Username, Salt, Password FROM tblUser WHERE Username = ? LIMIT 1"))
            { 
                $stmt->bind_param('s', $username);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($id, $username, $salt, $db_password);
                $stmt->fetch();
                $password = hash('sha512', $password.$salt);

                if($stmt->num_rows == 1)
                { 
                    // We check if the account is locked from too many login attempts
                    if(Login::checkbrute($id, $mysqli) == true) 
                    { 
                        // Account is locked
                        // Send an email to user saying their account is locked
                        return false;
                    } 
                    else
                    {
                        if($db_password == $password)
                        { 
                            //// Check if the password in the database matches the password the user submitted. 
                            // Password is correct!
                            $ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user. 
                            $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.

                            $_SESSION['id'] = preg_replace("/[^0-9]+/", "", $id); // XSS protection as we might print this value
                            $_SESSION['username'] = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
                            $_SESSION['login_string'] = hash('sha512', $password.$ip_address.$user_browser);
                            // Login successful.
                            return true;        
                        } 
                        else
                        {
                            // Password is not correct
                            // We record this attempt in the database
                            $date = date('Y-m-d H:i:s', time());
                            $stmt = $mysqli->prepare("INSERT INTO tblLoginAttempts (UserID, Time) VALUES (?, ?)");
                            $stmt->bind_param('is', $id, $date);
                            $stmt->execute();
                            return false;
                        }
                    }
                } 
                else 
                {
                    // No user exists. 
                    return false;
                }
            }
        }

        private static function checkbrute($id, $mysqli)
        {
            // Get timestamp of current time
            $now = time();
            // All login attempts are counted from the past 2 hours. 
            $valid_attempts = $now - (2 * 60 * 60); 

            if ($stmt = $mysqli->prepare("SELECT Time FROM tblLoginAttempts WHERE UserID = ? AND Time > '$valid_attempts'")) 
            { 
                $stmt->bind_param('i', $id); 
                // Execute the prepared query.
                $stmt->execute();
                $stmt->store_result();
                // If there has been more than 5 failed logins
                if($stmt->num_rows > 5)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        
         public static function checkIfLoggedIn() 
        {
                $mysqli = connectdbMySQLI();
                // Check if all session variables are set
                if(isset($_SESSION['id'], $_SESSION['username'], $_SESSION['login_string'])) 
                {
                        $id = $_SESSION['id'];
                        $login_string = $_SESSION['login_string'];
                        $username = $_SESSION['username'];
                        $ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user. 
                        $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.

                        if ($stmt = $mysqli->prepare("SELECT Password FROM tblUser WHERE ID = ? AND Username = ? LIMIT 1")) 
                        {
                                $stmt->bind_param('is', $id, $username); // Bind "$user_id" to parameter.
                                $stmt->execute(); // Execute the prepared query.
                                $stmt->store_result();

                                if($stmt->num_rows == 1)  // If the user exists
                                {
                                        $stmt->bind_result($password); // get variables from result.
                                        $stmt->fetch();
                                        $login_check = hash('sha512', $password.$ip_address.$user_browser);
                                        if($login_check == $login_string) 
                                                return true;                    
                                        else                     
                                                 return false;                    
                                } 
                                else 
                                        return false;
                        } 
                        else 
                                return false;
                } 
                else 
                        return false;        
        }
    
        public static function login_check() 
        {
            $mysqli = connectdbMySQLI();
            // Check if all session variables are set
            if(isset($_SESSION['id'], $_SESSION['username'], $_SESSION['login_string'])) 
            {
                $id = $_SESSION['id'];
                $login_string = $_SESSION['login_string'];
                $Username = $_SESSION['username'];
                $ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user. 
                $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.

                if ($stmt = $mysqli->prepare("SELECT Password FROM tblUser WHERE ID = ? LIMIT 1")) 
                { 
                    $stmt->bind_param('i', $id); // Bind "$user_id" to parameter.
                    $stmt->execute(); // Execute the prepared query.
                    $stmt->store_result();

                    if($stmt->num_rows == 1)  // If the user exists
                    {
                        $stmt->bind_result($password); // get variables from result.
                        $stmt->fetch();
                        $login_check = hash('sha512', $password.$ip_address.$user_browser);
                        if($login_check == $login_string) 
                            return true;                    
                        else                     
                            return false;                    
                    } 
                    else 
                        return false;
                } 
                else 
                    return false;
            } 
            else 
                return false;        
        }

        public static function loginFromForm()
        {
            if (!$_SESSION) 
                Login::sec_session_start();

            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                    if(isset($_POST['username']) && isset($_POST['password']))
                    {
                        $username = trim($_POST['username']);
                        $password = trim($_POST['password']);
                        $mysqli = connectdbMySQLI();

                        if(Login::loginUser($username, $password, $mysqli) == true)
                        {
                                //Login success
                                 if(isset($_SESSION['oldURL']))
                                        echo $_SESSION['oldURL'];
                                 else
                                        echo 'adminpanel.php';
                             }
                             else
                             {
                                // Login failed
                                echo 'error';
                             }
                    }
                    else
                    { 
                       // The correct POST variables were not sent to this page.
                       echo "error";
                    }
            }
        }

        public static function logout()
        {
            if (!$_SESSION) 
                Login::sec_session_start();
            unset($_SESSION['sec_session_id']);
            session_destroy();
            echo 'true';
        }

        public static function changePassword($username, $newPassword)
        {
            //wachtwoord encrypteren
            $salt = Login::generateSalt();
            $password = hash('sha512', $newPassword.$salt);

            $mysqli = connectdbMySQLI();
            $stmt = $mysqli->prepare('UPDATE tblUser SET
                                Password = ?,
                                Salt = ? 
                                WHERE Username = ?');
            $stmt->bind_param('sss',
                            $password, 
                            $salt, 
                            $username);
            $stmt->execute();
            $stmt->close();

            //login_string van de sessie wijzigen
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $user_browser = $_SERVER['HTTP_USER_AGENT'];
            $_SESSION['login_string'] = hash('sha512', $password.$ip_address.$user_browser);
        }

        public static function resetPassword()
        {        
            $mysqli = connectdbMySQLI();
            // Check if all session variables are set
            if(isset($_POST['username'], $_POST['email'])) 
            {
                $username = $_POST['username'];
                $email = $_POST['email'];

                if ($stmt = $mysqli->prepare("SELECT ID FROM tblUser WHERE Username = ? AND Email = ? LIMIT 1")) 
                { 
                    $stmt->bind_param('ss', $username, $email); // Bind values to parameter.
                    $stmt->execute(); // Execute the prepared query.
                    $stmt->store_result();

                    if($stmt->num_rows == 1)  // If the user exists
                    {
                        $random = Login::generateRandomPassword();
                        Login::changePassword($username, $random);
                        //Generate mail with password;
                        $subject = "Uw nieuw wachtwoord";
                        $content =  "Uw wachtwoord werd vanop de website gereset.\n"
                                ."Gelieve dit wachtwoord te gebruiken om in te loggen: \n".$random."\n"
                                ."\n\n"
                                ."Met vriendelijke groet,"
                                ."\n"
                                ."de webmaster";
                        if(Mail::sendMailForPassword($email, $subject, $content) == "true");
                        echo 'het nieuwe wachtwoord werd u toegestuurd via mail';                   
                    } 
                    else 
                        echo 'de ingevoerde gegevens komen niet overeen, gelieve opnieuw te proberen';
                } 
                else 
                    echo 'fout bij het ophalen van de gegevens, gelieve opnieuw te proberen';
            } 
            else 
                echo 'de gegevens werden niet goed verstuurd, gelieve opnieuw te proberen';
        }

        public static function generatePassword($password)
        {
            // Create a random salt
            $random_salt = Login::generateSalt();
            // Create salted password (Careful not to over season)
            $password = hash('sha512', $password.$random_salt);

            return $return_values = array('salt'=>$random_salt, 'password'=>$password);   
        }

        public static function generateRandomPassword()
        {
            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass); //turn the array into a string
        }
    
        public static function generateSalt()
        {
                $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
                return $random_salt;
        }
}
?>
