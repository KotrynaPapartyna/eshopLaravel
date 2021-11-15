<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use Sortable;

    // nustatoma kuri lentele bus rikiuojama. kintamieji- galioja tik modelyje, yra bibliotekos
    protected $table="categories";

    //nurodomi kintamieji, kurie gali buti pildomi nauja informacija
    protected $fillable=["title", "description"];

    // nurodomi visi stulpeliai kuriuo norima rikiuoti
    public $sortable= ["id", "title", "description"];

    public function categoryShop() {
        return $this->belongsTo(Shop::class, "shop_id", "id");
    }

}
