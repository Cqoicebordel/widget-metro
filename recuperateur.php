<?php


/**
 * Récupérateur des métros
 * @return Les quatres suivants dans un tableau.
 */
function getMetroSuivant($line, $stationID, $sens){
    $url = 'http://wap.ratp.fr/siv/schedule-schedule?dummy=1393004301270&schedule?service=next&reseau=metro&lineid=M'.$line.'&directionsens='.$sens.'&stationid='.$stationID;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_COOKIESESSION, true); 
    $cookie= "useridsource=bot;";
    curl_setopt($curl, CURLOPT_COOKIE, $cookie);
    curl_setopt($curl, CURLOPT_USERAGENT, 'En cas de soucis, @Cqoicebordel');
    $html = curl_exec($curl);
    curl_close($curl);

    preg_match_all('/class="schmsg1"><b>(.*)<\/b><\/div><div class="bg3">/', $html, $premier);
    preg_match('/class="schmsg3"><b>(.*)<\/b><\/div><div class="bg1">.*\n.*class="schmsg1"><b>/', $html, $deuxieme);
    preg_match('/class="schmsg3"><b>(.*)<\/b><\/div><div class="seppage">/', $html, $quatrieme);
    $prochains = [];
    if(isset($premier[1][0])){
        $prochains[0] = $premier[1][0];
    }
    if(isset($deuxieme[1])){
        $prochains[1] = $deuxieme[1];
    }
    if(isset($premier[1][1])){
        $prochains[2] = $premier[1][1];
    }
    if(isset($quatrieme[1])){
        $prochains[3] = $quatrieme[1];
    }
    return $prochains;
}

/**
 * Récupérateur des bus
 * @return Tableau avec [["direction", suivant, suivant],["direction", suivant, suivant]]
 */
function getBusSuivant($line, $stationID){
    $url = 'http://wap.ratp.fr/siv/schedule-schedule?dummy=1393004301270&schedule?service=next&reseau=bus&lineid=B'.$line.'&stationid='.$stationID;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_COOKIESESSION, true); 
    $cookie= "useridsource=bot;";
    curl_setopt($curl, CURLOPT_COOKIE, $cookie);
    curl_setopt($curl, CURLOPT_USERAGENT, 'En cas de soucis, @Cqoicebordel');
    $html = curl_exec($curl);
    curl_close($curl);

    preg_match_all('/Direction&nbsp;<b class="bwhite">(.*)<\/b>/', $html, $directions);
    preg_match_all('/class="schmsg1"><b>(.*)<\/b>/', $html, $premiers);
    preg_match_all('/class="schmsg3"><b>(.*)<\/b><\/div>/U', $html, $deuxiemes);
    $prochains = [[]];
    if(isset($directions[1][0])){
        $prochains[0][0] = $directions[1][0];
    }
    if(isset($premiers[1][0])){
        $prochains[0][1] = $premiers[1][0];
    }
    if(isset($deuxiemes[1][0])){
        $prochains[0][2] = $deuxiemes[1][0];
    }
    if(isset($directions[1][1])){
        $prochains[1][0] = $directions[1][1];
    }
    if(isset($premiers[1][1])){
        $prochains[1][1] = $premiers[1][1];
    }
    if(isset($deuxiemes[1][1])){
        $prochains[1][2] = $deuxiemes[1][1];
    }
    return $prochains;
}

/**
 * Récupérateur des noctiliens
 * @return Tableau avec [["direction", suivant, suivant],["direction", suivant, suivant]]
 */
