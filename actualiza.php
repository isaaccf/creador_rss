<?php

include_once("funcions.php");

$serie = $_GET["serie"];
//echo "<p>$serie</p>";
$capitulosAntigo = array();


if (file_exists($serie.".xml")){
    $xml = simplexml_load_file($serie . ".xml");
    if ($xml) {
        foreach ($xml->channel->item as $capitulo) {
            $capitulosAntigo[$capitulo[nome]] = $capitulo[href];
        }
    } else
        header("location:index.php?r=1");
}

$capitulosNovo = lerSerie($serie);

if (count($capitulosAntigo) != count($capitulosNovo)) {

    $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n";
    $xml .= "<rss version=\"2.0\">\n";
    $xml .= "\t<channel>\n";
    $xml .= "\t\t<title>$serie</title>\n";
    $xml .= "\t\t<link>http://www.seriesyonkis.com/serie/$serie/</link>\n";
    $xml .= "\t\t<description>Capitulos da serie \"$serie\"</description>\n";
    foreach ($capitulosNovo as $text => $href){
        $xml .= "\t\t<item>\n";
        $xml .= "\t\t\t<title>";
        $xml .= $text;
        $xml .= "</title>\n";
        $xml .= "\t\t\t<link>";
        $xml .= $href;
        $xml .= "</link>\n";
        $xml .= "\t\t\t<description>";
        $xml .= $href;
        $xml .= "</description>\n";
        $xml .= "\t\t</item>\n";
    }
    $xml .= "\t</channel>\n";
    $xml .= "</rss>";
    $ficheiro = fopen($serie.".xml", "w");
    
    if ($ficheiro == NULL) echo "<p>erro fich</p>";//header("Location:index.php?r=1");
    
    if(fputs($ficheiro, $xml)){
        actualizarLista($serie);
        header("Location:index.php?r=0");
    }
    else header("location:index.php?r=1");
    if (!fclose($ficheiro)) header("Location:index.php?r=1");
    header("location:index.php?r=0");

}
?>
