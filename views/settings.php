<style>
	#normal-sortables .meta-box-sortables.ui-sortable .postbox .inside ul li{
		list-style: inside none disc;
	}
	#normal-sortables .meta-box-sortables.ui-sortable .postbox .inside a {
	  display: inline-block;
	  margin-top: 15px;
	  width: 100%;
	}
	#normal-sortables .meta-box-sortables.ui-sortable .postbox .inside a p {
	  float: left;
	  padding: 0;
	}
</style>
<title>Cycles - Visual Feedback and Approvals
</title>

<div class="wrap"> 
     <h2 class="hndle"><?php _e('Cycles for Web Development', $this->plugin_name); ?></h2>      
    <?php    
    if (isset($this->message)) {
        ?>
        <div class="updated fade"><p><?php echo $this->message; ?></p></div>  
        <?php
    }
    if (isset($this->errorMessage)) {
        ?>
        <div class="error fade"><p><?php echo $this->errorMessage; ?></p></div>  
        <?php
    }
    ?> 
    
	
   
    	<div id="post-body" class="metabox-holder columns-2">
    		<!-- Content -->
    		<div id="post-body-content" >
				<div id="normal-sortables" class="meta-box-sortables ui-sortable">                        
	                 
	                    <div id="post-body-content" >
							<?php if($this->settings['toggleHeader']=="on") { ?>
							<div class="meta-box-sortables ui-sortable">
							<?php } else { ?>
								<div class="meta-box-sortables ui-sortable notice is-dismissible">
							<?php } ?>
							
							<?php if($this->settings['toggleHeader']=="off") { ?>
								<div >

									<h2><span><?php esc_attr_e( 'A (free) Cycles account is required', 'wp_admin_style' ); ?></span></h2>
									
									<div class="inside">
										<p>Why? Cycles is cross-platform, and an account enables: 
												 
												
												<li>A record of all comments, replies, and approvals (outside of your WordPress database)</li>
												<li>Easy notifications and integrations (no technical configuration required)</li>
												<li>Cycles to work on any webpage (not just WordPress)</li>
												 
												Free accounts have no trial time limits, and include all visual feedback and approval features.
												<a  target="_blank" href=" https://app.getcycles.io/users/sign_up"><?php submit_button(
													'Get a free Cycles account', $type = 'delete', $name = 'submit', $wrap = TRUE, $other_attributes = NULL
												); ?> </a>
												</p>
												<p>
												</p>
									</div>
									<!-- .inside -->

								</div>
								
								<?php } ?>
							
								<?php if ( $this->settings['ihaf_insert_header'] != "" )
								{?>
								 <!--<div class="notice"><p>Find your embed code and manage notifications in your <a target="_blank" href="https://app.getcycles.io/projects">Cycles Project</a> settings.</p></div> --> 
								 <?php
								}
								if ($this->settings['toggleHeader'] == "off") {
									?>
									<div class="error fade notice notice-info is-dismissible"><p>Cycles JS code snippet is currently DISABLED.</p></div>  
									<?php
								}?>
								<!-- .postbox -->

							</div>
							<!-- .meta-box-sortables .ui-sortable -->

						</div>
	                    <div class="inside">
	                    </div> 
	                    	
		                    <form action="options-general.php?page=<?php echo $this->plugin_name; ?>" method="post">

		                    	<table> 
		                    	<?php wp_nonce_field($this->plugin_name, $this->plugin_name.'_nonce'); ?>
								<tr><td>
								<label for="toggleHeader"><b>Cycles is:</b></label>
								</td>
								<td><p> 
									<select name="toggleHeader" id="toggleHeader">
										<option <?php if ($this->settings['toggleHeader']=="on"){ ?>selected="selected" <?php } ?> value="on">Enabled</option>
										<option <?php if ($this->settings['toggleHeader']=="off"){ ?>selected="selected" <?php } ?> value="off">Disabled</option>
									</select>
								</p>
								</td>
								</tr>
								<tr><td>
		                    		<label for="ihaf_insert_header"><strong><?php _e('Cycles JS code snippet:', $this->plugin_name); ?></strong></label></td>
									<td><p>
		                    		<textarea placeholder="<?php _e('&lt;!-- insert Cycles script here --&gt;', $this->plugin->name); ?>" name="ihaf_insert_header" id="ihaf_insert_header" class="widefat" rows="8" style="font-family:Courier New;"><?php echo $this->settings['ihaf_insert_header']; ?></textarea>	
		                    		<?php _e('Enter Cycles JS code snippet for your project. You can find it in your <a target="_blank" href="https://app.getcycles.io/projects">Cycles Project</a> settings.', $this->plugin_name); ?>	
		                    	</p></td></tr>
		                    	<tr>
									<th scope="row">
							               Enable Cycles for:
									</th>
									<td>
									  <fieldset id="us-settings-form">
										  <label for="us-visible-for-all">
										  	<input type="radio" name="cycle_options[visible-for]" <?php echo ($this->settings['visible_for']=="all")?' checked="checked" ':"";?> value="all" id="us-visible-for-all"/> <span>All Visitors</span>
										  </label>
										  <br>
										  <label for="us-visible-for-users">
										  	<input type="radio" <?php echo ($this->settings['visible_for']=="users")?' checked="checked" ':"";?> name="cycle_options[visible-for]" value="users" id="us-visible-for-users"/> <span>Only users who are signed in</span>
										  </label>
										  <br>
										  <label for="us-visible-for-roles">
										  	<input type="radio" <?php echo ($this->settings['visible_for']=="roles")?' checked="checked" ':"";?> name="cycle_options[visible-for]" value="roles" id="us-visible-for-roles"/> <span>Only users with a specific role</span>
										  </label>
									  </fieldset>

									  <div style="display: none;" class="form-table" id="us-visible-roles">
										<?php
										$wp_roles = new WP_Roles();
										$roles = $wp_roles->get_names();
										$ctn = 0;
										$check = false;

										foreach ($roles as $role_value => $role_name) { ?>
											<p>
											  <input type="checkbox"  <?php echo (is_array(maybe_unserialize($this->settings['visible_roles'])) && in_array($role_value, maybe_unserialize($this->settings['visible_roles'])))?"checked='checked'":"";  ?> name="cycle_options[visible-roles][]" value="<?php echo $role_value; ?>" id="us-visible-for-role-<?php echo $ctn;?>"/>
											  <label for="us-visible-for-role-<?php echo $ctn;?>"><?php echo $role_name; ?></label>
											</p>
											<?php
											$ctn++;
									  	}
										?>
										</div>
										<script type="text/javascript">
											jQuery(document).ready(function() {
												jQuery('#us-settings-form input[type=radio]').change(function() {
													var radio = jQuery('#us-visible-for-roles');
													if (radio.is(':checked')) {
														jQuery('#us-visible-roles').show();
													} else {
														jQuery('#us-visible-roles').hide();
													}
												});
												var radio = jQuery('#us-visible-for-roles');
												if (radio.is(':checked')) {
													jQuery('#us-visible-roles').show();
												}
											});
											</script>
									</td></tr>
								<tr>

								<td colspan="2">
								<p>
									<input name="submit" type="submit" name="Submit" class="button button-primary" value="<?php _e('Save changes', $this->plugin_name); ?>" /> 
								</p>
								</td>
								</tr>
						    </form>
						    <?php
						    $data = $this->settings;
	                    	print_r( maybe_unserialize($data['ihaf_roles']) ); 

	                    ?>
	
	                
	                <?php
	                // RSS Feed
	                if (isset($this->dashboard)) {
	                	?>
		                <div id="wpbeginner" class="postbox">
		                    <h3 class="hndle"><?php _e('Latest from WPBeginner', $this->plugin->name); ?></h3>
		                    
		                    <div class="inside">
			                    <?php 
			                    $this->dashboard->outputDashboardWidget();
								?>
		                    </div>
		                </div>
		                <!-- /postbox -->
		                <?php
	                }
	                ?>
				</div>
				<!-- /normal-sortables -->
    		</div> 
    	</div>  
</div>