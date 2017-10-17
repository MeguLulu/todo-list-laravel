<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Managements\EventManagement;

class eventController extends Controller
{
    /**
     * Affiche la liste des tâches et rappels
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    // Action de creation des evenements
    public function createEvent(EventManagement $management, $event_type, $data = array())
    {
        $management->create($event_type, $data);
    }

    // Action des reminds

    /**
     * Affiche le formulaire pour créer une tâche
     *
     * @return \Illuminate\Http\Response
     */
    public function createTask()
    {
        return view('task.create');
    }

    /**
     * Stock en mémoire la création de la tâche
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTask(Request $request)
    {

        // Validée les données
        $this->validate($request, array(
            'title' => 'required|max:255',
            'begin' => 'required|date|before:end',
            'end' => 'required|date|after:begin',
        ));

        // Stocker les données
        $this->createEvent(app()['EventManagement'], 'task',
        [
            'title' => $request->title,
            'begin' => $request->begin,
            'end' => $request->end
        ]);

        return redirect()->route('index');
    }

    /**
     * Affiche une tâche précise
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTask($id)
    {
        //
    }

    /**
     * Affiche le formulaire pour éditer une tâche précise
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTask($id)
    {
        //
    }

    /**
     * Met à jour dans la base donnée la tâche modifié
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTask(Request $request, $id)
    {
        //
    }

    /**
     * Retire la tâche sélectionner de la base de données
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyTask($id)
    {
        //
    }

    // Action des rappels

    /**
     * Affiche le formulaire pour créer un rappel
     *
     * @return \Illuminate\Http\Response
     */
    public function createRemind()
    {
        return view('remind.create');
    }

    /**
     * Stock en mémoire la création de le rappel
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRemind(Request $request)
    {
        // Validée les données
        $this->validate($request, array(
            'title' => 'required|max:255',
            'day' => 'required|date|after:yesterday',
        ));

        // Stocker les données
        $this->createEvent(app()['EventManagement'], 'remind',
        [
            'title' => $request->title,
            'day' => $request->day
        ]);

        return redirect()->route('index');
    }

    /**
     * Affiche un rappel précis
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showRemind($id)
    {
        //
    }

    /**
     * Affiche le formulaire pour éditer un rappel précise
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editRemind($id)
    {
        //
    }

    /**
     * Met à jour dans la base donnée le rappel modifié
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRemind(Request $request, $id)
    {
        //
    }

    /**
     * Retire le rappel sélectionner de la base de données
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyRemind($id)
    {
        //
    }
}
