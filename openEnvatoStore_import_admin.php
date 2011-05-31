<?php 
	if($_POST['openenv_hidden'] == 'Y') {
		//Form data sent
		$dbhost = $_POST['openenv_dbhost'];
		update_option('openenv_dbhost', $dbhost);
		
		$dbname = $_POST['openenv_dbname'];
		update_option('openenv_dbname', $dbname);
		
		$dbuser = $_POST['openenv_dbuser'];
		update_option('openenv_dbuser', $dbuser);
		
		$dbpwd = $_POST['openenv_dbpwd'];
		update_option('openenv_dbpwd', $dbpwd);

		$envStoreType = $_POST['openenv_store_type'];
		update_option('openenv_store_type', $envStoreType);

		$envUsername = $_POST['openenv_store_username'];
		update_option('openenv_store_username', $envUsername);
		?>
		<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
		<?php
	} else {
		//Normal page display
		$dbhost = get_option('openenv_dbhost');
		$dbname = get_option('openenv_dbname');
		$dbuser = get_option('openenv_dbuser');
		$dbpwd = get_option('openenv_dbpwd');
		$envStoreType = get_option('openenv_store_type');
		$envUsername = get_option('openenv_store_username');
	}
?>

<div class="wrap">  
    <?php echo "<h2>" . __( 'Open Envato Store Display Options', 'openenv_trdom' ) . "</h2>"; ?>  
    <form name="oscimp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
        <input type="hidden" name="openenv_hidden" value="Y">  
        <?php    echo "<h4>" . __( 'Open Envato Store Database Settings', 'openenv_trdom' ) . "</h4>"; ?>  
        <p><?php _e("Database host: " ); ?><input type="text" name="openenv_dbhost" value="<?php echo $dbhost; ?>" size="20"><?php _e(" ex: localhost" ); ?></p>  
        <p><?php _e("Database name: " ); ?><input type="text" name="openenv_dbname" value="<?php echo $dbname; ?>" size="20"><?php _e(" ex: envato_store" ); ?></p>  
        <p><?php _e("Database user: " ); ?><input type="text" name="openenv_dbuser" value="<?php echo $dbuser; ?>" size="20"><?php _e(" ex: root" ); ?></p>  
        <p><?php _e("Database password: " ); ?><input type="text" name="openenv_dbpwd" value="<?php echo $dbpwd; ?>" size="20"><?php _e(" ex: secretpassword" ); ?></p>  
        <hr />  

        <?php echo "<h4>" . __( 'Open Envato Store Settings', 'openenv_trdom' ) . "</h4>"; ?>
        
        <p>
            <?php _e("Your Envato Username: " ); ?>
            <input type="text" name="openenv_store_username" value="<?php echo $envUsername; ?>" size="20">
            <?php _e(" ex: collis" ); ?>
        </p>  
        <p>
            <?php _e("Store Type: " ); ?>
            <input type="text" name="openenv_store_type" value="<?php echo $envStoreType; ?>" size="20">
            <?php _e(" ex: themeforest" ); ?>
        </p>  
  
        <p class="submit">  
            <input type="submit" name="Submit" value="<?php _e('Update Options', 'openenv_trdom' ) ?>" />  
        </p>
    </form>  
</div>  