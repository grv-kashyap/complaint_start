</div>
<footer class="container-fluid ">
	<div class="text-center">
	  <a href="#myPage" title="To Top">
	    <span class="glyphicon glyphicon-chevron-up"></span>
	  </a>	
	</div>
	<div class="row">
		<div class="col-md-6">
  			<p>Created by Group</p>
  		</div>
  		<div class="col-md-6 text-right">
  				<ul class="list-inline">
  					<li><a href="<?php echo $this->base_url; ?>home/helpline">Helpline</a></li>
  					<li><a href="<?php echo $this->base_url; ?>home/safety">Safety Tips</a></li>
  					<li><a href="<?php echo $this->base_url; ?>home/faq">FAQ</a></li>
  				</ul>
  		</div>
  	</div>

</footer>

<script>
$(document).ready(function(){
  
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    
    if (this.hash !== "") {
     
      event.preventDefault();

      var hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>
  </body>
</html>
