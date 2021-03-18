<?php


namespace App\model\user;

use PDO;

class UserManager
{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function existUser(User $user)
    {
        $log = true;
        $sql = "select * FROM user WHERE username = :emailParam AND password = :passwordParam LIMIT 1";
        $stm = $this->pdo->prepare($sql);
        $result = $stm->execute([
            ':emailParam' => $user->getUsername(),
            ':passwordParam' => $user->getPassword()
        ]);
        $user = $stm->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $log = false;
        }
        return $log;

    }

    public function handleRequest()
    {
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        return new User($username, $password);
    }

    public function validate(User $user)
    {
        $errors = [];

        if ($user->getUsername() == "") {
            $errors['username'] = "pas de nom";
        }
        if ($user->getPassword() == "") {
            $errors['password'] = "veuillez entrer un mot de passe";
        }
        return $errors;
    }
}
