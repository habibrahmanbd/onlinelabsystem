<?php
    $dir = '';
    $exeData;
    $output;
    $errorFlag;
    $errorDetail = array();

    function makeDir(){
        //
        global $dir;
        $count = 0;
        do{
            $count++;
            $dir = 'source/data'.$count;
        }while(!@mkdir($dir));
    }

    function setUpDirectory(){
        //make source dir : source001, source 002 etc
        //make source file
        global $dir;
        makeDir();
        $source = stripslashes($_REQUEST['source']);
        file_put_contents($dir.'/source.cpp', $source);
    }

    function compile(){
        // compile, get error message, assuming the compiler is in the system PATH
        // cd to compile dir
        global $dir;
        $compileString = 'g++ '.$dir.'/source.cpp -o '.$dir.'/a.exe ';
        global $errorFlag;
        global $errorDetail;
        global $output;
        $output = exec($compileString, $errorDetail, $errorFlag);
		
    }

    function isError(){
        // if error return true
        global $errorFlag;
        return $errorFlag;
    }

    function getError(){
        // get error detail
        global $errorDetail;
        $data = '';
        foreach($errorDetail as $key=>$value){
            $data .= $value.'<br />';
        }
        return $data;
    }
	function showOutput(){
        // get error detail
        global $output;
		return $output;
		// echo "<html><head></head><body><b> {$output}</b></body></html>";
    }

    function getExecutable(){
        // retrieve exe data to memory
        global $exeData;
        global $dir;
        $exeData = @file_get_contents($dir.'/a.exe');
    }

    function cleanUp(){
        // delete all temporary files
        global $dir;
        $alist = scandir($dir); 
        foreach($alist as $key => $value){
            if(is_file($dir.'/'.$value)) {  
                unlink($dir.'/'.$value);
            }
        }

        rmdir($dir);
    }

    function downloadExecutable(){
        // download to browser
        global $exeData;
		return $exeData;
        //outputFile('a.exe', $exeData);
		
    }

    /**
    * download content
    * return value: false=cannot output the header, true=success
    */
    function outputFile($filename, $data){
        //Download file
        if(ob_get_contents())
            return false;
        if(isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'],'MSIE'))
            header('Content-Type: application/force-download');
        else
            header('Content-Type: application/octet-stream');
        if(headers_sent())
            return false;
        header('Content-Length: '.strlen($data));
        header('Content-disposition: attachment; filename="'.$filename.'"');
        echo $data;
    }
?>