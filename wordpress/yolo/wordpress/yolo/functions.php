<?php 

//根据标签ID获取文章数
function get_tag_post_count_by_id( $tag_id ) {
    $tag = get_term_by( 'id', $tag_id, 'post_tag' );
   _make_cat_compat( $tag );
    return $tag->count;
}

register_nav_menus(
    array(
    'header-menu' => __( '导航自定义菜单' ),
    'footer-menu' => __( '页角自定义菜单' ),
    'sider-menu' => __('侧边栏菜单')
    )
);

?>