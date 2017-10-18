<?php

namespace App\Managements;

use App\Models\Task;
use App\Models\Remind;

class EventManagement

{
  public function create($event_type, $data)
  {
    switch ($event_type) {

      case 'task':

      $task = Task::create($data);

      session()->flash('success', 'Your task has been created with success.');
      return $task->save();

      break;

      case 'remind':

      $remind = Remind::create($data);

      session()->flash('success', 'Your remind has been created with success.');
      return $remind->save();

      break;

    }
  }
  public function update($event_type, $id, $data)
  {
    switch ($event_type) {

      case 'task':

      $task = Task::find($id);
      $task->title = $data['title'];
      $task->begin = $data['begin'];
      $task->end = $data['end'];

      session()->flash('success', 'Your task has been updated with success.');
      return $task->save();

      break;

      case 'remind':

      $remind = Remind::find($id);

      $remind->title = $data['title'];
      $remind->day = $data['day'];

      session()->flash('success', 'Your remind has been updated with success.');
      return $remind->save();

      break;

    }
  }

  public function delete($event_type, $id)
  {
    switch ($event_type) {

      case 'task':

      $task = Task::find($id);

      $task->delete();

      break;

      case 'remind':

      $remind = Remind::find($id);

      $remind->delete();
      
      break;

    }
  }
}
