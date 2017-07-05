$(function () {
	function reinitIframe(){
	 var iframe = document.getElementById("mainFrame");
	 try{
	 var bHeight = iframe.contentWindow.document.body.scrollHeight;
	 var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
	 var height = Math.max(bHeight, dHeight);
	 iframe.height = height;
	 }catch (ex){}
	 }
	 window.setInterval("reinitIframe()", 100);



	 $(window.parent.document).find("#iframeId").load(function () {
	     var main = $(window.parent.document).find("#iframeId");
	     var thisheight = $(document).height() + 30;
	     main.height(thisheight);
	 });
})