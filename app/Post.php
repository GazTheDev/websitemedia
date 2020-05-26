<?php

namespace App;
use Laravelista\Comments\Commentable;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Commentable;


}
