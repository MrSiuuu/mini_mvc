<?php

namespace App\Controller;

use App\Repository\BookRepository;

class PageController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'home':
                        // Charger le contrôleur de la page d'accueil
                        $this->home();
                        break;
                    case 'about':
                        // Charger la page À propos
                        $this->about();
                        break;
                    default:
                        throw new \Exception("Cette action n'existe pas : " . $_GET['action']);
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

    /*
    Exemple d'appel depuis l'URL
        ?controller=page&action=home
    */
    public function home()
    {
        $this->render('page/home', [
            'test' => 555
        ]);
    }

    /*
    Gestion de la page À propos
        ?controller=page&action=about
    */
    protected function about()
    {
        $this->render('page/about');
    }
}
