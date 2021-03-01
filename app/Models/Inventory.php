<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*use App\Models\BaseModel;
use Modules\Banner\Traits\Banner;
use Modules\Seo\Traits\Seo;
use Modules\Seo\Observers\SeoActionsObserver;*/

class Inventory extends Model
{
	protected $fillable = [
        'id',
        'code',
        'name',
		'price',
		'qty',
		'image'
	];
	
}
