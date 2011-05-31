<?php
/*
Plugin Name: Open Canyon
Plugin URI: http://paulbyers.co.uk
Description: An open source plugin for wordpress which displays items from a users envato store
Version: 1.0
Author: Paul Byers
Author URI: http://paulbyers.co.uk
License: Copyright 2001  Paul Byers  (email : pzbyers@googlemail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/

function my_init() {
	if (!is_admin()) {
        // unregister and queue up dojo, replace with js framework of choice
		//wp_deregister_script('dojo');
		//wp_register_script('dojo', 'http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojo/dojo.xd.js', false, '1.6');
		//wp_enqueue_script('dojo');
        
        //enque stylesheet
        wp_enqueue_style('envatoStyle', WP_PLUGIN_URL .'/Open-Envato/style.css');
	}
}

add_action('init', 'my_init');

function openenv_admin_actions() {  
    
    // add an admin settings page
    add_options_page("Open Envato Store Display", "Open Envato Store Display", 1, "Open_Envato_Store_Display", "openenv_admin");
}  
  
add_action('admin_menu', 'openenv_admin_actions'); 

function openenv_admin() {
    
    // include admin settings page
    include('openEnvatoStore_import_admin.php');  
}

function openenv_getproducts() {  
    
    $storeType      = get_option('openenv_store_type');  
    $storeUsername  = get_option('openenv_store_username');
    
    // go away and get JSON, probs not the best way to do this
    // could this be a security risk?
    $file = file_get_contents("http://marketplace.envato.com/api/edge/new-files-from-user:".$storeUsername.",".$storeType.".json");
    
    $json_data = json_decode($file);
    
    $html = '';    
    $html .= '<ul id="envatoStoreList">';
    
    // loop through array of items and generate html
    foreach($json_data as $item){
        foreach($item as $i) {
            
            $html .= '';
            $html .= '<li class="envPlugListItem"><h4>'.$i->{'item'}.'</h4><a href="'.$i->{'url'}.'">';
            $html .= '<img src="'.$i->{'thumbnail'}.'" />';
            $html .= '</a>';
            $html .= '</li>';
            $html .= '<a href="'.$i->{'url'}.'">View Item >> </a>';
        }
    }
  
    $html .= '</ul>'; 
 
    return $html; 
}

?>

