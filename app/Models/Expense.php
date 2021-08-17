<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $primaryKey='expense_id';

    public function expcateInfo(){
      return $this->belongsTo('App\Models\ExpenseCategory','expcate_id','expcate_id');
    }

    public function creator(){
      return $this->belongsTo('App\Models\User','expense_creator','id');
    }
}
