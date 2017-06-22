<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasks_blue extends Model {

    /**
     * Generated
     */

    protected $table = 'tasks_blues';
    protected $fillable = [
	'TaskName',
	'TaskName1',
	'TaskType',
	'shift_id',
	'active_for_current_show',
	'PermanentTask',
	'created_at',
	'updated_at',
	];

}
