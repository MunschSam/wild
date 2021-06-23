<?php

namespace App\Controller;

// use permet d'utiliser la table users dans usermanager
use App\Model\UserManager;

class UserController extends AbstractController
{
    // function login qui permettra de verifier l'user dans la nav bar d'index
    public function login()
    {
        // vérifier si la méthod est post
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // vérification qu'il y a bien quelque chose d'écris dans name et pass
            if ($_POST['mail'] != '' && $_POST['pass'] != '') {
                $userManager = new UserManager();
                $user['mail'] = $_POST['mail'];
                // ici md5 permet de hasher le mdp
                $user['pass'] = ($_POST['pass']);
                // il faut initialiser l'user
                $userManager = new UserManager();
                $user = $userManager->checkingLogin($user);
                if (is_array($user)) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['lastname'] = $user['lastname'];
                    $_SESSION['mail'] = $user['mail'];
                    $_SESSION['age'] = $user['age'];
                    $_SESSION['pass'] = $user['pass'];
                } else {
                    $error = "Utilisateur inconnu, veuillez réessayer ou vous inscrire";
                    return $this->twig->render('User/login.html.twig', ['error' => $error]);
                }
            }
        }

        return $this->twig->render('User/login.html.twig');
    }
    // fonction permettant de déconnecter un user
    public function logout()
    {
        // ne pas utiliser session destroy ou unset car cela ne fonctionne pas , plutot
        // remplacer chaque variable par un vide
        $_SESSION['name'] = '';
        $_SESSION['lastname'] = '';
        $_SESSION['mail'] = '';
        $_SESSION['age'] = '';
        $_SESSION['pass'] = '';
        session_destroy();
        header('Location: /');
    }

    public function index()
    {
        return $this->twig->render('User/login.html.twig');
    }

    public function add(): string
    {
        if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
            $message = "null";
            $username = $_POST["name"];
            $userlastname = $_POST["lastname"];
            $userage = $_POST["age"];
            $userpass = $_POST["pass"];
            $usermail = $_POST["mail"];
            if ((strlen($username)) < 3 || (strlen($username)) > 75) {
                $message = "Votre nom est incorrect, il doit être compris entre 1 et 75 caractères";
            }
            if ($username === "admin" && $userlastname === "admin") {
                $message = "Le nom saisi n'est pas autorisé";
            }
            if ((strlen($userlastname)) < 1 || (strlen($userlastname)) > 75) {
                $message = "Votre prénom est incorrect, il doit être compris entre 1 et 75 caractères";
            }
            if (intval($userage) < 15) {
                $message = "Vous êtes trop jeune pour créer un compte";
            }
            if (empty($usermail)) {
                $message = "email non valide";
            }
            if (empty($userpass) || strlen($userpass) < 10) {
                $message = "Mot de passe non valide";
            }
            $user = array_map('trim', $_POST);
            if ($message === "null") {
                $userManager = new UserManager();
                $userManager->checkUserIfUse();
                if ($_COOKIE == 'error101') {
                    $message = "Mail déjà existant, veuillez reessayer";
                } else {
                    $userManager->insert($user);
                    header('Location/user/index');
                    $message = "Compte créé, vous pouvez vous connecter";
                }
            }
            return $this->twig->render('User/register.html.twig', ['message' => $message]);
        }
        return $this->twig->render('User/register.html.twig');
    }

    public function edit(int $id): string
    {
        $userManager = new UserManager();
        $user = $userManager->selectOneById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = array_map('trim', $_POST);

            $userManager->update($user);
            header('Location: /User/edit/' . $id);
        }
        return $this->twig->render('User/edit.html.twig', ['user' => $user]);
    }

    public function show(int $id): string
    {
        $userManager = new UserManager();
        $user = $userManager->selectOneById($id);
        return $this->twig->render('User/show.html.twig', ['user' => $user]);
    }

    public function delete(int $id)
    {
        $userManager = new UserManager();
        $userManager->delete($id);
        session_destroy();
        header('Location:/home/index');
    }
}
