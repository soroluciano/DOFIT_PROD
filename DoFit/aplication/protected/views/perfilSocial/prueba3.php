<!DOCTYPE html>
<html>

<head>
<script type="text/javascript">
	
	
		$(document).ready(function() {
			 $('#file').hide(); 
			 $("#elementToBeClicked").click(function(){
			   $('#file').click();
			 });
		});
	
	function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});
</script>

</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input id="file" type="file" name="fileToUpload" >
	<div id="elementToBeClicked">div para subir imagen</div>
    <input type="submit" value="Upload Image" name="submit">
</form>

<div id="foto_cargada"></div>
<div id="mensaje_succes_failure"></div>


</body>
</html>




and the associated HTML:
<!--
<form id="form1" runat="server">
    <input type='file' id="imgInp" />
    <img id="blah" src="#" alt="your image" />
</form>-->