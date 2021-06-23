<?php

namespace App\Controller;

use App\Model\ArtistManager;

class ArtistController extends AbstractController
{
    /**
     * List artists
     */
    public function index(): string
    {
        $artistManager = new ArtistManager();
        $artists = $artistManager->selectAll('name');

        return $this->twig->render('Artist/index.html.twig', ['artists' => $artists]);
    }

    /**
     * Show informations for a specific Artist
     */
    public function show(int $id): string
    {
        $artistManager = new ArtistManager();
        $artist = $artistManager->selectOneById($id);

        return $this->twig->render('Artist/show.html.twig', ['artist' => $artist]);
    }

    /**
     * Edit a specific Artist
     */
    public function edit(int $id): string
    {
        $artistManager = new ArtistManager();
        $artist = $artistManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $artist = array_map('trim', $_POST);

            $artistManager->update($artist);

            header('Location: /Artist/show/' . $id);
        }

        return $this->twig->render('Artist/edit.html.twig', [
            'artist' => $artist,
        ]);
    }

    /**
     * Add a new Artist
     */
    public function add(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $artist = array_map('trim', $_POST);

            $artistManager = new ArtistManager();
            $id = $artistManager->insert($artist);
            header('Location: /Artist/show/' . $id);
        }

        return $this->twig->render('Artist/add.html.twig');
    }

    /**
     * Delete a specific Artist
     */
    public function delete(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $artistManager = new ArtistManager();
            $artistManager->delete($id);
            header('Location: /Artist/index');
        }
    }
}
