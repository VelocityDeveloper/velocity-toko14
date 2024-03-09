<?php
add_action('widgets_init', 'justg_widgets_toko14_init');
function justg_widgets_toko14_init()
{
    register_sidebar(
        array(
            'name'          => __('Secondary Sidebar', 'justg'),
            'id'            => 'secondary-sidebar',
            'description'   => __('Secondary sidebar widget area', 'justg'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title"><span>',
            'after_title'   => '</span></h3>',
        )
    );
}
