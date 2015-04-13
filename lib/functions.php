<?php
function registeradnfPage() {
	add_submenu_page( 'options-general.php', 'WP Admin Dashboard News Feed', 'ADNF Settings', 'manage_options', 'adnf-dashboard-feed', 'esoft_dashboard_feed' ); 
}
add_action('admin_menu', 'registeradnfPage');

function esoft_dashboard_feed() {
	
	echo '<div class="newsWrap">';
		echo '<h1>WP Admin Dashboard News Feed Configurations</h1>';
?>
   <div id="nhtLeft">  
    <form method="post" action="options.php"><?php wp_nonce_field('update-options'); ?>
		        
		<div class="inside">
        <h3>Set your feed information</h3>
			<table class="form-table">
                <tr>
					<th><label for="adnf_feed_title">Feed Title</label></th>
					<td><input type="text" name="adnf_feed_title" value="<?php $adnf_feed_title = get_option('adnf_feed_title'); if(!empty($adnf_feed_title)) {echo $adnf_feed_title;} else {echo "E2Soft News & Tutorials";}?>"></td>
				</tr>
                <tr>
					<th><label for="adnf_feed_link">Feed URL or Link</label></th>
					<td><input type="text" name="adnf_feed_link" value="<?php $adnf_feed_link = get_option('adnf_feed_link'); if(!empty($adnf_feed_link)) {echo $adnf_feed_link;} else {echo "http://www.e2soft.com/blog/feed/";}?>"></td>
				</tr>
                <tr>
					<th><label for="adnf_show_count">Show Count</label></th>
					<td><select name="adnf_show_count" id="adnf_show_count">
            <option value="2" <?php if( get_option('adnf_show_count') == '2'){ echo 'selected="selected"'; } ?>>2</option>
            <option value="3" <?php if( get_option('adnf_show_count') == '3'){ echo 'selected="selected"'; } ?>>3</option>
            <option value="4" <?php if( get_option('adnf_show_count') == '4'){ echo 'selected="selected"'; } ?>>4</option>
            <option value="5" <?php if( get_option('adnf_show_count') == '5'){ echo 'selected="selected"'; } ?>>5</option>
        </select></td>
				</tr>
                <tr>
					<th><label for="adnf_show_summery">Show Summery</label></th>
					<td><select name="adnf_show_summery" id="adnf_show_summery">
            <option value="1" <?php if( get_option('adnf_show_summery') == '1'){ echo 'selected="selected"'; } ?>>Yes</option>
            <option value="0" <?php if( get_option('adnf_show_summery') == '0'){ echo 'selected="selected"'; } ?>>No</option>
        </select></td>
				</tr>
                
				<tr>
					<th><label for="adnf_show_author">Show Author</label></th>
					<td><select name="adnf_show_author" id="adnf_show_author">
            <option value="1" <?php if( get_option('adnf_show_author') == '1'){ echo 'selected="selected"'; } ?>>Yes</option>
            <option value="0" <?php if( get_option('adnf_show_author') == '0'){ echo 'selected="selected"'; } ?>>No</option>
        </select></td>
				</tr>
				<tr>
					<th><label for="adnf_show_date">Show Date</label></th>
					<td><select name="adnf_show_date" id="adnf_show_date">
            <option value="1" <?php if( get_option('adnf_show_date') == '1'){ echo 'selected="selected"'; } ?>>Yes</option>
            <option value="0" <?php if( get_option('adnf_show_date') == '0'){ echo 'selected="selected"'; } ?>>No</option>
        </select></td>
				</tr>
		</table>
	
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="adnf_feed_title, adnf_feed_link, adnf_show_count,  adnf_show_summery, adnf_show_author, adnf_show_date" />
		<p class="submit"><input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" class="button button-primary" /></p>
	</form>      
  </div>
  </div>
 
  
  <div id="nhtRight">
  
  <div class="nhtWidget">
  <h3><a href="http://www.e2soft.com/">Need Web Design?</a></h3>
  
<div class="nhtWidget">
    
<p><h3>Donate and support the development.</h3> With your help I can make Simple Fields even better! $5, $10, $100 – any amount is fine! :)</p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="82C6LTLMFLUFW">
<input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>
<div class="clrFix"></div>
</div>
</div>
<div class="clrFix"></div>
<?php		
	echo '</div>';
}