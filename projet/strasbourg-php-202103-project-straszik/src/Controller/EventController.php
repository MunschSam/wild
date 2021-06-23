<?php

namespace App\Controller;

use App\Model\EventManager;

class EventController extends AbstractController
{
    public function index(): string
    {
        $eventManager = new EventManager();
        $events = $eventManager->selectAll('name');

        return $this->twig->render('Event/index.html.twig', ['events' => $events]);
    }

    /* ----------------
        SHOW event
    ------------------*/
    public function show(int $id): string
    {
        $eventManager = new EventManager();
        $event = $eventManager->selectOneById($id);

        return $this->twig->render('Event/show.html.twig', ['event' => $event]);
    }

    /* ----------------
        EDIT event
    ------------------*/
    public function edit(int $id): string
    {
        $eventManager = new EventManager();
        $event = $eventManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $event = array_map('trim', $_POST);

            $eventManager->update($event);
            header('Location: /event/show' . $id);
        }

        return $this->twig->render('Event/edit.html.twig', [
            'event' => $event,
        ]);
    }

    /* ----------------
        ADD event
    ------------------*/
    public function add(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $event = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $eventManager = new EventManager();
            $id = $eventManager->insert($event);
            header('Location:/event/show/' . $id);
        }

        return $this->twig->render('Event/add.html.twig');
    }


    /* ----------------
        DELETE event
    ------------------*/
    public function delete(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $eventManager = new EventManager();
            $eventManager->delete($id);
            header('Location:/event/index');
        }
    }
}
