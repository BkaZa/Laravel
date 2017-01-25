<?php 
namespace App\Models; // การกำหนดที่อยู่ของ Model
use Illuminate\Database\Eloquent\Model; // การเรียกใช้งาน Eloquent ใน laravel
use Illuminate\Http\Request;
use DB;
    
    class MymoneyModel extends Model {

        public static function category() {
            return DB::table('category')->get();
        }
        
        public static function saveData($data) {
            try {
            
            $insertData = array( 
                                     $data['type'], 
                                     $data['date'], 
                                     $data['detail'],
                                     $data['price'],
                                     0
                );

                DB::insert('insert into detail (cat_id, d_date, d_detail, d_money, delete_st) values (?, ?, ?, ?, ?)', $insertData);
                
                $message = 'success';
            } catch (\Exception $e) {
                $message = $e;
            }
            
            return $message;
        }
     
    }

?>