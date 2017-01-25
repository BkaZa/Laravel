<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\MymoneyModel;
use Illuminate\Http\Request;

class MymoneyController extends BaseController {
    
    public function proc($proc) {
        
        switch ($proc) {
            case "category" :
                
                $data = MymoneyModel::category();
                
                return $data;
            break;
            
            case "today" :
                return date("Y-m-d");
            break;
        }
        
    }
    
    public function saveData(Request $Request) {
        
        $sendData = array();
        $sendData['proc']= $Request->proc; 
        $sendData['type']= $Request->type; 
        $sendData['date']= $Request->date; 
        $sendData['detail']= $Request->detail;
        $sendData['price']= $Request->price;
        
        $respone= MymoneyModel::saveData($sendData); 
        
        return $respone;
        
    }
    
    
}
?>
