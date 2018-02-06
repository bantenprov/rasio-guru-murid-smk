<?php

namespace Bantenprov\RasioGMSMK\Models\Bantenprov\RasioGMSMK;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RasioGMSMK extends Model
{

    protected $table = 'rasio-guru-murid-smks';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\RasioGMSMK\Models\Bantenprov\RasioGMSMK\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\RasioGMSMK\Models\Bantenprov\RasioGMSMK\Regency','id','regency_id');
    }

}

