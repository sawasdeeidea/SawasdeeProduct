<?php include(dirname(dirname(dirname(__FILE__))).'/wp-load.php'); ?>
<?php auth_redirect(); //Step 1 : Check Login - check login or log out will be redirect to such way  
$error_logs=array();
//Step 2 Check Userเช็คว่า User เป็นเจ้าของ Site นี้จริงหรือไม่
global $current_user;
get_currentuserinfo();

//Step 3 Set Blog ID หลังจากผ่านล๊อกอินแล้ว ให้ดึงค่ามาว่าผู้ใช้คนนี้ แก้ไขไซต์ ID อะไร และเก็บค่าเอาไว้
$blogs = get_blogs_of_user($current_user->id);
if ($blogs) {
    foreach ($blogs as $blog) {
        $site_id = $blog->userblog_id;
    }
} else {
    $error_logs[]='ไม่พบ Site ID ของคุณ';
}
//เช็คว่า User เป็นเจ้าของ Site นี้จริงหรือไม่
if (is_user_member_of_blog($current_user->ID, $site_id)) {
    //'คุณคือเจ้าของเว็บไซต์นี้';
} else {
    $error_logs[]='คุณยังไม่ใช่เจ้าของเว็บไซต์นี้';
}

//Step 4 สลับไปใช้ฟังก์ชั่นหลักของตัวเอง
global $switched;
switch_to_blog($site_id);

/****************************************************
 * Ajax Include Function
 ****************************************************/
 include(dirname(__FILE__).'/setting-ajax.php'); 

/****************************************************
 * Other Function
 ****************************************************/


if( !function_exists( 'add_gravatar_class' ) ):
    function add_gravatar_class($class) {
        $class = str_replace("class='avatar", "class='avatar thumbnail", $class);
        return $class;
    }
endif;
add_filter('get_avatar','add_gravatar_class');

if( !function_exists( 'DateThai' ) ):
    function DateThai($strDate,$needtime=false)
    {
            $strYear = date("Y",strtotime($strDate))+543;
            $strMonth= date("n",strtotime($strDate));
            $strDay= date("j",strtotime($strDate));
            $strHour= date("H",strtotime($strDate));
            $strMinute= date("i",strtotime($strDate));
            $strSeconds= date("s",strtotime($strDate));
            $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
            $strMonthThai=$strMonthCut[$strMonth];
            $data="$strDay $strMonthThai $strYear";
            if($needtime){
                $data.=", $strHour:$strMinute";
            }
            return $data;
    }   
endif;
if( !function_exists( 'is_page_type' ) ):
    function is_page_type($page_id)
    {
        $page_type = get_post_meta( $page_id, 'page_type', true );
        if( ! empty( $page_type ) ) {
          return $page_type;
        } else{
          return 'page';
        }
            
    }
endif;
?>