<?php
function randomname(){
    $principio=array( "Xiaomi", "Samsung", "Honor", "IPad", "huawei", "Realme", "Cubot", "Oppo",
    "Xtrem", "Windows", "Alcatel", "Nokia", "Meizu", "Umidgi" );
    $medio=array( " air", " mi", " plus", " note", " pad", " tab", " M", "Z", " A", " B", " C"," D", " F", " G", " H", " I", " J", " Version", " P", " R");
    $principiorand=$principio[array_rand($principio)];
    $mediorand=$medio[array_rand($medio)];
    $final=$principiorand . $mediorand;
    return $final;
}
function rand_int($st_num=100,$end_num=9999,$mul=1){
    if ($st_num>$end_num) return false;
    return mt_rand($st_num*$mul,$end_num*$mul)/$mul;
}
function rand_float($st_num=0,$end_num=10,$mul=100){
    if ($st_num>$end_num) return false;
    return mt_rand($st_num*$mul,$end_num*$mul)/$mul;
}
function dummies(){
    for ($i=0;$i<20;$i++){
        $data = [
            "nombre" => randomname(),
            "fpublic" => "12/02/2019",
            "price" => rand_int(),
            "marca" => "Null",
            'colores' => Array ( "Azul:Negro:Blanco:Rojo" ),
            "sim"=> "Yes",
            "rating"=> rand_float()
        ];
        $tabletdao= new TabletsDAO();
        if(FindNameTablet($data['nombre'])==false){
            $tabletdao->save($data);
        }

    }
}
?>