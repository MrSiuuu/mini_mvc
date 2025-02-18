<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Entity\User;


class UserController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'register':
                        $this->register();
                        break;
                    case 'delete':
                        // Appeler méthode delete()
                        break;
                    default:
                        throw new \Exception("Cette action n'existe pas : " . $_GET['action']);
                        break;
                }
            } else {
                throw new \Exception("Aucune action détectée");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }
  
    public function register()
    {
        $errors = [];
        
        if (isset($_POST['saveUser'])) {
            if (empty($_POST['first_name'])) {
                $errors[] = "Le prénom est obligatoire";
            }
            if (empty($_POST['last_name'])) {
                $errors[] = "Le nom est obligatoire";
            }
            if (empty($_POST['email'])) {
                $errors[] = "L'email est obligatoire";
            }
            if (empty($_POST['password'])) {
                $errors[] = "Le mot de passe est obligatoire";
            }

            if (empty($errors)) {
                $userRepository = new UserRepository();
                
                if ($userRepository->findOneByEmail($_POST['email'])) {
                    $errors[] = "Cet email est déjà utilisé";
                } else {
                    $user = new User();
                    $user->setFirstName($_POST['first_name'])
                         ->setLastName($_POST['last_name'])
                         ->setEmail($_POST['email'])
                         ->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));

                    if ($userRepository->add($user)) {
                        header('Location: index.php?controller=auth&action=login');
                        exit;
                    } else {
                        $errors[] = "Erreur lors de l'inscription";
                    }
                }
            }
        }

        $this->render('user/add_edit', [
            'errors' => $errors,
            'pageTitle' => 'Inscription'
        ]);
    }

}
