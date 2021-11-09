<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use Sortable;

    // nustatoma kuri lentele bus rikiuojama. kintamieji- galioja tik modelyje, yra bibliotekos
    protected $table="products";

    //nurodomi kintamieji, kurie gali buti pildomi nauja informacija
    protected $fillable=["title", "excertpt", "description", "price", "image"];

    // nurodomi visi stulpeliai kuriuo norima rikiuoti
    public $sortable= ["id", "title", "excertpt", "description", "price", "image"];

    public function productCategory() {
        return $this->belongsTo(Category::class, "category_id", "id");
    }
}
