<?php
$urls = array('www.Machin.com', 'www.machinTruc.uk', 'ww.Machin.com', 'www.machin.bidule.com', 'WWW.MACHIN-B.COM', 'www.machin-truc-bidule.uk', 'ww.machin-truc.com', 'www.machin.bidule.chose');

foreach ($urls as $url) {
    if (preg_match('#^w{3}\.[a-z]+([\-\.][a-z]+)?\.[a-z]{2,4}$#i', $url)) {
        echo $url . ' est une URL valide<br>';
    } else {
        echo $url . ' <- NON VALIDE !<br>';
    }
}
