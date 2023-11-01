<?php

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;

function generateRandomString($length = 10):string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateNoTrx(){
    $code = generateRandomString();
    $currentDate = date('Ymd');

    $noTrx = "TRX-" . $currentDate . "-" . $code;
    return $noTrx;
}

function convertDate($date){
    // Original date in mm/dd/yyyy format
    $originalDate = "$date";
    // Create a DateTime object from the original date
    $dateTime = DateTime::createFromFormat('m/d/Y', $originalDate);
    // Format the DateTime object to the desired format (Y-m-d)
    $formattedDate = $dateTime->format('Y-m-d');

    return $formattedDate;
}
