<?php include("header.php");?>
<?php //include("inc/upload/upload-core.php");?>
        <script type='text/javascript' src='js/plupload.js'></script>
        <script type='text/javascript' src='js/plupload.gears.js'></script>
        <script type='text/javascript' src='js/plupload.silverlight.js'></script>
        <script type='text/javascript' src='js/plupload.flash.js'></script>
        <script type='text/javascript' src='js/plupload.browserplus.js'></script>
        <script type='text/javascript' src='js/plupload.html4.js'></script>
        <script type='text/javascript' src='js/plupload.html5.js'></script>
	<script type="text/javascript">
            $(document).ready(function(){
                var fileTypes = 'mov';
                var fileTypesFilter = 'allow';
                var $body = $("body");
                var $dropArea = $(".dropArea");
            
                var uploader = new plupload.Uploader({
                    runtimes: 'html5,flash,gears,browserplus,silverlight,html4', 
                    url : 'upload.php',
                    browse_button : "pickfiles",
                    button_browse_hover : true,
                    drop_element : "dropArea",
                    autostart : true,
                    max_file_size: '250mb',
                    container: "FileContainer",
                    chunk_size: '1mb',
                    unique_names: false,
                    flash_swf_url: "js/plupload.flash.swf",
                    silverlight_xap_url: "js/plupload.silverlight.xap"
                });
				
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
                        $(".dropArea").show();
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

                uploader.bind('FileUploaded', function(up, file, response) {
                    $fileItem = $('#' + file.id);
                    $fileItem.addClass("completed");
                    $('#cancel'+file.id).remove();
                    
                    var filename=file.name; //real file name
                    var imageNewName = response.response.split(",")[1].split(":")[1].replace(/"/g, '').trim();
                   // $(".uploadWrapper").empty();
                   <?php $upload_dir = wp_upload_dir();?>
                    $(".dropArea").empty();
                    $("<img>").attr({ src: "<?php echo $upload_dir['url'];?>/"+imageNewName }).appendTo($(".dropArea"));
                });
                
                
                //Test 2
                var uploader2 = new plupload.Uploader({
                    runtimes: 'html5,flash,gears,browserplus,silverlight,html4', 
                    url : 'upload.php',
                    browse_button : "pickfiles2",
                    button_browse_hover : true,
                    drop_element : "dropArea2",
                    autostart : true,
                    max_file_size: '250mb',
                    container: "FileContainer2",
                    chunk_size: '1mb',
                    unique_names: false,
                    flash_swf_url: "js/plupload.flash.swf",
                    silverlight_xap_url: "js/plupload.silverlight.xap"
                });
				
                var fileTypes = 'mov';
                var fileTypesFilter = 'allow';
                var $body = $("body");
                var $dropArea2 = $(".dropArea2");
                    
                $body.bind("dragenter", function(e){ 
                    $dropArea2.addClass("draggingFile");
                    e.stopPropagation();
                    e.preventDefault();
                });

                $body.bind("dragleave", function(e){ $dropArea.removeClass("draggingFile"); });
                
                $body.bind("dragover", function(e){
                    $dropArea2.addClass("draggingFile");
                    e.stopPropagation();
                    e.preventDefault();
                });

                $body.bind("drop", function(e){
                    e.stopPropagation();
                    e.preventDefault();
                    $dropArea2.removeClass();
                });

                $dropArea2.bind("dragenter", function(e){
                    $dropArea2.addClass("draggingFileHover");
                    e.stopPropagation();
                    e.preventDefault();
                });
                $dropArea2.bind("dragleave", function(e){ $dropArea2.removeClass("draggingFileHover"); });
                $dropArea2.bind("dragover", function(e){
                    $dropArea2.addClass("draggingFileHover");
                    e.stopPropagation();
                    e.preventDefault();
                });
				
		//Checks to make sure the browser supports drag and drop uploads
                uploader2.bind('Init', function(up, params){
                    if(window.FileReader && $.browser.webkit && !((params.runtime == "flash") || (params.runtime == "silverlight")))
                    {
                        $(".dropArea2").show();
                    }
                });

                uploader2.init();
                uploader2.bind('FilesAdded', function(up, files) {
                    $dropArea2.removeClass();
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
                                    $('#filelist2').append(
                                            '<div id="' + file.id + '" class="fileItem"><div class="name">' +
                                            filename + '</div><div class="fileRename hide"><div class="fileInfo"><span class="size">' + plupload.formatSize(file.size) + '</span>' +
                                            '<div class="plupload_progress"><div class="plupload_progress_container"><div class="plupload_progress_bar"></div></div></div>'+
                                            '<span class="percentComplete"></span></div></div>');

                                    //Fire Upload Event
                                    up.refresh(); // Reposition Flash/Silverlight
                                    uploader2.start();

                                    //Bind cancel click event
                                    $('#cancel'+file.id).click(function(){
                                            $fileItem = $('#' + file.id);
                                            $fileItem.addClass("cancelled");
                                            uploader2.removeFile(file);
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

                uploader2.bind('UploadProgress', function(up, file) {
                    var  $fileWrapper = $('#' + file.id);
                    $fileWrapper.find(".plupload_progress").show();
                    $fileWrapper.find(".plupload_progress_bar").attr("style", "width:"+ file.percent + "%");
                    $fileWrapper.find(".percentComplete").html(file.percent+"%");
                    $fileWrapper.find('#cancel'+file.id).addClass('hide');
                });

                uploader2.bind('Error', function(up, err) {
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

                uploader2.bind('FileUploaded', function(up, file, response) {
                    $fileItem = $('#' + file.id);
                    $fileItem.addClass("completed");
                    $('#cancel'+file.id).remove();
                    
                    var filename=file.name; //real file name
                    var imageNewName = response.response.split(",")[1].split(":")[1].replace(/"/g, '').trim();
                   // $(".uploadWrapper").empty();
                   <?php $upload_dir = wp_upload_dir();?>
                    $(".dropArea2").empty();
                    $("<img>").attr({ src: "<?php echo $upload_dir['url'];?>/"+imageNewName }).appendTo($(".dropArea2"));
                });
            });
          
	</script>
            <!-- start: Content -->
            <div id="content" class="pagecontent span11">
            <form id="page-form" action="inc/page-controller.php"  method="post" class="form-horizontal">
            <div class="navigate-bar box">
                <h2>หน้าเว็บไซต์</h2>
                <div id="page-list" class="row">
                    <ul>
                        <?php
                        $args=array( 'post_type' => 'page','posts_per_page'=>4,'orderby' => 'menu_order', 'order' => 'ASC');
                        $the_query = new WP_Query( $args );
                        $i=1;
                        while ( $the_query->have_posts() ) {
                                $the_query->the_post();$current='';
                                if($_GET['page_id']==$post->ID) $current='current';
                                if($i==1&&empty($_GET['page_id'])){ $current='current';$editpage1=$post->ID;}
                                echo '<li class="page-menu '.$current.'"><a href="page.php?page_id=' . $post->ID . '" data-type="page" rel="' . $post->ID . '"><i class="fa-icon-file"></i><span class="hidden-tablet">' . get_the_title() . '</span></a></li>';
                                $i++;
                        }
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div>
            </div>

            <div id="product-list" class="right-content span8">
                <?php
                //1. get the page data
                        $editpage=$_GET['page_id']?$_GET['page_id']:$editpage1;
                        $query_page=array('page_id'=>$editpage);
                        $page_result = new WP_Query( $query_page );
                        $i=1;
                        while ( $page_result->have_posts() ): $page_result->the_post();
                
                //2. get page type
                    $page_type = get_post_meta( get_the_ID(), 'page_type', true );
                    // check if the custom field has a value
                    if( ! empty( $page_type ) ) {
                      //echo $page_type;
                    } 
                    //update_post_meta( get_the_ID(), 'page_type', 'contact' )
                ?>
                    <div class="page-content row-fluid full-height line">                
                        <div class="content-wrapper box span11">
                            <ul class="thumbnails">
                              <li class="span4">
                                <div class="thumbnail">
                                    <div class="uploadWrapper">
                                        <?php 
                                        $have_feature_image='';
                                        if(empty($have_feature_image)): ?>
                                            <div id="FileContainer">
                                                    <div id="pickfiles" href="#" style="cursor: pointer">
                                                        <div id="dropArea" class="dropArea"><div class="upload_icon"></div>คลิก อัพโหลดไฟล์</div>
                                                    </div>
                                            </div>
                                        <?php else:?>
                                            <div id="FileContainer">
                                                    <div id="pickfiles" href="#" style="cursor: pointer">
                                                        <div id="dropArea" class="dropArea"><img src="<?php echo $have_feature_image;?>"></div>
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
                              </li>
                             
                              <li class="span4">
                                <div class="thumbnail">
                                    <div class="uploadWrapper">
                                        <?php 
                                        $have_feature_image='';
                                        if(empty($have_feature_image)): ?>
                                            <div id="FileContainer2">
                                                    <div id="pickfiles2" href="#" style="cursor: pointer">
                                                        <div id="dropArea2" class="dropArea2"><div class="upload_icon"></div>คลิก อัพโหลดไฟล์</div>
                                                    </div>
                                            </div>
                                        <?php else:?>
                                            <div id="FileContainer2">
                                                    <div id="pickfiles2" href="#" style="cursor: pointer">
                                                        <div id="dropArea2" class="dropArea2"><img src="<?php echo $have_feature_image;?>"></div>
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
                              </li>
                              
                              
                            </ul>
                          </div>
                    </div><!--/row-->
                    <input type="hidden" name="page_id" value="<?php the_ID();?>">
                    <?php 
                        endwhile;
                    ?>
                
            </div><!--right-content-->
            </form>
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
            <?php include("footer.php");?>
