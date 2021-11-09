<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Shop extends Model
{
    use Sortable;

    // nustatoma kuri lentele bus rikiuojama. kintamieji- galioja tik modelyje, yra bibliotekos
    protected $table="shops";

    //nurodomi kintamieji, kurie gali buti pildomi nauja informacija
    protected $fillable=["title", "description", "email", "phone", "country"];

    // nurodomi visi stulpeliai kuriuo norima rikiuoti
    public $sortable= ["id","title", "description", "email", "phone", "country"];

    public function shopCategories () {
        return $this->hasMany(Shop::class, 'shop','id');
    }


}
