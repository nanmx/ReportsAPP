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
			});
		</script>
	</body>
</html>
