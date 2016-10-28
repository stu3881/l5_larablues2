<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model {

    /**
     * Generated
     */

    protected $table = 'volunteer';
    protected $fillable = ['v_index', 'v_name', 'email', 'v_phone', 'v_member', 'v_flag', 'v_assign', 'v_notes'];



}
