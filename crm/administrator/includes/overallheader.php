
<?php
	require 'php/init.php';
	
	$title = basename($_SERVER['SCRIPT_NAME']);
	$title = str_ireplace('.php', '', $title);
	
	ucfirst($title);
	
	if($title == 'index')
		$title = 'Home';
?>
<html>
     <head>
        <title>Administration | <?php echo $title;?></title>
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/buttons.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/jquery.dataTables.min.css">


    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">









        <script type="text/javascript"  src="javascript/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="javascript/jquery_ui/jquery-ui.js"></script>
        <link  type="text/css" href="javascript/jquery_ui/jquery-ui.min.css" rel="stylesheet" />
        <link  type="text/css" href="javascript/jquery_ui/jquery-ui.theme.css" rel="stylesheet" />
         <script type="text/javascript"  src="bootstrap/bootstrap.js"></script>
         <script type="text/javascript" src="javascript/jquery.validate.js"></script>
         <link rel="stylesheet" href="bootstrap/bootstrap.css"/>
         <link rel="stylesheet" href="./stylesheet/style.css"/>
         <style type="text/css">
            input.txt{
                border-radius:7px;
                border:1px solid #a0a5ba;
                box-shadow: 1px 1px 2px 3px rgba(140,194,222,0.3);

            } 
            
            textarea{
                border:1px solid #a0a5ba;
                border-radius:7px;
                box-shadow: 1px 1px 2px 3px rgba(140,194,222,0.3);

            }
         </style>
     </head>
<body>
         