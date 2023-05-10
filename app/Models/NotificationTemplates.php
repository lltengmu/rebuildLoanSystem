<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationTemplates extends Model
{
    use HasFactory;

    //忽略create_at 和update_at 字段
    public $timestamps = FALSE;
}
