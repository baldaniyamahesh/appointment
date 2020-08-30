<?php
function add_button_like_dislike($content){
global $post;
$userid=get_current_user_id();
$postid=get_the_ID();
$post_type=get_post_type($postid);
 
 if($post_type==='post'){

 $like_lebel=get_option('wpac_like_btn_label','Like');
 $dislike_lebel=get_option('wpac_dislike_btn_label','DisLike');
 $wrap_start='<div class="wrap_like_syatem" style="text-align:center;border:1px solid grey; padding:10px;">';
 
 $like_btn='<a href="javascript:;" onclick="like_button_fun('.$postid.','.$userid.')" class="wp_btn_ikesystem system_like_btn" style="color:black; font-size:30px;padding:50px;"><i class="fas fa-thumbs-up fa-lg" aria-hidden="true"></i>'.$like_lebel.'</a>';
 
 $dislike_btn='<a href="javascript:;" onclick="dislike_button_fun('.$postid.','.$userid.')" class="wp_btn_likesystem system_dislike_btn" style="color:black; font-size:30px;padding:50px;"><i class="fas fa-thumbs-down fa-lg" aria-hidden="true"></i>'.$dislike_lebel.'</a>';
 
$wrap_end='</div>';

$response_ajax='<div id="wpacAjaxResponse" class="ajax-response" style="display:none;"><span></span></div>';

$content .=$wrap_start; 
$content .=$like_btn;
$content .=$dislike_btn;
$content .=$wrap_end;
$content .=$response_ajax;

return $content;
} 

}
add_action('the_content','add_button_like_dislike');

?>