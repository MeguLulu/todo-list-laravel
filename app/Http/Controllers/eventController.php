<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;

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

        $task = new Task;
        $task->title = $request->title;
        $task->begin = $request->begin;
        $task->end = $request->end;

        $task->save();

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
        //
    }

    /**
     * Stock en mémoire la création de le rappel
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRemind(Request $request)
    {
        //
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
