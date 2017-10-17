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

      $task = new Task;
      $task->title = $data['title'];
      $task->begin = $data['begin'];
      $task->end = $data['end'];

      return $task->save();

      break;

      case 'remind':

      $remind = new Remind;
      $remind->title = $data['title'];
      $remind->day = $data['day'];

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

      return $task->save();

      break;

      case 'remind':

      $remind = Remind::find($id);

      $remind->title = $data['title'];
      $remind->day = $data['day'];

      return $remind->save();

      break;

    }
  }
}
