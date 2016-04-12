<?php
include ("../includes/compiler-gcc-mingw.php");

$docompile = intval($_REQUEST['docompile']);
if($docompile){
    //compile
    setUpDirectory();
    compile();
    if(IsError()){
        //
        cleanUp();
    }
    else {
		$output= showOutput();
        getExecutable();
        cleanUp();
		$out=downloadExecutable();
		outputfile("output.exe",$out);
        exit();
    }
} 

$defaultSource = "
#include<stdio.h>
int main()
{
	printf(\"Hello world!!!\");
	return 0;
}";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online C++ Compiler v1.0</title>
<link href="stylesheet/design.css" rel="stylesheet" type="text/css" />       
</head>
<body>
<h1>Online Compiler</h1>
<p>Online compiler using Mingw compiler Designed BY, HABIB RAHMAN</p>

<?php
if(IsError()){
    $error = getError();
    echo '<p><b>Compilation Error! Check your source code</b></p>';
    echo '<p>'.$error.'</p>';
}
?>
<form name="compile" method="post">
<input type="hidden" name="docompile" value="1" />
<p><b>Source Code:</b></p>
<textarea name="source" rows="20" cols="80"><?php 
if($docompile) echo stripslashes($_REQUEST['source']);
else echo $defaultSource;
?>
</textarea>   <br />
<input type="submit" name="Submit" value="Compile">
</form>
<h2>Output:</h2>
<p> <?php global $output; echo "{$output}"; ?>  </p>
</body>
</html>