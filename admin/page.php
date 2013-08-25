<?php include("header.php");
?>
            <!-- start: Content -->
            
            <div id="content" class="pagecontent span11">
            <form id="page-form" action="inc/page-controller.php"  method="post" class="form-horizontal">
            <div class="navigate-bar box">
                <h2>หน้าเว็บไซต์</h2>
                <div id="page-list" class="row">
                    <ul>
                        <?php
                        $args=array( 'post_type' => 'page','posts_per_page'=>4,'orderby' => 'menu_order', 'order' => 'ASC');
                        $the_query = new WP_Query( $args );
                        $i=1;
                        while ( $the_query->have_posts() ) {
                                $the_query->the_post();$current='';
                                if($_GET['page_id']==$post->ID) $current='current';
                                if($i==1&&empty($_GET['page_id'])){ $current='current';$editpage1=$post->ID;}
                                echo '<li class="page-menu '.$current.'"><a href="page.php?page_id=' . $post->ID . '" data-type="page" rel="' . $post->ID . '"><i class="fa-icon-file"></i><span class="hidden-tablet">' . get_the_title() . '</span></a></li>';
                                $i++;
                        }
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div>
                
            </div>
            <?php
                //1. get the page data
                $editpage=$_GET['page_id']?$_GET['page_id']:$editpage1; 
                $query_page=array('page_id'=>$editpage);
                $page_result = new WP_Query( $query_page );
                $i=1;
                while ( $page_result->have_posts() ): $page_result->the_post();
                
                //2. get page type
                    $page_type=is_page_type($_GET['page_id']);
                    if($page_type=='product'){
                        include( 'page-product.php');
                    }else{
                        include ('page-page.php');
                    }
                endwhile;
                ?>
            
            
<?php include("footer.php"); ?>
