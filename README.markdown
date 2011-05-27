Tools for working with Public Library of Science Article Level Metrics
Contributors: Michael Chelen
License: Creative Commons Public Domain Zero CC0 1.0 Universal
http://creativecommons.org/publicdomain/zero/1.0/


## Script ##
drupal:
    CCK
        plos_alm_summary_alm_data
    Views
        articles_search

php:
    csv:
        xls2csv.sheet.php
  

## Data ##
original
    Data from http://www.plos.org/downloads/plos-alm.zip
    Version: v4-11302010
    Notes: "This sheet is version 4.0, created on Nov 30th 2010, containing data which is correct as of Oct 31st, 2010"
        
converted
    Converted to .CSV with Catdoc xls2csv
      Used xls2csv.split.sheets.php from http://github.com/mchelen/plos-alm-tools

contrib
    works and samples
