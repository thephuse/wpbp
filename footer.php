  		</div><!--/.content-->
  		
  		<?php get_sidebar(); ?>
  		
  	</div><!--/.main-->
  </div><!--/.container-->
	
  <footer>
    <div class="container">
      &copy;<?php echo get_the_date('Y'); ?> 
    </div>
  </footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="/javascripts/libs/jquery.1.9.1.min.js"%3E%3C/script%3E'))</script>

<script src="<?php bloginfo('template_url'); ?>/javascripts/plugins.js"></script>
<script src="<?php bloginfo('template_url'); ?>/javascripts/script.js"></script>

<?php wp_footer(); ?>

</body>
</html>