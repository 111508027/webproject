<?php
//include database configuration file
include 'config_s.php';

//get records from database
$query = $mysqli->query("SELECT * FROM records ORDER BY mis_id ");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "records_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('mis_id', 'full_name', 'year', 'fees', 'cgpa');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        $lineData = array($row['mis_id'], $row['full_name'], $row['year'], $row['fees'], $row['cgpa']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>