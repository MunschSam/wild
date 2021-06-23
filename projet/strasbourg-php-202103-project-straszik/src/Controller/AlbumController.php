<?php

namespace App\Controller;

use App\Model\AbstractManager;
use App\Model\AlbumManager;

class AlbumController extends AbstractController
{
    public function index(): string
    {
        //me connecte à ma table
        $albumManager = new AlbumManager();
        // Je récupère toutes mes données
        $albums = $albumManager->selectAll('name');
        // Je renvois mes données à la vue
        return $this->twig->render('Album/index.html.twig', ['albums' => $albums]);
    }

    public function add(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $album = array_map('trim', $_POST);
            //if ($album['stock'] == 'on') $album['stock'] = 1;

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $albumManager = new AlbumManager();
            $id = $albumManager->insert($album);

            //header c'est la ou tu veux rediriger apres avoir ajouté
            header('Location:/Album/index/' . $id);
        }
        return $this->twig->render('Album/add.html.twig');
    }
    public function edit(int $id): string
    {
        $albumManager = new AlbumManager();
        $album = $albumManager->selectOneById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $album = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, update and redirection
            $albumManager->update($album);
            header('Location: /Album/show/' . $id);
        }

        return $this->twig->render('Album/edit.html.twig', [
            'album' => $album,
        ]);
    }

    public function delete(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $albumManager = new AlbumManager();
            $albumManager->delete($id);
            header('Location:/Album/index');
        }
    }

    public function show(int $id): string
    {
        $albumManager = new AlbumManager();
        $album = $albumManager->selectOneById($id);

        return $this->twig->render('Album/show.html.twig', ['album' => $album]);
    }
}
