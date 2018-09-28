<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
	// Khai báo table để thao tác
    public $table = 'tbl_category_news';
    // Khai báo để laravel hiểu là không có create_at và update_at
    public $timestamps = false;
}
