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
                return date("d-m-Y");
            break;
        }
        
    }
    
    public function saveData(Request $Request) {
        
        $sendData = array();
        $sendData['proc']= $Request->proc; 
        $sendData['type']= $Request->type; 
        $sendData['date']= MymoneyModel::conv_date($Request->date,'db'); 
        $sendData['detail']= $Request->detail;
        $sendData['price']= $Request->price;
        
        $respone= MymoneyModel::saveData($sendData); 
        
        return $respone;
        
    }
    
    public function reportData(Request $Request) {
        
        $sendData = array();
        $sendData['proc']= $Request->proc; 
        $sendData['sdate']= $Request->sdate;
        $sendData['edate']= $Request->edate;
        
        $obj= MymoneyModel::reportData($sendData); 
        
        $table  = '<table width="100%" border="1">';
        $table .= '<tr>';
        $table .= '<th><div align="center">ลำดับ</div></th>';
        $table .= '<th><div align="center">รายละเอียด</div></th>';
        $table .= '<th><div align="center">ประเภท</div></th>';
        $table .= '<th><div align="center">ราคา</div></th>';
        $table .= '</tr>';
        $i=1;
        $tempvDate = '';
        foreach ($obj as $val) {
            $vDate = $val->d_date; 
            $vDetail = $val->d_detail; 
            $vCat = $val->cat_id;
            $vMoney = $val->d_money;
        
        if($vDate!=$tempvDate){
        $table .= '<tr>';
        $table .= '<th colspan="4">'.MymoneyModel::conv_date($vDate,'report').'</th>';
        $table .= '</tr>';
        }
        $table .= '<tr>';
        $table .= '<td>'.$i.'</td>';
        $table .= '<td>'.$vDetail.'</td>';
        $table .= '<td>'.MymoneyModel::catVal($vCat).'</td>';
        $table .= '<td>'.number_format($vMoney).'</td>';
        $table .= '</tr>';
           $i++;
           $tempvDate=$vDate;
        }
        $table .= '</table>';
        
        $respone = $table;
        
        return $respone;
        
    }
    
    
    
}
?>
