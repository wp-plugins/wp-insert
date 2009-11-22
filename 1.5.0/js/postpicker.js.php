<script type="text/javascript">
function ShowPopUp() {
	GreyOutScreen();
    divPopup = CreatePopUp("Add New Folder", 285, 141, 100, 200);
    divPopup.innerHTML = <?php wp_list_pages('echo = 0'); ?>;
 }
 </script>