<?php

namespace App\Managements;

use App\Models\Task;

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
        # code...
        break;

      default:
        # code...
        break;
    }
  }
}
