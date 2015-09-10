// JavaScript Document
$(function() {
	$(".uploadButton").tooltip({
		position: { my: "center top+10", at: "center bottom" },
		tooltipClass: "infoTooltip"
	});
});
$(".uploadButton").tooltip("disable");
//for handling styled file picker
//i is id of file input
function filePicker(i){
	$("#" + i).click();
}
//obj is file input
//i is id of div button
//f is id of form
function filePickerUpdate(obj, i, f){
	if(obj.value != "" && obj.value != null){
		var file = obj.value;
    	var fileName = file.split("\\");
		$("#" + i).html("Upload &ldquo;" + fileName[fileName.length-1] + "&rdquo;");
		$("#" + i).attr('onclick', "uploadSubmit('" + f +"')");
		$("#" + i).attr("title",'Upload "' + fileName[fileName.length-1] + '"');
		$(".uploadButton").tooltip( "enable" );
	}
}
//f is id of form
function uploadSubmit(f)
{
	wasSaved = true;
	$("#" + f).submit();
}