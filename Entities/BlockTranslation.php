<?php

namespace Modules\Iblocks\Entities;

use Illuminate\Database\Eloquent\Model;

class BlockTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'iblocks__block_translations';
}
