 function wpInsertToggleNotSavedAlert() {
 document.getElementById("message").style.display = "block";
 jQuery("#message").animate({opacity: 1, height: "100%"}, 1500);
 }
 
 function wpInsertToggleAdWidget(sender, pointerid) {
  if(jQuery(sender).attr("value") == "Click to Activate") {
  jQuery(pointerid).attr("checked", true);
  jQuery(sender).animate({color: "red",}, 1500, "linear", function() { wpInsertToggleNotSavedAlert(); } );
  jQuery(sender).attr("value", "Click to Deactivate");
  }
  else {
   jQuery(pointerid).attr("checked", false);
  jQuery(sender).animate({color: "#2f9303",}, 1500, "linear", function() { wpInsertToggleNotSavedAlert(); } );
  jQuery(sender).attr("value", "Click to Activate");
  }
 }