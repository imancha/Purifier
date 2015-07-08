<?php

if(isset($_POST['input']))
{
	$data = $_POST['input'];

	if($_POST['clean'] == 'true')
	{
		require_once 'library/HTMLPurifier.auto.php';

    $config = HTMLPurifier_Config::createDefault();
    $config->set('Core.Encoding', 'UTF-8');
    $config->set('HTML.Doctype', 'HTML 4.01 Strict');
    $purifier = new HTMLPurifier($config);

    $data = $purifier->purify($data);
	}

	print $data;
}
