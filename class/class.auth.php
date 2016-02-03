<?
class Auth {
    private function __construct() {
        // new login
        if(isset($_POST['login'], $_POST['username'], $_POST['password']) && validCSRFToken()) {
            $user = $_POST['username'];
            $password = $_POST['password'];

            if(($row = querySingle('
               SELECT `id`, `password`
               FROM `users` u
               WHERE `nick` = "?"',
               $user)))
               // Crypt::hash checks the salted password
               && Crypt::hash($password, $row['password'])) {
                // credential change (guest -> user) regenerate session id
                session_regenerate_id(TRUE);

                $_SESSION['authenticated'] = TRUE;
                $_SESSION['userid'] = $row['id'];
                $_SESSION['user'] = $user;

                // prevent 'your browser has to re-send some data to display this page'
                redirect($_SERVER['REQUEST_URI']);
            } else {
                $this->logout();
                throw new AuthException('login failed. wrong user/password');
            }
        } else if($_SESSION['authenticated'] && $_SESSION['userid'] > 0 && !empty($_SESSION['user'])) {
            // user already logged in, nothing to see here, move on
        } else {
                    // not logged in!
                    throw new AuthException('not logged in. please login');
        }
    }

    public function logout() {
        $this->authenticated = FALSE;
        $this->user = '';
        $this->userid = 0;

        $this->session->destroy();
        $this->session->regenerate_id(TRUE);
    }
}
?>