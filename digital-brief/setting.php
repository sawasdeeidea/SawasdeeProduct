<?php include("header.php");?>
			
			<!-- start: Content -->
			<div id="content" class="setting span11">
			
			<div class="navigate-bar box">
                <h2>ปรับแต่ง</h2>
                <p>การปรับแต่งเว็บไซต์ส่วนตัว</p>
                <div id="page-list" class="row">
                	<ul>
                    	<li class="page-menu active"><a href="page.php"><i class="fa-icon-file"></i><span class="hidden-tablet">ข้อมูลทั่วไป</span></a></li>	
						<li class="page-menu"><a href="page.php"><i class="fa-icon-file"></i><span class="hidden-tablet">การติดต่อ</span></a></li>	
                        <li class="page-menu"><a href="page.php"><i class="fa-icon-file"></i><span class="hidden-tablet">แผนที่</span></a></li>
                        <li class="page-menu"><a href="page.php"><i class="fa-icon-file"></i><span class="hidden-tablet">บัญชีของคุณ</span></a></li>
                    </ul>
                </div>
                <button type="submit" class="btn">ช่วยเหลือ</button>
            </div>
            
            <div class="right-content span8">
                <div class="page-content row-fluid">                
                    <div class="content-wrapper box span11">
                       <div class="box span12">
                       
                    <h2>ปรับแต่ง</h2>
                    <form class="form-horizontal">
					<div id="general-head" class="box-header" data-original-title="">
						<h2><i class="fa-icon-edit"></i><span class="break"></span>ข้อมูลทั่วไป</h2>
						<div class="box-icon">
							<a href="setting.php#" class="btn-minimize"><i class="fa-icon-cog chevron-up"></i></a>
						</div>
					</div><!--general-head-->
					<div id="general" class="box-content clearfix">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">ชื่อเว็บไซต์ </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead">
								<p class="help-block">เว็บไซต์ของคุณชื่ออะไร สามารถใส่ชื่อธุรกิจคุณได้</p>
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">รายละเอียดเว็บไซต์ </label>
							  <div class="controls">
								<textarea type="text" class="span6 typeahead" id="typeahead"></textarea
								<p class="help-block">อธิบายรายละเอียดธุรกิจคุณ</p>
							  </div>
							</div>
                            
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">บันทึก</button>
							  <button type="reset" class="btn">ยกเลิก</button>
							</div>
						  </fieldset>
					</div><!--general-->
                    
                    <div id="contact-head" class="box-header" data-original-title="">
						<h2><i class="fa-icon-edit"></i><span class="break"></span>การติดต่อ</h2>
						<div class="box-icon">
							<a href="setting.php#" class="btn-minimize"><i class="fa-icon-cog chevron-up"></i></a>
						</div>
					</div><!--general-head-->
					<div id="contact" class="box-content clearfix">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">ชื่อผู้ติดต่อ </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead">
								<p class="help-block">ต้องการให้ลูกค้าคุณติดต่อใคร ชื่ออะไร</p>
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">อีเมล์ </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead">
								<p class="help-block">อีเมล์ ที่ต้องการให้ลูกค้าส่งข้อมูลให้คุณ</p>
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">เบอร์โทรศัพท์ </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead">
								<p class="help-block">กรอกเบอร์โทรศัพท์ ถ้ามี</p>
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">เบอร์โทรศัพท์มือถือ </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead">
								<p class="help-block">กรอกเบอร์โทรศัพท์มือถือ ถ้ามี</p>
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">เบอร์แฟกซ์ </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead">
								<p class="help-block">กรอกเบอร์แฟกซ์ ถ้ามี</p>
							  </div>
							</div>
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">บันทึก</button>
							  <button type="reset" class="btn">ยกเลิก</button>
							</div>
						  </fieldset>
					</div><!--general-->
                    
                    <div id="general-head" class="box-header" data-original-title="">
						<h2><i class="fa-icon-edit"></i><span class="break"></span>แผนที่</h2>
						<div class="box-icon">
							<a href="setting.php#" class="btn-minimize"><i class="fa-icon-cog chevron-up"></i></a>
						</div>
					</div><!--general-head-->
					<div id="general" class="box-content clearfix">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">แผนที่ </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead">
								<p class="help-block">ปักหมุดสถานที่ธุรกิจคุณ โดยใช้การลากหมุดไปยังสถานที่ของคุณ หรือใส่ชื่อสถานที่ของคุณในช่องด้านบน</p>
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">บันทึก</button>
							  <button type="reset" class="btn">ยกเลิก</button>
							</div>
						  </fieldset>
					</div><!--general-->
                    
				
                	<div id="contact-head" class="box-header" data-original-title="">
						<h2><i class="fa-icon-edit"></i><span class="break"></span>รายละเอียดส่วนตัว</h2>
						<div class="box-icon">
							<a href="setting.php#" class="btn-minimize"><i class="fa-icon-cog chevron-up"></i></a>
						</div>
					</div><!--general-head-->
					<div id="contact" class="box-content clearfix">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">ชื่อ</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">นามสกุล</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">อีเมล์ </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">ที่อยู่ </label>
							  <div class="controls">
								<textarea class="span6 typeahead" id="typeahead"></textarea>
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">เบอร์โทรศัพท์มือถือ </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">เบอร์แฟกซ์ </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead">
							  </div>
							</div>
                            
                             <div class="control-group">
							  <label class="control-label" for="typeahead">รหัสผ่าน </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead">
							  </div>
							</div>
                             <div class="control-group">
							  <label class="control-label" for="typeahead">กรอกรหัสผ่านอีกครั้ง </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead">
							  </div>
							</div>
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">บันทึก</button>
							  <button type="reset" class="btn">ยกเลิก</button>
							</div>
						  </fieldset>
					</div><!--general-->
                    </form> 
				</div><!--/span-->
			</div><!--/row-->
                        
                    </div><!--/span-->
    
                </div><!--/row-->
			</div>
            <div class="clearfix"></div>
            <?php include("footer.php");?>