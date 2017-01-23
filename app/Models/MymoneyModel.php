<?php 
namespace App\Models; // การกำหนดที่อยู่ของ Model
use Illuminate\Database\Eloquent\Model; // การเรียกใช้งาน Eloquent ใน laravel
use DB;
    
    class MymoneyModel extends Model {

        public static function category() {
            return DB::table('category')->get();
        }
     
    }

?>