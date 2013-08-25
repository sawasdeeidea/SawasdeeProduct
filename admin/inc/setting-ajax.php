<?php 
//include('core.php');
wp_enqueue_script('jquery');
function setting(){
    global $wpdb;
   $error_setting=array();
    /* Site Data*/
        if ( !empty($_POST['sitename']) ):
            $settings['sitename'] = trim($_POST['sitename']);
            endif;
        if ( !empty($_POST['sitedesc']) ):
            $settings['sitedesc'] = trim($_POST['sitedesc']);
            endif;
    
    /* Contact */
        if ( !empty($_POST['contact_person']) ):
            $settings['contact_person'] = trim($_POST['contact_person']);
            endif;
        if ( !empty($_POST['contact_email']) ):
            $settings['contact_email'] = trim($_POST['contact_email']);
            endif;
        if ( !empty($_POST['contact_tel']) ):
            $settings['contact_tel'] = trim($_POST['contact_tel']);
            endif;
        if ( !empty($_POST['contact_mobile']) ):
            $settings['contact_mobile'] = trim($_POST['contact_mobile']);
            endif;
         if ( !empty($_POST['contact_fax']) ):
            $settings['contact_fax'] = trim($_POST['contact_fax']);
            endif;
    
     /* Map */
        if ( !empty($_POST['map']) ):
            $settings['map'] = trim($_POST['map']);
            endif;

    /* User Data */
        if ( !empty($_POST['first_name']) ):
            $user_settings['first_name'] = trim($_POST['first_name']);
            endif;
        if ( !empty($_POST['last_name']) ):
            $user_settings['last_name'] = trim($_POST['last_name']);
            endif;
        if ( !empty($_POST['user_email'])&&is_email($_POST['user_email']) ):
            $user_settings['user_email'] = trim($_POST['user_email']);
            endif;
        if ( !empty($_POST['user_address']) ):
            $user_settings['user_address'] = trim($_POST['user_address']);
            endif;
        if ( !empty($_POST['user_phone']) ):
            $user_settings['user_phone'] = trim($_POST['user_phone']);
            endif;
        if ( !empty($_POST['user_fax']) ):
            $user_settings['user_fax'] = trim($_POST['user_fax']);
            endif;
        if ( !empty($_POST['user_password'])&&!empty($_POST['user_repassword'])):
                $pass=trim($_POST['user_password']);
                $repass=trim($_POST['user_repassword']);
                if( $pass==$repass):
                    $user_settings['user_password'] = trim($_POST['user_password']);
                endif;
       endif;

            
    // save option into the database
    foreach( $settings as $key => $value ):
        update_blog_option( $site_id , $key , $value );
    endforeach;
    foreach( $user_settings as $key => $value ):
        if($key=='user_email'){
             update_blog_option( $site_id , 'admin_email' , $value );
             //wpmu_log_new_registrations($site_id,$current_user->id); // log
             wp_update_user( array ( 'ID' => $current_user->id, 'user_email' => $value ) ) ;
        }elseif($key=='user_password'){
            wp_update_user( array ( 'ID' => $current_user->id, 'user_pass' => $value ) ) ;
        }else{
            update_user_meta( $current_user->id , $key , $value );
        }
    endforeach;
    // Run Result
    echo 'sdfs';
   
}
add_action('wp_ajax_setting', 'setting');
add_action('wp_ajax_nopriv_setting', 'setting'); // not really needed
?>