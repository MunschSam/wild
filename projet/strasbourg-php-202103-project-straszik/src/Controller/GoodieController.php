<?php

namespace App\Controller;

use App\Model\GoodieManager;

class GoodieController extends AbstractController
{
    public function index(): string
    {
        //print my goodie's list
        $goodieManager = new GoodieManager();
        //take all my data
        $goodies = $goodieManager->selectAll('name');

        return $this->twig->render('Goodie/index.html.twig', [
            'goodies' => $goodies
        ]);
    }
    public function show(int $id): string
    {
        $goodieManager = new GoodieManager();
        $goodie = $goodieManager->selectOneById($id);


        return $this->twig->render('Goodie/show.html.twig', ['goodie' => $goodie]);
    }
    // function for edit a goodie

    public function edit(int $id): string
    {

        $goodieManager = new GoodieManager();
        $goodie = $goodieManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $goodie = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, update and redirection
            $goodieManager->update($goodie);
            header('Location: /goodie/show/' . $id);
        }

        return $this->twig->render('Goodie/edit.html.twig', ['goodie' => $goodie]);
    }

// function for add a goodie in table
    public function add(): string
    {
        // Method post in goodie/form.html.twig
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // trim for clean space
            $goodie = array_map('trim', $_POST);

            //if validation ok , insert into table goodie and redirection
            $goodieManager = new GoodieManager();
            $id = $goodieManager->insert($goodie);
// for location, if new add goodie
// in location don't write full url, just controller and method
            header('Location:/Goodie/show/' . $id);
        }

        return $this->twig->render('Goodie/add.html.twig');
    }



    public function delete(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $goodieManager = new GoodieManager();
            $goodieManager->delete($id);
            header('Location:/Goodie/index');
        }
    }
}
