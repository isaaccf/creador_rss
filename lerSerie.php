<?php

include_once("snoopy.class.php");
include_once("htmlsql.class.php");

function lerSerie($serie) {


    $contido = file_get_contents("http://seriesyonkis.com/serie/" . $serie);

    $wsql = new htmlsql();


    if (!$wsql->connect('url', "http://seriesyonkis.com/serie/" . $serie)) {
        print 'Error while connecting: ' . $wsql->error;
        exit;
    }

    $wsql->isolate_content('<div id="tempycaps">', '<div class="page-links">');
    $sql = "SELECT href, text FROM a";

    if (!$wsql->query($sql)) {
        print "Query error: " . $wsql->error;
        exit;
    }

// show results:
    $saida = array();

    foreach ($wsql->fetch_array() as $row) {
        if (strstr($row[href], "temporada") != FALSE)
            continue;
        $saida[$row[text]] = $row[href];
    }
    return $saida;
}
?>
