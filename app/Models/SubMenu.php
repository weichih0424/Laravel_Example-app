<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;
    protected $fillable=['text', 'href', 'menu_id'];

    public function menu(){
        return $this->belongsTo("App\models\Menu", "id", "menu_id");  //目標, 目標id, 自己id
    }
}
