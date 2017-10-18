<?php

namespace App\Managements;

use App\Models\Task;
use App\Models\Remind;

class EventManagement

{
  // Fonction pour créer un événement
  public function create($event_type, $data)
  {
    switch ($event_type) {

      // Création d'une tâche

      case 'task':

      $task = Task::create($data);

      session()->flash('success', 'Your task has been created with success.');
      return $task->save();

      break;

      // Création d'un rappel

      case 'remind':

      $remind = Remind::create($data);

      session()->flash('success', 'Your remind has been created with success.');
      return $remind->save();

      break;

    }
  }

  // Fonction pour mettre à jour un événement

  public function update($event_type, $id, $data)
  {
    switch ($event_type) {

      // Mis à jour d'une tâche

      case 'task':

      $task = Task::find($id);
      $task->title = $data['title'];
      $task->begin = $data['begin'];
      $task->end = $data['end'];

      session()->flash('success', 'Your task has been updated with success.');
      return $task->save();

      break;

      // Mis à jour d'un rappel

      case 'remind':

      $remind = Remind::find($id);

      $remind->title = $data['title'];
      $remind->day = $data['day'];

      session()->flash('success', 'Your remind has been updated with success.');
      return $remind->save();

      break;

    }
  }

  // Fonction pour supprimer un événement

  public function delete($event_type, $id)
  {
    switch ($event_type) {

      // Suppression d'une tâche

      case 'task':

      $task = Task::find($id);

      $task->delete();

      break;

      // Suppression d'un rappel

      case 'remind':

      $remind = Remind::find($id);

      $remind->delete();

      break;

    }
  }
}
