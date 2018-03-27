<?php
namespace AvoRed\Task\Models;

use AvoRed\Ecommerce\Models\Database\AdminUser;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    protected $fillable = ['title','content','due_date','admin_user_id', 'status'];

    protected $dates = ['due_date','created_at','updated_at'];

    public function adminUser() {
        return $this->belongsTo(AdminUser::class);
    }
}