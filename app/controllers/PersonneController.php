<?php

namespace App\controllers;

use App\Models\person;
use App\View;

class PersonneController
{
    public function index()
    {
        $personnes = person::findAll();
        $view = "pages.personnes.index";
        View::render($view, compact('personnes'));
    }

    public function create()
    {
        $view = "pages.personnes.create";
        $action = "create";
        View::render($view, compact('action'));
    }
    public function store()
    {
        // Check CSRF token
        if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("CSRF token validation failed");
        }
        $payload = [
            'firstName' => htmlspecialchars($_POST['firstName']),
            'lastName' => htmlspecialchars($_POST['lastName']),
            'dateOfBirth' => htmlspecialchars($_POST['dateOfBirth']),
        ];
        $result = person::create($payload);
        if ($result) {
            $personnes = person::findAll();
            $alerts = [
                'success' => 'Personne ajoutée avec succès',
            ];
            View::render("pages.personnes.index", compact('personnes', 'alerts'));
        } else {
            $alerts = [
                'warning' => 'Problème lors de la création',
            ];
            $old = [...$payload];
            View::render("pages.personnes.create", compact('alerts', 'old'));
        }
    }
    public function edit()
    {
        $id = $_GET['id'];
        $personne = person::find($id);
        $old = [
            'firstName' => $personne->firstName,
            'lastName' => $personne->lastName,
            'dateOfBirth' => $personne->dateOfBirth,
        ];
        $view = "pages.personnes.create";
        $action = "edit";
        View::render($view, compact('old', 'action', 'id'));
    }

    public function update()
    {
        $id = $_GET['id'];
        $person = person::find($id);
        $payload = [
            'firstName' => htmlspecialchars($_POST['firstName']),
            'lastName' => htmlspecialchars($_POST['lastName']),
            'dateOfBirth' => htmlspecialchars($_POST['dateOfBirth']),
        ];
        $result = $person->update($payload);
        if ($result) {
            $personnes = person::findAll();
            $alerts = [
                'success' => 'Personne modifiée avec succès',
            ];
            View::render("pages.personnes.index", compact('personnes', 'alerts'));
        } else {
            $alerts = [
                'warning' => 'Problème lors de la modification',
            ];
            $old = [...$payload];
            $action = "edit";
            View::render("pages.personnes.create", compact('alerts', 'old', 'action'));
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        $person = person::find($id);
        $result = $person ? $person->delete() : false;
        if ($result) {
            $alerts = [
                'success' => 'Suppresion OK',
            ];
        } else {
            $alerts = [
                'danger' => 'Suppresion NOK',
            ];
        }
        $personnes = person::findAll();
        $view = "pages.personnes.index";
        View::render($view, compact('personnes', "alerts"));
    }
}
