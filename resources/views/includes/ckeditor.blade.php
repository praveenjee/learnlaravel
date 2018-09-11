<script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script> 
<script>
    CKEDITOR.replace('body', {customConfig: '/adminlte/plugins/ckeditor/config.js'})
	
	$('.popup_selector').click( function (event) {
		event.preventDefault()
		var updateID = $(this).attr('data-inputid')
		var elfinderUrl = '/elfinder/popup/'
		var triggerUrl = elfinderUrl + updateID
		$.colorbox({
			href: triggerUrl,
			fastIframe: true,
			iframe: true,
			width: '70%',
			height: '70%'
		})
	})

	function processSelectedFile(filePath, requestingField) {
		$('#' + requestingField).val('\\' + filePath)
		$('#img').attr('src', '\\' + filePath)
	}
</script>		