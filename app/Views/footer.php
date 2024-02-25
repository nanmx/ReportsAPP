<footer id="footer">
			<span class="ir-arriba icon-arrow-up2">^</span>
			<span class="cover_standard_padding cover_copyright">Reports App 2024 <b>&trade;</b></span>
		</footer>
		<script>
			$(document).ready(function(){
				$('.ir-arriba').click(function(){
					$('body, html').animate({
						scrollTop: '0px'
					}, 300);
				});
				$(window).scroll(function(){
					if( $(this).scrollTop() > 0 ){
						$('.ir-arriba').slideDown(300);
					}
					else{
						$('.ir-arriba').slideUp(300);
					}
				});
					$('#form').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget) // Button that triggered the modal
					var recipient = button.data('whatever') // Extract info from data-* attributes
					// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					var modal = $(this)
					modal.find('.modal-title').text(recipient)
					//modal.find('.modal-body input').val(recipient)
					})

			});
		</script>
	</body>
</html>
