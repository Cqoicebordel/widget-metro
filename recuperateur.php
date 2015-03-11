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
    $prochains = [$premier[1][0], $deuxieme[1], $premier[1][1], $quatrieme[1]];
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
    preg_match_all('/class="schmsg1"><b>(.*?)<\/b>/', $html, $premiers);
    preg_match_all('/class="schmsg3"><b>(.*?)<\/b>/', $html, $deuxiemes);
    $prochains = [[$directions[1][0], $premiers[1][0], $deuxiemes[1][0]],[$directions[1][1], $premiers[1][1], $deuxiemes[1][1]]];
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
    $prochains = [[$directions[1][0], $premiers[1][0], $deuxiemes[1][0]],[$directions[1][1], $premiers[1][1], $deuxiemes[1][1]]];
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
    $prochains = [$premier[1][0], $deuxieme[1]];
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
    $prochains = [$premier[1][0], $deuxieme[1][0], $premier[1][1], $deuxieme[1][1], $premier[1][2], $deuxieme[1][2]];
    return $prochains;
}

?>