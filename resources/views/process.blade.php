<?php
//echo $proc;
$res = array('1'=>'1111',
             '2'=>'2222'
            );

echo json_encode($res);
exit;
    switch ($data['proc']) {
        case "save":
            echo "save";
            exit;
        break;
        case "category":
                /*$category = DB::table('category')->get();
                
                foreach ($category as $title) {
                    echo $title;
                }*/
            exit;
        break;
    }
    
?>