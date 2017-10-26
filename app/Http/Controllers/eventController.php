<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Remind;
use App\Managements\EventManagement;

class eventController extends Controller
{
    // public function dateItem($item) {
    //     // if ($item instanceof Task) {
    //     //     return $this->begin;
    //     // }
    //     // if ($item instanceof Remind) {
    //     //     return $this->day;
    //     // }
    // }

    /**
    * Affiche la liste des tâches et rappels
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
      // Récupération des événements
        $tasks = Task::all();
        $reminds = Remind::all();

        $to_do_list = $tasks->toBase()->merge($reminds)->sortBy(function($e) {
            return $e->date();
        });

        return view('index', [
            'to_do_list' => $to_do_list

        ]);
    }

    // Action de creation des evenements
    public function createEvent(EventManagement $management, $event_type, $data = array())
    {
        $management->create($event_type, $data);
    }

    // Action de mis à jour d'un événement
    public function updateEvent(EventManagement $management, $event_type, $id, $data = array())
    {
        $management->update($event_type, $id, $data);
    }

    // Action de suppression d'un événement
    public function deleteEvent(EventManagement $management, $event_type, $id)
    {
        $management->delete($event_type, $id);
    }

    // Action des Tâches

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
    * Affiche le formulaire pour éditer une tâche précise
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function editTask($id)
    {
        // Récupération de l'id
        $task = Task::find($id);
        return view('task.edit')->withTask($task);
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

        // Validée les données
        $this->validate($request, array(
            'title' => 'required|max:255',
            'begin' => 'required|date|before:end',
            'end' => 'required|date|after:begin',
        ));

        // save the data to the database
        $this->updateEvent(app()['EventManagement'], 'task', $id,
        [
            'title' => $request->input('title'),
            'begin' => $request->input('begin'),
            'end' => $request->input('end')
        ]);

        return redirect()->route('index');
    }

    /**
    * Retire la tâche sélectionner de la base de données
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroyTask($id)
    {
        $this->deleteEvent(app()['EventManagement'], 'task', $id);
    }

    // Action des Rappels

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
    * Affiche le formulaire pour éditer un rappel précise
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function editRemind($id)
    {
        $remind = Remind::find($id);
        return view('remind.edit')->withTask($remind);
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
        // Validée les données
        $this->validate($request, array(
            'title' => 'required|max:255',
            'day' => 'required|date|after:yesterday',
        ));

        // save the data to the database
        $this->updateEvent(app()['EventManagement'], 'remind', $id,
        [
            'title' => $request->input('title'),
            'day' => $request->input('day'),
        ]);

        return redirect()->route('index');
    }

    /**
    * Retire le rappel sélectionner de la base de données
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroyRemind($id)
    {
        $this->deleteEvent(app()['EventManagement'], 'remind', $id);


    }
}
