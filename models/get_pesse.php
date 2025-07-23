<?php

function getpesse(){
    $port = 'COM1';
    $baud = 9600;
    exec("mode $port BAUD=$baud PARITY=N DATA=8 STOP=1 XON=OFF TO=ON DTR=ON RTS=ON");
    $handle = @fopen($port, 'r+b'); 
    if (!$handle) {
        // $math = random_int(0,10);
        // return $math;

        return intval("11111");
    }
    stream_set_timeout($handle, 1);  
    stream_set_read_buffer($handle, 0);
    // echo "Listening to $port at $baud baud...\n";
    $data = fread($handle, 10);
    if($data == null){
        fclose($handle);
        return 'null prob';
    }
    if($data){
        $data = trim(substr($data, strrpos($data, ' ') + 1));
    }
    fclose($handle);
    return intval($data);
} 
// TODO make this code not be printed in the page
echo json_encode(getpesse());
?>