function getNoctilienSuivant($line, $stationID){
    $url = 'http://wap.ratp.fr/siv/schedule-schedule?dummy=1393004301270&schedule?service=next&reseau=noctilien&lineid=BN'.$line.'&stationid='.$stationID;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_COOKIESESSION, true); 
    $cookie= "useridsource=bot;";
    curl_setopt($curl, CURLOPT_COOKIE, $cookie);
    curl_setopt($curl, CURLOPT_USERAGENT, 'En cas de soucis, @Cqoicebordel');
    $html = curl_exec($curl);
    curl_close($curl);

    preg_match_all('/Direction&nbsp;<b class="bwhite">(.*?)<\/b>/', $html, $directions);
    preg_match_all('/class="bg1"><b>(.*?)<\/b>/', $html, $premiers);
    preg_match_all('/class="bg3"><b>(.*?)<\/b>/', $html, $deuxiemes);
    $prochains = [[]];
    if(isset($directions[1][0])){
        $prochains[0][0] = $directions[1][0];
    }
    if(isset($premiers[1][0])){
        $prochains[0][1] = $premiers[1][0];
    }
    if(isset($deuxiemes[1][0])){
        $prochains[0][2] = $deuxiemes[1][0];
    }
    if(isset($directions[1][1])){
        $prochains[1][0] = $directions[1][1];
    }
    if(isset($premiers[1][1])){
        $prochains[1][1] = $premiers[1][1];
    }
    if(isset($deuxiemes[1][1])){
        $prochains[1][2] = $deuxiemes[1][1];
    }
    return $prochains;
}

/**
 * Récupérateur des tramways
 * @return Les deux suivants dans un tableau.
 */
function getTramwaySuivant($line, $stationID, $sens){
    $url = 'http://wap.ratp.fr/siv/schedule-schedule?dummy=1393004301270&schedule?service=next&reseau=tram&lineid=BT'.$line.'&directionsens='.$sens.'&stationid='.$stationID;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_COOKIESESSION, true); 
    $cookie= "useridsource=bot;";
    curl_setopt($curl, CURLOPT_COOKIE, $cookie);
    curl_setopt($curl, CURLOPT_USERAGENT, 'En cas de soucis, @Cqoicebordel');
    $html = curl_exec($curl);
    curl_close($curl);

    preg_match_all('/class="schmsg1"><b>(.*)<\/b><\/div><div class="bg3">/', $html, $premier);
    preg_match('/class="schmsg3"><b>(.*?)<\/b>/', $html, $deuxieme);
    $prochains = [];
    if(isset($premier[1][0])){
        $prochains[0] = $premier[1][0];
    }
    if(isset($deuxieme[1])){
        $prochains[1] = $deuxieme[1];
    }
    return $prochains;
}

/**
 * Récupérateur des RERs
 * @return Les deux suivants dans un tableau.
 */
function getRERSuivant($line, $stationID, $sens){
    $url = 'http://wap.ratp.fr/siv/schedule-schedule?dummy=1393004301270&schedule?service=next&reseau=rer&lineid=R'.$line.'&directionsens='.$sens.'&stationid='.$stationID;

     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, $url);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($curl, CURLOPT_COOKIESESSION, true); 
     $cookie= "useridsource=bot;";
    curl_setopt($curl, CURLOPT_COOKIE, $cookie);
     curl_setopt($curl, CURLOPT_USERAGENT, 'En cas de soucis, @Cqoicebordel');
     $html = curl_exec($curl);
     curl_close($curl);

    preg_match_all('/class="schmsg1"><b>(.*)<\/b><\/div><div class="bg3">/', $html, $premier);
    preg_match_all('/class="schmsg3"><b>(.*?)<\/b>/', $html, $deuxieme);
    $prochains = [];
    if(isset($premier[1][0])){
        $prochains[0] = $premier[1][0];
    }
    if(isset($deuxieme[1][0])){
        $prochains[1] = $deuxieme[1][0];
    }
    if(isset($premier[1][1])){
        $prochains[2] = $premier[1][1];
    }
    if(isset($deuxieme[1][1])){
        $prochains[3] = $deuxieme[1][1];
    }
    if(isset($premier[1][2])){
        $prochains[4] = $premier[1][2];
    }
    if(isset($deuxieme[1][2])){
        $prochains[5] = $deuxieme[1][2];
    }
    return $prochains;
}

?>