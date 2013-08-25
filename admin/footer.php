		<div class="clearfix"></div>

	</div><!--/.fluid-container-->

	<!-- start: JavaScript-->

		
                <script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src="js/fullcalendar.min.js"></script>
	
		<script src="js/jquery.dataTables.min.js"></script>

		<script src="js/excanvas.js"></script>
                <script src="js/jquery.flot.js"></script>
                <script src="js/jquery.flot.pie.js"></script>
                <script src="js/jquery.flot.stack.js"></script>
                <script src="js/jquery.flot.resize.min.js"></script>
		
		<script src="js/gauge.min.js"></script>

		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/raphael.2.1.0.min.js"></script>
                <script src="js/justgage.1.0.1.min.js"></script>
                <script src="http://malsup.github.com/jquery.form.js"></script> 
		<script src="js/retina.js"></script>

		<script src="js/core.min.js"></script>
                <script src="js/jquery.nav.js"></script>
                <script src="js/jquery.nav.min.js"></script>
                <script src="js/jquery.scrollTo.js"></script>
		<script src="js/charts.js"></script>
                <script src="js/custom.js"></script>
                 <script type="text/javascript">
        jQuery(document).ready(function($) {
                        jQuery('.has_submenu').click(function(){
                             var $lefty = jQuery('#submenu-branding');
                            $lefty.animate({
                              left: parseInt($lefty.css('left'),10) == 92 ?
                                -$lefty.outerWidth() :
                                '92px'
                            }, 390);
                        })
                        jQuery('.right-content').click(function(){
                            var $lefty = jQuery('#submenu-branding');
                            $lefty.animate({
                              left: parseInt($lefty.css('left'),10) == -$lefty.outerWidth() ?-$lefty.outerWidth():-$lefty.outerWidth()
                            }, 390);
                        })
                        
			h=$(window).height();
                        $('.row-fluid .right-content').css('min-height',h)
			//$('#sidebar-left ul').css('height',h)
			
			 $(document).resize(function(){
				 h=$(window).height();
				 $('.row-fluid .right-content').css('min-height',h)
				 //$('#sidebar-left ul').css('height',h)
			})
                        $('#page-list').onePageNav();
                        $('.page-menu').click(function(){
                            goto=$(this).children('.x').attr('href');
                            
                            $('html,body').animate({scrollTop: $(goto).offset().top-30});
                        }) 
                        
        });
        </script>
        </body></html>