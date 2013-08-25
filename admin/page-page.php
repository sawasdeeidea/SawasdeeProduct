<?php
    wp_enqueue_script( 'json-form' );   
?>

<link href="js/kd/style/kendo.common.min.css" rel="stylesheet">
<link href="js/kd/style/kendo.default.min.css" rel="stylesheet">
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/kd/js/kendo.web.min.js"></script>
            <!-- start: Content -->
            <div class="right-content span8">
               
                    <div class="page-header">
                       <h2 class="page-title"><input name="title" class="title" type="text" value="<?php the_title();?>" placeholder="ชื่อหน้าเว็บไซต์"></h2>
                       <div id="page-button">
                                <a href="" class="helpIcon"><i class="fa-icon-question-sign"></i> Help</a>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                <button id="addLayout" type="button" class="btn btn-warning"><i class="fa-icon-plus"></i>  เลือกรูปแบบ</button>
                                <script>
                                    jQuery('#addLayout').click(function(){
                                        jQuery( ".content-section" ).append('<div class="row">'+
                                                '<div contentEditable id="aaa" class="span12 smallEditor" on="">'+
                                                    '<p>'+
                                                       'Edit Content'+
                                                    '</p>'+
                                                    '</div>');                                 
                                    });
                                </script>
                       </div>
                    </div>
                    <div class="page-content row-fluid">                
                            
                           <?php the_content();?>
                        
                    </div><!--/row-->
                    <input type="hidden" name="page_id" value="<?php the_ID();?>">
                   
                
            </div><!--right-content-->
            </form>
            <div class="clearfix"></div>
            <style>
                .content-section {
                                            padding: 40px;
                                        }

                                        .k-editor-inline {
                                            margin: 0;
                                            padding:10px 20px 10px;
                                            box-shadow: none;
                                            background: none;
                                            border: 1px dashed #fff;
                                        }

                                        .k-editor-inline.k-state-active {
                                            border-width: 1px;
                                            padding: 10px 20px 10px;
                                            background: none;
                                        }

                                        .bigEditor h2, .span4 h3 {
                                            font-size: 24px;
                                            color: #e15613;
                                            line-height: 30px;
                                            font-family: "Droid Sans",DroidSansWeb,"Segoe UI","Lucida Sans Unicode",Arial,Helvetica,sans-serif;
                                        }

                                        .k-editor-inline p {
                                            font-size: 13px;
                                        }

                                        .span4 {
                                            display: inline-block;
                                            vertical-align: top;
                                            width: 170px;
                                        }

                                        .span4 a {
                                            color: #e15613;
                                        }

                                        .span4 h3 {
                                            padding-top: 10px;
                                            font-size: 15px;
                                        }

                                        .k-table {
                                            border-spacing: 0;
                                            border-collapse: collapse;
                                            border: 1px solid #999;
                                            width: 100%;
                                        }

                                        .k-table td, .k-table th {
                                            border: 1px solid #999;
                                            padding: 3px;
                                        }
            </style>
                                    <script>
                                        $(document).ready(function() {
                                            $(".bigEditor").kendoEditor({
                                                tools: [
                                                    "bold",
                                                    "italic",
                                                    "underline",
                                                    "strikethrough",
                                                    "justifyLeft",
                                                    "justifyCenter",
                                                    "justifyRight",
                                                    "justifyFull",
                                                    "createLink",
                                                    "unlink",
                                                    "insertImage",
                                                    "createTable",
                                                    "addColumnLeft",
                                                    "addColumnRight",
                                                    "addRowAbove",
                                                    "addRowBelow",
                                                    "deleteRow",
                                                    "deleteColumn",
                                                    "foreColor",
                                                    "backColor"
                                                ]
                                            });

                                            $(".smallEditor").kendoEditor({
                                                tools: [
                                                    "bold",
                                                    "italic",
                                                    "underline",
                                                    "createLink",
                                                    "unlink",
                                                    "insertImage"
                                                ]
                                            });
                                        });
                                    </script>
                                    
            <script type="text/javascript">
            
            // Submit Form
            $('form').submit(function() { 
               
                var options = { 
                    //target:        '#setting-response',   // target element(s) to be updated with server response 
                    beforeSubmit:  showRequest,  // pre-submit callback 
                    success:       showResponse,  // post-submit callback 
                    data: { content: $('.page-content').html() }
                }; 
                $('#page-form').ajaxSubmit(options); 
                return false;
            }); 
 
            // pre-submit callback 
            function showRequest(formData, jqForm, options) { 

                var queryString = $.param(formData); 
                return true; 
            } 
 
            // post-submit callback 
            function showResponse(responseText, statusText, xhr, $form)  { 
                 $('#myModal').modal('show');
                 setTimeout(function () {
                    $('#myModal').modal('hide'); // hode modal; this happens after 8 seconds due to the nested timeouts
                }, 3000);
                /* alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
                    '\n\nThe output div should have already been updated with the responseText.'); */
            } 
            </script>
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
            
