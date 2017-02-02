<?php 
namespace App\Models; // การกำหนดที่อยู่ของ Model
use Illuminate\Database\Eloquent\Model; // การเรียกใช้งาน Eloquent ใน laravel
use Illuminate\Http\Request;
use DB;
    
    class MymoneyModel extends Model {
        
        public static $arrMonth = array ("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");

        public static function category() {
            return DB::table('category')->get();
        }
        
        public static function catVal($val) {
            $category = DB::table('category')->where('cat_id', $val)->first();
            return $category->cat_name;
        }
        
        public static function conv_date($date,$type) {
            
            $exDate = explode('-', $date);
            if($type == 'db'){
                $result = $exDate[2].'-'.$exDate[1].'-'.$exDate[0];
            }
            if($type == 'report'){
                $result = 'วันที่ '.$exDate[2].' '.self::$arrMonth[$exDate[1]].' '.($exDate[0]+543);
            }
            
            return $result;
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
        
        public static function reportData($data) {
            $Sdate = self::conv_date($data['sdate'],'db');
            $Edate = self::conv_date($data['edate'],'db');
            
            $result = DB::table('detail')->whereBetween('d_date', array($Sdate, $Edate))->orderBy('d_date','desc')->get();
            
            return $result;
        }
     
    }

?>