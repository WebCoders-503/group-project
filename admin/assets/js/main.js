
var a;
function busSideMenu($bus_id, $height){
    if(a==1){
        document.getElementById($bus_id).style.height ='0';
        document.getElementById($bus_id).style.transition ='0.5s';
        return a=0;
    }
    else{
        document.getElementById($bus_id).style.height = $height;
        document.getElementById($bus_id).style.transition ='0.5s';
        return a=1;
    }
}

// Image Upload Js code
var btnUpload = $("#upload_file"),
		btnOuter = $(".button_outer");
	btnUpload.on("change", function(e){
		var ext = btnUpload.val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
			$(".error_msg").text("Not an Image...");
		} else {
			$(".error_msg").text("");
			btnOuter.addClass("file_uploading");
			setTimeout(function(){
				btnOuter.addClass("file_uploaded");
			},3000);
			var uploadedFile = URL.createObjectURL(e.target.files[0]);
			setTimeout(function(){
				$("#uploaded_view").append('<img src="'+uploadedFile+'" />').addClass("show");
			},3500);
		}
	});
	$(".file_remove").on("click", function(e){
		$("#uploaded_view").removeClass("show");
		$("#uploaded_view").find("img").remove();
		btnOuter.removeClass("file_uploading");
		btnOuter.removeClass("file_uploaded");
	});
