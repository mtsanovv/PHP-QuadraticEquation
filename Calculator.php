<?php
if(strpos(strtolower(php_uname('s')), "win") !== false)
{
	pclose(popen("start /B ". 'chcp 65001', "r"));  
}
include 'Equation.php';

$equation = new Equation();

$equation->initialize();
?>