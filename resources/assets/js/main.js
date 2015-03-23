var submit = function(formid) {
	$form = $(formid);
	if (!$form) return;
	$.ajax({
		url: $form.attr('action'),
		type: $form.attr('method'),
		data: $form.serialize(),
		success: function(data) {
			console.log(data)
		},
		error: function(data) {
			console.log(data)
		}
	});
};

$(function() {



	$('textarea.editor').summernote({
		height: 350,
		tabsize: 2,
		lang: 'zh-CN'
	});

	var $inputifle = $('input.inputfile');
	var img = null;
	if ($inputifle.attr('value')) {
		img = ["<img src='" + $inputifle.attr('value') + "' class='file-preview-image' alt='' title=''>"];
	}


	$inputifle.fileinput({
		removeTitle: '删除文件',
		uploadTitle: '上传文件',
		indicatorNewTitle: '没有上传完成',
		indicatorSuccessTitle: '已上传',
		indicatorErrorTitle: '上传出错',
		indicatorLoadingTitle: '上传中 ...',
		browseLabel: '浏览 &hellip;',
		browseClass: 'btn btn-primary',
		removeLabel: '删除',
		removeTitle: '删除选择文件',
		cancelLabel: '取消',
		cancelTitle: '终止上传',
		uploadLabel: '上传',
		uploadTitle: '上传选择文件',
		uploadUrl: null,
		uploadAsync: true,
		maxFileSize: 2048,
		maxFileCount: 1,
		msgSizeTooLarge: 'File "{name}" (<b>{size} KB</b>) exceeds maximum allowed upload size of <b>{maxSize} KB</b>. Please retry your upload!',
		msgFilesTooMany: 'Number of files selected for upload <b>({n})</b> exceeds maximum allowed limit of <b>{m}</b>. Please retry your upload!',
		msgFileNotFound: '文件 "{name}" 不存在!',
		msgFileSecured: 'Security restrictions prevent reading the file "{name}".',
		msgFileNotReadable: 'File "{name}" is not readable.',
		msgFilePreviewAborted: 'File preview aborted for "{name}".',
		msgFilePreviewError: 'An error occurred while reading the file "{name}".',
		msgInvalidFileType: 'Invalid type for file "{name}". Only "{types}" files are supported.',
		msgInvalidFileExtension: 'Invalid extension for file "{name}". Only "{extensions}" files are supported.',
		msgValidationError: '<span class="text-danger"><i class="glyphicon glyphicon-exclamation-sign"></i> 上传文件出错</span>',
		msgLoading: 'Loading  file {index} of {files} &hellip;',
		msgProgress: 'Loading file {index} of {files} - {name} - {percent}% completed.',
		msgSelected: '{n} 文件选择',
		previewFileType: 'image',
		dropZoneTitle: '拖拽文件 &hellip;',
		dropZoneTitleClass: 'file-drop-zone-title',
		ajaxSettings: {},
		initialPreview: img,
	});



})