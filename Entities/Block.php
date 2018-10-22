<?php

namespace Modules\Iblocks\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use Translatable;

    protected $table = 'iblocks__blocks';
    public $translatedAttributes = [];
    protected $fillable = [];
}
