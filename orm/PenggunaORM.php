<?php 
require_once 'config.php'; 
class PenggunaORM extends Model 
{ 
    //nama tabel di database 
    public static $_table = 'pengguna'; 
 
 
    static function getName($id) 
    { 
        $pengguna = self::findOne($id); 
        return ($pengguna) ? $pengguna->level : ''; 
    } 
}