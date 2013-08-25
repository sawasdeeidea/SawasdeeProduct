<?php include("header.php");
    $page_type=is_page_type($_GET['page_id']);
    wp_enqueue_script( 'json-form' );
    
?>

<link href="js/kd/style/kendo.common.min.css" rel="stylesheet">
<link href="js/kd/style/kendo.default.min.css" rel="stylesheet">
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/kd/js/kendo.web.min.js"></script>
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

            <div class="right-content span8">
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
                    <div class="page-header">
                       <h2 class="page-title"><input name="title" class="title" type="text" value="<?php the_title();?>" placeholder="ชื่อหน้าเว็บไซต์"></h2>
                       <div id="page-button"><button type="submit" class="btn btn-primary">Save changes</button><button type="submit" class="btn">Help</button></div>
                    </div>
                    <div class="page-content row-fluid">                
                            
                           <?php the_content();?>
                        
                    </div><!--/row-->
                    <input type="hidden" name="page_id" value="<?php the_ID();?>">
                    <?php 
                        endwhile;
                    ?>
                
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
                                            border: 1px dashed #eee;
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
            
            
<?php include("footer.php");?>
