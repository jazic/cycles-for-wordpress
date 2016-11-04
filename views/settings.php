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

							<div class="meta-box-sortables ui-sortable notice is-dismissible">

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
								<td colspan="2">
								<p>
									<input name="submit" type="submit" name="Submit" class="button button-primary" value="<?php _e('Save changes', $this->plugin_name); ?>" /> 
								</p>
								</td>
								</tr>
						    </form>
	                <!-- /postbox -->
	                
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