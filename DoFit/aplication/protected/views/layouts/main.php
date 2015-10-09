<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- blueprint CSS framework
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
    <!--[if lt IE 8]
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
    <![endif]
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
    -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>DoFit - entrená fácil</title>
    <!-- Bootstrap -->
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-doc.css" rel="stylesheet">
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/carrousel.css" rel="stylesheet">
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/source/jquery.fancybox.css?v=2.1.5" rel="stylesheet" media="screen" />
   <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>


    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <!-- <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.3.js"></script>-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ie10.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/perfil.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.file-input.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/jquery.fancybox-1.3.4.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/web.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/jquery.fancybox.pack.js"></script>


    <script>
       $(document).ready(function() {
            $('input[type=file]').bootstrapFileInput();
            $('.file-inputs').bootstrapFileInput();
        });
    </script>
    
    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/favicon.ico" type="image/x-icon">

    <script>
        var baseurl = '<?php echo Yii::app()->request->baseUrl; ?>';
    </script>
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