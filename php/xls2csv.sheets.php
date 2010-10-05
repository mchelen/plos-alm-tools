<?php

// Converts every sheet in an XLS file to CSV
// Usage: php xls2csv.sheets.php foo.xls
// Requires xls2csv: sudo apt-get install catdoc
// Author: Michael Chelen
// License: Creative Commons Zero


$inputFileName = $argv[1];

echo "Loading file $inputFileName\n";

$cmd= "xls2csv $inputFileName";

// run xls2csv
$output = shell_exec($cmd);

// cut out file extension
$outputFileName = substr($inputFileName,0,strlen($inputFileName)-4);

// split by line feed character
$sheets = explode("\x0C",$output);

foreach ($sheets as $key => $sheet){
// save sheet
  if ($sheet){
    $sheetId = $key + 1;
    $sheetFileName = "$outputFileName.$sheetId.csv";
    echo "Saving sheet $sheetId as $sheetFileName\n";
    $fp = fopen($sheetFileName, 'w');
    fwrite($fp, $sheet);
    fclose($fp);
  }
}
?>
