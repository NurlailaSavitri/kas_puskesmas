<?php 
require_once 'config.php'; 
class PasienORM extends Model 
{ 
    //nama tabel di database 
    public static $_table = 'pasien'; 
 
 
    static function getName($id) 
    { 
        $pasien = self::findOne($id); 
        return ($pasien) ? $pasien->nama_pasien : ''; 
    } 
}