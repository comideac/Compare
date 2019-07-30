<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

set_time_limit(500);

function arroba(){
    $db = new mysqli('localhost', 'root', '', 'Compare');
    $arroba = 'arroba.xlsx';
    $arroba = IOFactory::load($arroba);
    $arroba = $arroba->getActiveSheet()->toArray(null, true, true, true);
    for($i=1; $i<count($arroba); $i++){
        $reference = $arroba[$i]['A']; // -> Referencia
        $price = $arroba[$i]['G']; // -> Precio
        $query = $db->query('INSERT INTO Producto (Referencia) VALUES ("'.$reference.'")');
        $dater = $db->query('UPDATE Producto SET PrecioArroba = '.$price.' WHERE Referencia = "'.$reference.'"');
    }
    $db->close();
}

function fastek(){
    $db = new mysqli('localhost', 'root', '', 'Compare');
    $fastek = 'fastek.xlsx';
    $fastek = IOFactory::load($fastek);
    $fastek = $fastek->getActiveSheet()->toArray(null, true, true, true);
    for($i=1; $i<count($fastek);$i++){
        $reference = $fastek[$i]['A'];
        $price = $fastek[$i]['C'];
        $query = $db->query('INSERT INTO Producto (Referencia) VALUES ("'.$reference.'")');
        $dater = $db->query('UPDATE Producto SET PrecioFastek = '.$price.' WHERE Referencia = "'.$reference.'"');
    }
    $db->close();
}

function ideac(){
    $db = new mysqli('localhost', 'root', '', 'Compare');
    $ideac = 'ideac.xlsx';
    $ideac = IOFactory::load($ideac);
    $ideac = $ideac->getActiveSheet()->toArray(null, true, true, true);
    for($i=1; $i<count($ideac); $i++){
        $reference = $ideac[$i]['B'];
        $price = $ideac[$i]['G'];
        $query = $db->query('INSERT INTO Producto (Referencia) VALUES ("'.$reference.'")');
        $dater = $db->query('UPDATE Producto SET PrecioIdeac = '.$price.' WHERE Referencia = "'.$reference.'"');
    }
    $db->close();
}

function importacion(){
    $db = new mysqli('localhost', 'root', '', 'Compare');
    $importacion = 'importacion.xlsx';
    $importacion = IOFactory::load($importacion);
    $importacion = $importacion->getActiveSheet()->toArray(null, true, true, true);
    for($i=1; $i<count($importacion); $i++){
        $reference = $importacion[$i]['A'];
        $price = $importacion[$i]['D'];
        $query = $db->query('INSERT INTO Producto (Referencia) VALUES ("'.$reference.'")');
        $dater = $db->query('UPDATE Producto SET PrecioImportacion = '.$price.' WHERE Referencia = "'.$reference.'"');
    }
    $db->close();
}

function techsmart(){
    $db = new mysqli('localhost', 'root', '', 'Compare');
    $techsmart = 'techsmart.xlsx';
    $techsmart = IOFactory::load($techsmart);
    $techsmart = $techsmart->getActiveSheet()->toArray(null, true, true, true);
    for($i=1; $i<count($techsmart); $i++){
        $reference = $techsmart[$i]['A'];
        $price = $techsmart[$i]['D'];
        $query = $db->query('INSERT INTO Producto (Referencia) VALUES ("'.$reference.'")');
        $dater = $db->query('UPDATE Producto SET PrecioTechsmart = '.$price.' WHERE Referencia = "'.$reference.'"');
    }
    $db->close();
}

$tdb = new mysqli('localhost', 'root', '', 'compare');
$tquery = $tdb->query("SELECT Referencia, PrecioArroba FROM producto");
$tquery = $tquery->num_rows;
echo '<table>';
for($i=1; $i<$tquery; $i++){
    $pQuery = $tdb->query('SELECT * FROM Producto WHERE id = '.$i);
    $pQuery = $pQuery->fetch_array(MYSQLI_ASSOC);
    
    #$cPrice = min($cPrice);
    #echo '<tr>';
    #echo '<td>'.$pQuery['Referencia'].'</td><td>'.$minPrice.'</td>';
    #echo '</tr>';
}
echo '</table>';

?>