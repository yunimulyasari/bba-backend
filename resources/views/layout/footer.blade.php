        <!-- button footer mobile -->
		<center><a class="button--footer--responsive collapse__link--footer">FOOTER <span class="icon--collapse--footer icon--collapse--min"></span></a></center>

        <!-- footer -->
		<section class="footer collapse__container--footer"> <!-- bg--blur -->
			<div class="footer__menu__wrapper">
				<div style="clear:both;"></div>
				<small class="footer__menu--copyright"><b><a href="{{ url('/') }}" style='color:#333'>Online Shop</a></b> Your Partner in Sophisticated Life, &copy; {{date('Y')}}, All Right Reserved | <a href="{{ URL::to('tos')}}">Terms &amp; Conditions</a></small>
			</div>
		</section>		
		
	</div><!-- /container -->
	
</body>
<!-- In corejs -->
	
	<script src="{{ asset('/front/js/component/scripts.js') }}"></script>
	
	<script src="{{ asset('/front/js/jquery-1.11.1.js') }}"></script>
	
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script src="{{ asset('/front/js/component/bxslider.js') }}"></script>
	<script src="{{ asset('/front/js/component/easing.1.3.js') }}"></script>
	<script src="{{ asset('/front/js/component/fitvids.js') }}"></script>
	<script src="{{ asset('/front/js/component/ready-20140222.min.js') }}"></script>
	<script src="{{ asset('/front/js/component/W-1.0.1.min.js') }}"></script>
	<script src="{{ asset('/front/js/component/molt.js') }}"></script>
	<script src="{{ asset('/front/js/component/echo.min.js') }}"></script>
	<script src="{{ asset('/front/js/component/unveil.js') }}"></script>
	<script src="{{ asset('/front/js/component/accounting.min.js') }}"></script>
	<script src="{{ asset('/front/js/component/list.js') }}"></script>
	<script src="{{ asset('/front/js/component/list.pagination.js') }}"></script>
	<script src="{{ asset('/front/js/component/jPages.js') }}"></script>	

	<!-- Datetimepicker -->
	<script src="{{ asset('/front/js/component/DateTimePicker.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('front/css/DateTimePicker.css') }}">


 	<!-- Script buat datetimepicker -->
    <script>
      $(document).ready(function(){


        $("#dtBox").DateTimePicker();

        
       	var today = new Date();
		var ddNow = today.getDate();
		
		var ddEnd = 21;
		var mm = today.getMonth(); 
		var yy = today.getFullYear();
		


	  });
    </script>


	
	<!-- Sitelinks Search Box -->
	<script type="application/ld+json">
	{
	  "@context": "http://schema.org",
	  "@type": "WebSite",
	  "url": "http://www.flowerstudio.co.id/",
	  "potentialAction": {
	    "@type": "SearchAction",
	    "target": "https://query.flowerstudio.co.id/search?q={search_flower}",
	    "query-input": "required name=search_flower"
	  }
	}
	</script>
	<!-- end search -->

	<!-- Include Your Site Name in Search Results -->
	<script type="application/ld+json">
	{
	  "@context" : "http://schema.org",
	  "@type" : "WebSite",
	  "name" : "Flower Studio",
	  "alternateName" : "Flower Shop Online",
	  "url" : "http://www.flowerstudio.co.id"
	}
	</script>
	<!-- end Include Your Site Name in Search Results -->


    <script>
  /* when document is ready */
  $(function()
    {
    /* initiate the plugin */
    $("div.holder").jPages({
      containerID  : "filter",
      perPage      : 12,
      startPage    : 1,
      startRange   : 1,
      midRange     : 5,
      endRange     : 1
    });

  });
  </script>

  <style type="text/css">
  .holder {
    margin: 15px 0;
  }

  .holder a {
    font-size: 12px;
    cursor: pointer;
    margin: 0 5px;
    color: #333;
  }

  .holder a:hover {
    background-color: #222;
    color: #fff;
  }

  .holder a.jp-previous { margin-right: 15px; }
  .holder a.jp-next { margin-left: 15px; }

  .holder a.jp-current, a.jp-current:hover {
    color: #FF4242;
    font-weight: bold;
  }

  .holder a.jp-disabled, a.jp-disabled:hover {
    color: #bbb;
  }

  .holder a.jp-current, a.jp-current:hover,
  .holder a.jp-disabled, a.jp-disabled:hover {
    cursor: default;
    background: none;
  }

  .holder span { margin: 0 5px; }
  </style>

</html>