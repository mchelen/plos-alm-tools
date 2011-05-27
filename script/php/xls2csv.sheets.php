<?php

/* Converts every sheet in an XLS file to CSV
 * Usage: php xls2csv.sheets.php foo.xls
 * Requires xls2csv: sudo apt-get install catdoc
 * Author: Michael Chelen
 * License: Creative Commons Zero http://creativecommons.org/publicdomain/zero/1.0/
 */

// get file name from command line
$inputFileName = $argv[1];

echo "Loading file $inputFileName\n";

$cmd= "xls2csv $inputFileName";

// run xls2csv
$output = shell_exec($cmd);

// use input file name as base for output files
// cut out file extension from input file name
$outputFileName = substr($inputFileName,0,strlen($inputFileName)-4);

// split by line feed character
$sheets = explode("\x0C",$output);

foreach ($sheets as $key => $sheet){
// save sheet
  if ($sheet){
    // number sheets for file name
    $sheetId = $key + 1;
    // set file name
    $sheetFileName = "$outputFileName.$sheetId.csv";
    // notify user
    echo "Saving sheet $sheetId as $sheetFileName\n";
    // write file
    $fp = fopen($sheetFileName, 'w');
    fwrite($fp, $sheet);
    // close file
    fclose($fp);
  }
}
?>
