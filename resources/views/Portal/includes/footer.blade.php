<!--footer-->
<div class="footer"> <p>&copy; <?php echo date('Y'); ?> BPMS Admin Panel.</p> </div>
<!--//footer-->
<!-- Classie -->
<script src="<?php echo ADMIN_PUBLIC_PATH ?>js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="<?php echo ADMIN_PUBLIC_PATH ?>js/jquery.nicescroll.js"></script>
	<script src="<?php echo ADMIN_PUBLIC_PATH ?>js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
   <script src="<?php echo ADMIN_PUBLIC_PATH ?>js/bootstrap.js"> </script>
   <script src="{{ asset('public/js/validatorchklist.js') }}"></script>
   <script src="<?php echo ADMIN_PUBLIC_PATH; ?>js/bootstrap-tagsinput.js"></script>
 