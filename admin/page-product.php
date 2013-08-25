<?php //include("inc/upload/upload-core.php");?>
        <script type='text/javascript' src='js/plupload.js'></script>
        <script type='text/javascript' src='js/plupload.gears.js'></script>
        <script type='text/javascript' src='js/plupload.silverlight.js'></script>
        <script type='text/javascript' src='js/plupload.flash.js'></script>
        <script type='text/javascript' src='js/plupload.browserplus.js'></script>
        <script type='text/javascript' src='js/plupload.html4.js'></script>
        <script type='text/javascript' src='js/plupload.html5.js'></script>
	<script type="text/javascript">
           // $(document).ready(function(){
                
                function uploadImage(FileContainer,dropArea,pickfiles){
                    $(document).ready(function(){
                        var uploader = new plupload.Uploader({
                            runtimes: 'html5,flash,gears,browserplus,silverlight,html4', 
                            url : 'upload.php',
                            browse_button : pickfiles,
                            button_browse_hover : true,
                            drop_element : dropArea,
                            autostart : true,
                            max_file_size: '250mb',
                            container: FileContainer,
                            multi_selection:false,
                            chunk_size: '1mb',
                            unique_names: false,
                            flash_swf_url: "js/plupload.flash.swf",
                            silverlight_xap_url: "js/plupload.silverlight.xap"
                        });

                        var fileTypes = 'mov';
                        var fileTypesFilter = 'allow';
                        var $body = $("body");
                        var $dropArea = $("#"+dropArea);

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
                                $(".dropArea2").show();
                            }
                        });

                        uploader.init();
                        uploader.bind('FilesAdded', function(up, files) {
                            $dropArea.removeClass();
                            $.each(files, function(i, file) {

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
                                            $dropArea.empty();
                                            $dropArea.append(
                                                    '<div id="' + file.id + '" class="fileItem"><div class="name">' +
                                                    filename + '</div><div class="fileRename' + file.id + ' hide"><div class="fileInfo"><span class="size">' + plupload.formatSize(file.size) + '</span>' +
                                                    '<div class="plupload_progress' + file.id + '"><div class="plupload_progress_container' + file.id + '"><div class="plupload_progress_bar' + file.id + '"></div></div></div>'+
                                                    '<span class="percentComplete' + file.id + '"></span></div></div>');

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
                            $fileWrapper.find(".plupload_progress" + file.id).show();
                            $fileWrapper.find(".plupload_progress_bar"+ file.id).attr("style", "width:"+ file.percent + "%");
                            $fileWrapper.find(".percentComplete"+ file.id).html(file.percent+"%");
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

                        uploader.bind('FileUploaded', function(up, file, response) {
                            $fileItem = $('#' + file.id);
                            $fileItem.addClass("completed");
                            $('#cancel'+file.id).remove();

                            var filename=file.name; //real file name
                            var imageNewName = response.response.split(",")[1].split(":")[1].replace(/"/g, '').trim();
                           // $(".uploadWrapper").empty();
                           <?php $upload_dir = wp_upload_dir();?>
                            $dropArea.empty();
                            $("<img>").attr({ src: "<?php echo $upload_dir['url'];?>/"+imageNewName }).appendTo($dropArea);
                        });
                    });
                }//function uploadImage
                 //uploadImage( "FileContainer1","dropArea1", "pickfiles1");
          //  });

                      
         </script>
            <!-- start: Content -->
            <div id="product-list" class="right-content span8">
                
                    <div class="page-content row-fluid full-height line">                
                        <div class="content-wrapper box span11">
                            <ul class="thumbnails">
                              <li id="addProduct" class="span4 pfirst">
                                    <div class="thumbnail">
                                        <i class="fa-icon-plus-sign"></i>
                                        <p>เพิ่มสินค้า คลิก</p>
                                    </div>
                              </li>
                                <?php 
                              for($i = 1; $i < 5; ++$i) {?>
                              <li class="span4 <?php if($i%3==0){ echo 'pfirst';}?>">
                                <div class="thumbnail">
                                    <div class="uploadWrapper"  >
                                        <?php 
                                        $have_feature_image='';
                                        if(empty($have_feature_image)): ?>
                                            <div id="FileContainer<?php echo $i;?>" class="FileContainer">
                                                    <div id="pickfiles<?php echo $i;?>" class="pickfiles" href="#" style="cursor: pointer">
                                                        <div id="dropArea<?php echo $i;?>" class="dropArea"><div class="upload_icon"></div><div class="uploadtext">คลิก อัพโหลดไฟล์</div></div>
                                                    </div>
                                            </div>
                                        <?php else:?>
                                            <div id="FileContainer<?php echo $i;?>" class="FileContainer">
                                                    <div id="pickfiles<?php echo $i;?>" class="pickfiles" href="#" style="cursor: pointer">
                                                        <div id="dropArea<?php echo $i;?>" class="dropArea"><img src="<?php echo $have_feature_image;?>"></div>
                                                    </div>
                                            </div>
                                        <?php endif;?>
                                    </div>
                                    <div class="error" style="display:none;">
                                            <p id="errorMessage"></p>
                                    </div>
                                  <div class="caption">
                                    <h3>ชื่อสินค้า</h3>
                                    <p>280 บาท</p>
                                    <p><a href="#" class="btn">แก้ไขรายละเอียด</a></p>
                                  </div>
                                  <input type="hidden" name="product-feature-image" value="">
                                  <input type="hidden" name="product-id" value="">
                                </div>
                                  <script type="text/javascript">
                                      uploadImage( "FileContainer<?php echo $i;?>","dropArea<?php echo $i;?>", "pickfiles<?php echo $i;?>");
                                  </script>
                              </li>
                              
                              <?php } ?>
                              
                              
                              
                            </ul>
                          </div>
                    </div><!--/row-->
                    <input type="hidden" name="page_id" value="<?php the_ID();?>">

                
            </div><!--right-content-->
            <div class="clearfix"></div>
       
            <!-- Modal -->
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">อัพเดต</h3>
              </div>
              <div class="modal-body">
                <p>บันทึกข้อมูลสำเร็จ.</p>
              </div>
              <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">ปิด</button>
              </div>
            </div>

