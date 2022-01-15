<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Note extends Model
{
    use Commentable;
}
