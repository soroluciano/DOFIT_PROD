<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
     <!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
<<<<<<< HEAD
	
	
	
     	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>DoFit - entrená fácil</title>
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-doc.css" rel="stylesheet">

        <link href="css/propio.css" rel="stylesheet">
        <link href="css/carrousel.css" rel="stylesheet">

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>

        <script src="js/ie10.js"></script>
=======
>>>>>>> ffce6da102cb24264b2202c9a9e892e11b108cd1

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>DoFit - entrená fácil</title>
	<!-- Bootstrap -->
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-doc.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/carrousel.css" rel="stylesheet">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ie10.js"></script>
    <!-- el pelotudo de luciano -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/perfilsocial.css" media="screen, projection">

        <script type="text/javascript">
            var popupWindow = null;
            var popupIsShown = false;

            function MakePopup (event) {
                if (window.createPopup) {        //Internet Explorer
                    if (!popupWindow) {
                        popupWindow = window.createPopup ();
                        var popupBody = popupWindow.document.body;
                        popupBody.style.backgroundColor = "lightblue";
                        popupBody.style.border = "solid black 1px";
                        popupBody.innerHTML = "Click outside or move the mouse over to close.";
                        popupBody.onmouseover = function () {popupWindow.hide ();};
                    }
                    popupWindow.show (100, 100, 150, 50, document.body);
                }
                else {
                    if (!popupIsShown) {
                        if (!popupWindow) {
                            popupWindow = document.createElement ("DIV");
                            popupWindow.style.backgroundColor = "lightblue";
                            popupWindow.style.border = "solid black 1px";
                            popupWindow.style.position = "absolute";
                            popupWindow.style.width = "150px";
                            popupWindow.style.height = "50px";
                            popupWindow.style.top = "100px";
                            popupWindow.style.left = "100px";
                            popupWindow.innerHTML = "Click outside or move the mouse over to close.";
                            popupWindow.addEventListener ('mouseover', RemovePopup, false);
                        }

                        document.body.appendChild (popupWindow);
                        window.addEventListener ('click', RemovePopup, true);
                        popupIsShown = true;

                        // to avoid that the current click event propagates up
                        event.stopPropagation ();
                    }
                }
            }

            function RemovePopup (event) {
                if (popupIsShown) {
                    document.body.removeChild (popupWindow);
                    window.removeEventListener ('click', RemovePopup, true);
                    popupIsShown = false;
                }
            }
        </script>
<<<<<<< HEAD


        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/perfilsocial.css" media="screen, projection">

=======
>>>>>>> ffce6da102cb24264b2202c9a9e892e11b108cd1
</head>
<body>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

</body>
</html>
