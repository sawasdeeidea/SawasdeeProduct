<?php
include('core.php');
$error_setting=array();

// Update post 37
  $my_post = array();
  $my_post['ID'] = $_POST['page_id'];
  $my_post['post_title'] =  trim($_POST['title']);
  $my_post['post_content'] =  $_POST['content'];

// Update the post into the database
//delete_post_meta($_POST['page_id'], 'page_contents');
//update_post_meta($_POST['page_id'], 'page_contents', $_POST['content'] );
wp_update_post( $my_post );

//wp_redirect( '../page.php' );




?>
