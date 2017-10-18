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

      return $task->save();

      break;

      case 'remind':

      $remind = Remind::create($data);

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

  public function delete($event_type, $id)
  {
    switch ($event_type) {

      case 'task':

      $task = Task::find($id);

      $task->delete();

      // return redirect()->route('index');

      break;

      case 'remind':

      $remind = Remind::find($id);

      $remind->delete();

      // return redirect()->route('index');

      break;

    }
  }
}
