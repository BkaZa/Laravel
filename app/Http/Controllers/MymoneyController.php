<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\MymoneyModel;


class MymoneyController extends BaseController {
    
    public  function proc($proc) {
         $data = MymoneyModel::category();
         return $data;
    }
    
}
?>
