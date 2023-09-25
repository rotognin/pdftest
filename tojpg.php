<?php

require_once('vendor/autoload.php');

$file = "docs/20230925092512-6644000#00 - N43800027BR_00.pdf";
$im = new Imagick($file);

$noOfPagesInPDF = $im->getNumberImages();

$res = 400;

if ($noOfPagesInPDF) {

    for ($i = 0; $i < $noOfPagesInPDF; $i++) {
        $url = $file . '[' . $i . ']';
        $image = new Imagick();
        $image->setResolution($res, $res);
        $image->readimage($url);
        $image->setImageFormat("jpg");
        $image->writeImage("docs/" . basename($file) . '-' . ($i + 1) . '-' . $res . '.jpg');
    }
}
