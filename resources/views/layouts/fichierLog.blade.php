<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <?php
    
    $logFile = fopen("fichierLog.log", "r");

    echo 'PRINTING THE LOGS FILE LINE BY LINE';
    echo '<br/> <br/>';

    // The associative array that gets the final result
    // Should be an array of Models (in larabel): list of objects
    $tableLogs = array();

    // Counter refering to the number of lines read from this log file
    $lineNumber = 1;

    // Loop over each file's line
    while (!feof($logFile)) {
        // We get the current file's line
        $line = fgets($logFile);

        // Split the log entries as they are separated by a single space character
        $entries = explode(" ", $line);

        // print_r($entries);

        // A single log line data, should be a model object in laravel: the model of log
        $lineLog = array();
        
        // loop over the entries to have each key-value data
        foreach($entries as $entry) {
            // Split the entry by = to have each part of the data
            $data = explode("=", $entry);

            // Let's get the key & value of the current data
            $key = $data[0];
            $value = $data[1];

            $lineLog[$key] = $value;
        }

        // Only process a log line that has a logid (unique field of each log)
        if (isset($lineLog['logid'])) {
            // Uncomment these lines for line by line printing of the logs
            echo '<br/>';
            echo 'START PRINTING LINE ' . $lineNumber;
            echo '<br/>';
            print_r($lineLog);
            echo '<br/>';
            echo 'END PRINTING LINE ' . $lineNumber;
            echo '<br/>';
            
            // We save the log ($lineLog) to the database: supposing there is a 'log' table/model into the laravel project
            // DB::table('log')->insert($lineLog);

            // Here we push the log's line to the final array
            array_push($tableLogs, $lineLog); // This line should be removed in a normal application
        }

        $lineNumber++;
    }

    echo '<br/> <br/>';
    echo 'PRINTING ALL THE LINES ONCE';
    echo '<br/> <br/> <br/>';

    // Let's print the final logs got from the file
    print_r($tableLogs); // This line should be removed in the final application, just here for logging/debuging

    echo '<br/> <br/>';
    echo 'END';
    
    // Close the file to set free the resource
    fclose($logFile);
?>

</body>
</html>

