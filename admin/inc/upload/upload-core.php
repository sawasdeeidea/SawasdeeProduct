<script type='text/javascript' src='js/plupload.js'></script>
<script type='text/javascript' src='js/plupload.gears.js'></script>
<script type='text/javascript' src='js/plupload.silverlight.js'></script>
<script type='text/javascript' src='js/plupload.flash.js'></script>
<script type='text/javascript' src='js/plupload.browserplus.js'></script>
<script type='text/javascript' src='js/plupload.html4.js'></script>
<script type='text/javascript' src='js/plupload.html5.js'></script>
<script type="text/javascript">
            $(document).ready(function(){
                var uploader = new plupload.Uploader({
                    
                    runtimes: 'html5,flash,gears,browserplus,silverlight,html4', 
                    url : 'inc/upload/upload.php',
                    browse_button : "pickfiles",
                    button_browse_hover : true,
                    drop_element : "dropArea",
                    autostart : true,
                    max_file_size: '250mb',
                    container: "FileContainer",
                    chunk_size: '1mb',
                    unique_names: false,
                    // Flash settings
                    flash_swf_url: "js/plupload.flash.swf",
                    // Silverlight settings
                    silverlight_xap_url: "js/plupload.silverlight.xap"
                });
				
                var fileTypes = 'mov';
                var fileTypesFilter = 'allow';
                var $body = $("body");
                var $dropArea = $("#dropArea");

                $body.bind("dragenter", function(e){ 
                    $dropArea.addClass("draggingFile");
                    e.stopPropagation();
                    e.preventDefault();
                });

                $body.bind("dragleave", function(e){ $dropArea.removeClass("draggingFile"); });
                
                $body.bind("dragover", function(e){
                    $dropArea.addClass("draggingFile");
                    e.stopPropagation();
                    e.preventDefault();
                });

                $body.bind("drop", function(e){
                    e.stopPropagation();
                    e.preventDefault();
                    $dropArea.removeClass();
                });

                $dropArea.bind("dragenter", function(e){
                    $dropArea.addClass("draggingFileHover");
                    e.stopPropagation();
                    e.preventDefault();
                });
                $dropArea.bind("dragleave", function(e){ $dropArea.removeClass("draggingFileHover"); });
                $dropArea.bind("dragover", function(e){
                    $dropArea.addClass("draggingFileHover");
                    e.stopPropagation();
                    e.preventDefault();
                });
				
		//Checks to make sure the browser supports drag and drop uploads
                uploader.bind('Init', function(up, params){
                    if(window.FileReader && $.browser.webkit && !((params.runtime == "flash") || (params.runtime == "silverlight")))
                    {
                        $("#dropArea").show();
                        $("#fileSelectMsg").hide();
                    }
                });

                uploader.init();
                uploader.bind('FilesAdded', function(up, files) {
                    $dropArea.removeClass();
                    $.each(files, function(i, file) {
						
                            //Checks a comma delimted list for allowable file types set file types to allow for all

                            var fileExtension = file.name.substring(file.name.lastIndexOf(".")+1, file.name.length).toLowerCase();
                            var supportedExtensions = fileTypes.split(",");

                            var supportedFileExtension = ($.inArray(fileExtension, supportedExtensions) >= 0);
                            if(fileTypesFilter == "allow")
                            {
                                    supportedFileExtension = !supportedFileExtension
                            }

                            if((fileTypes == "all") || supportedFileExtension)
                            {
                                    var filename = file.name;
                                    if(filename.length > 25)
                                    {
                                            filename = filename.substring(0,25)+"...";       
                                    }

                                    //Add div block for each file uploaded
                                    $('#filelist').append(
                                            '<div id="' + file.id + '" class="fileItem"><div class="name">' +
                                            filename + '</div><div class="fileRename hide"><div class="fileInfo"><span class="size">' + plupload.formatSize(file.size) + '</span>' +
                                            '<div class="plupload_progress"><div class="plupload_progress_container"><div class="plupload_progress_bar"></div></div></div>'+
                                            '<span class="percentComplete"></span></div></div>');

                                    //Fire Upload Event
                                    up.refresh(); // Reposition Flash/Silverlight
                                    uploader.start();

                                    //Bind cancel click event
                                    $('#cancel'+file.id).click(function(){
                                            $fileItem = $('#' + file.id);
                                            $fileItem.addClass("cancelled");
                                            uploader.removeFile(file);
                                            currentStorage -= ((file.size)/(1024*1024));
                                            $(this).remove();
                                    });
                            }
                            else
                            {
                                    //Not a supported file extension
                                    $errorPanel = $('div.error:first');
                                    $errorPanel.show().html('<p>The file you selected is not supported in this section.');
                            }
                    });
                });

                uploader.bind('UploadProgress', function(up, file) {
                    var  $fileWrapper = $('#' + file.id);
                    $fileWrapper.find(".plupload_progress").show();
                    $fileWrapper.find(".plupload_progress_bar").attr("style", "width:"+ file.percent + "%");
                    $fileWrapper.find(".percentComplete").html(file.percent+"%");
                    $fileWrapper.find('#cancel'+file.id).addClass('hide');
                });

                uploader.bind('Error', function(up, err) {
                    $errorPanel = $("div.error:first");
                    //-600 means the file is larger than the max allowable file size on the uploader thats set in the options above.
                    if(err.code == "-600")
                    {
                        $errorPanel.show().html('<p>The file you are trying to upload exceeds the single file size limit of 250MB</p>');
                    }
                    else
                    {
                        $errorPanel.show().html('<p>There was an error uploading your file '+ err.file.name +'.</p>');
                    }

                    $('#' + err.file.id).addClass("cancelled");
                    uploader.stop();
                    uploader.refresh(); // Reposition Flash/Silverlight
                });

                
            });
          
	</script>