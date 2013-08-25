<?php $scroll=1;
    include("header.php");
    wp_enqueue_script( 'json-form' );  
?>
            <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
            <script type="text/javascript" src="js/google_dynamic_map.js"></script>

            <!-- start: Content -->
            <div id="content" class="setting span11">
			
            <div class="navigate-bar box">
                <h2>ปรับแต่ง</h2>
                <p>การปรับแต่งเว็บไซต์ส่วนตัว</p>
                <div id="page-list" class="navbar row">
                    <ul id="nav">
                    	<li class="page-menu current"><a href="#general-head" class="x"><i class="fa-icon-file"></i><span class="hidden-tablet">ข้อมูลทั่วไป</span></a></li>	
			<li class="page-menu"><a href="#contact-head" class="x"><i class="fa-icon-file"></i><span class="hidden-tablet">การติดต่อ</span></a></li>	
                        <li class="page-menu"><a href="#map-head" class="x"><i class="fa-icon-file"></i><span class="hidden-tablet">แผนที่</span></a></li>
                        <li class="page-menu"><a href="#account-head" class="x"><i class="fa-icon-file"></i><span class="hidden-tablet">บัญชีของคุณ</span></a></li>
                    </ul>
                </div>
                
            </div>
            
            <div class="right-content span8" data-spy="scroll" data-target="#page-list" data-offset="50">
                <div class="page-content row-fluid">                
                    <div class="content-wrapper box span11">
                       <div class="box span12">
                       
                            <div class="alert alert-block">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <h4>คำแนะนำ</h4>
                                    เมื่อกรอกข้อมูลครบตามที่ต้องการแล้ว ขั้นตอนสุดท้ายอย่าลืม คลิกปุ่ม บันทึกข้อมูล
                            </div>
                            <form id="setting-form" action="inc/setting-controller.php"  method="post" class="form-horizontal">
					<div id="general-head" class="box-header" data-original-title="">
						<h2><i class="fa-icon-cog"></i> ข้อมูลทั่วไป</h2>
					</div><!--general-head-->
					<div id="general" class="box-content clearfix">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="sitename">ชื่อเว็บไซต์ </label>
							  <div class="controls">
								<input name="sitename" value="<?php echo get_blog_option( $site_id, 'sitename');?>" type="text" class="span6 typeahead" id="sitename">
								<p class="help-block">เว็บไซต์ของคุณชื่ออะไร สามารถใส่ชื่อธุรกิจคุณได้</p>
							  </div>
							</div>
                                        <div class="control-group">
							  <label class="control-label" for="sitedesc">รายละเอียดเว็บไซต์ </label>
							  <div class="controls">
								<textarea name="sitedesc" type="text" class="span6 typeahead" id="sitedesc"><?php echo get_blog_option( $site_id, 'sitedesc');?></textarea>
								<p class="help-block">อธิบายรายละเอียดธุรกิจคุณ</p>
							  </div>
							</div>
                            
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" data-loading-text="Loading...">บันทึกข้อมูล</button>
							  <button type="reset" class="btn">ยกเลิก</button>
							</div>
						  </fieldset>
					</div><!--general-->
                    
                                    <div id="contact-head" class="box-header" data-original-title="">
						<h2><i class="fa-icon-cog"></i> การติดต่อ</h2>
					</div><!--general-head-->
					<div id="contact" class="box-content clearfix">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="contact_person">ชื่อผู้ติดต่อ </label>
							  <div class="controls">
								<input name="contact_person" value="<?php echo get_blog_option( $site_id, 'contact_person');?>" type="text" class="span6 typeahead" id="contact_person">
								<p class="help-block">ต้องการให้ลูกค้าคุณติดต่อใคร ชื่ออะไร</p>
							  </div>
							</div>
                                                        <div class="control-group">
							  <label class="control-label" for="contact_email">อีเมล์ </label>
							  <div class="controls">
								<input name="contact_email" value="<?php echo get_blog_option( $site_id, 'contact_email');?>" type="text" class="span6 typeahead" id="contact_email">
								<p class="help-block">อีเมล์ ที่ต้องการให้ลูกค้าส่งข้อมูลให้คุณ</p>
							  </div>
							</div>
                                                        <div class="control-group">
							  <label class="control-label" for="contact_tel">เบอร์โทรศัพท์ </label>
							  <div class="controls">
								<input name="contact_tel" value="<?php echo get_blog_option( $site_id, 'contact_tel');?>" type="text" class="span6 typeahead" id="contact_tel">
								<p class="help-block">กรอกเบอร์โทรศัพท์ ถ้ามี</p>
							  </div>
							</div>
                                                        <div class="control-group">
							  <label class="control-label" for="contact_mobile">เบอร์โทรศัพท์มือถือ </label>
							  <div class="controls">
								<input name="contact_mobile" value="<?php echo get_blog_option( $site_id, 'contact_mobile');?>" type="text" class="span6 typeahead" id="contact_mobile">
								<p class="help-block">กรอกเบอร์โทรศัพท์มือถือ ถ้ามี</p>
							  </div>
							</div>
                                                        <div class="control-group">
							  <label class="control-label" for="contact_fax">เบอร์แฟกซ์ </label>
							  <div class="controls">
								<input name="contact_fax" value="<?php echo get_blog_option( $site_id, 'contact_fax');?>" type="text" class="span6 typeahead" id="contact_fax">
								<p class="help-block">กรอกเบอร์แฟกซ์ ถ้ามี</p>
							  </div>
							</div>
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
							  <button type="reset" class="btn">ยกเลิก</button>
							</div>
						  </fieldset>
					</div><!--general-->
                    
                                        <div id="map-head" class="box-header" data-original-title="">
						<h2><i class="fa-icon-cog"></i> แผนที่</h2>
					</div><!--general-head-->
					<div id="map" class="box-content clearfix">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="txt_latlng">แผนที่ </label>
							  <div class="controls">
                                                                <input name="map" value="<?php echo get_blog_option( $site_id, 'map');?>" type="text" placeholder="42.08114783087112, 25.736956999737572"  id="txt_latlng" class="span6 typeahead" style="width:480px;">
                                                                <div id="map_canvas" style="width: 550px;height: 400px;margin: 20px 0;border:solid black 1px;"></div>
								<p class="help-block">ปักหมุดสถานที่ธุรกิจคุณ โดยใช้การลากหมุดไปยังสถานที่ธุรกิจ หรือบ้านของคุณ</p>
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
							  <button type="reset" class="btn">ยกเลิก</button>
							</div>
						  </fieldset>
					</div><!--general-->
                    
				
                                        <div id="account-head" class="box-header" data-original-title="">
						<h2><i class="fa-icon-cog"></i> รายละเอียดส่วนตัว</h2>
					</div><!--general-head-->
					<div id="account" class="box-content clearfix">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="first_name">ชื่อ</label>
							  <div class="controls">
								<input name="first_name" value="<?php echo get_user_meta( $current_user->id , 'first_name',true);?>" type="text" class="span6 typeahead" id="first_name">
							  </div>
							</div>
                                                        <div class="control-group">
							  <label class="control-label" for="last_name">นามสกุล</label>
							  <div class="controls">
								<input name="last_name" value="<?php echo get_user_meta( $current_user->id, 'last_name',true);?>" type="text" class="span6 typeahead" id="last_name">
							  </div>
							</div>
                                                        <div class="control-group">
							  <label class="control-label" for="user_email">อีเมล์ </label>
							  <div class="controls">
								<input name="user_email" value="<?php echo get_user_meta( $current_user->id, 'user_email',true);?>" type="text" class="span6 typeahead" id="user_email">
							  </div>
							</div>
                                                        <div class="control-group">
							  <label class="control-label" for="user_address">ที่อยู่ </label>
							  <div class="controls">
								<textarea name="user_address"  class="span6 typeahead" id="user_address"><?php echo get_user_meta( $current_user->id, 'user_address',true);?></textarea>
							  </div>
							</div>
                                                        <div class="control-group">
							  <label class="control-label" for="user_phone">เบอร์โทรศัพท์มือถือ </label>
							  <div class="controls">
								<input name="user_phone" value="<?php echo get_user_meta( $current_user->id, 'user_phone',true);?>" type="text" class="span6 typeahead" id="user_phone">
							  </div>
							</div>
                                                        <div class="control-group">
							  <label class="control-label" for="user_fax">เบอร์แฟกซ์ </label>
							  <div class="controls">
								<input name="user_fax" value="<?php echo get_user_meta( $current_user->id, 'user_fax',true);?>" type="text" class="span6 typeahead" id="user_fax">
							  </div>
							</div>
                            
                                                        <div class="control-group">
							  <label class="control-label" for="user_password">รหัสผ่าน </label>
							  <div class="controls">
								<input name="user_password"  type="text" class="span6 typeahead" id="user_password">
							  </div>
							</div>
                                                        <div class="control-group">
							  <label class="control-label" for="user_repassword">กรอกรหัสผ่านอีกครั้ง </label>
							  <div class="controls">
								<input name="user_repassword"  type="text" class="span6 typeahead" id="user_repassword">
							  </div>
							</div>
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
							  <button type="reset" class="btn">ยกเลิก</button>
							</div>
						  </fieldset>
					</div><!--general-->
                    </form> 
                           <div id="setting-response"></div>
				</div><!--/span-->
			</div><!--/row-->
                        
                    </div><!--/span-->
    
                </div><!--/row-->
			</div>
            <div class="clearfix"></div>
            <?php $map=get_blog_option( $site_id, 'map');
                  $maps=  explode(',', $map);?>
            <script type="text/javascript">
            jQuery(document).ready(function($) {
                            la=<?php if($maps[0]){echo $maps[0];}else{echo '13.738378811124935';}?>;
                            lo=<?php if($maps[1]){echo $maps[1];}else{echo '100.52363912864382';}?>;
                            initialize(la,lo);
            });
            
            // Submit Form
            $(document).ready(function() { 
                var options = { 
                    beforeSubmit:  showRequest,  // pre-submit callback 
                    success:       showResponse
                }; 

                // bind form using 'ajaxForm' 
                $('#setting-form').ajaxForm(options); 
            }); 
 
            // pre-submit callback 
            function showRequest(formData, jqForm, options) { 

                var queryString = $.param(formData); 

                //alert('About to submit: \n\n' + queryString); 

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