<?php
function setLayout($sidebar = null){
    switch ($sidebar) {
        case 'compact':
            echo '<body data-sidebar="dark" data-sidebar-size="small">';
            break;
        case 'icon':
            echo '<body data-sidebar="dark" data-keep-enlarged="true" class="vertical-collpsed">';
            break;
        case 'boxed':
            echo '<body data-sidebar="dark" data-keep-enlarged="true" class="vertical-collpsed" data-layout-size="boxed">';
            break;        
        default:
            echo '<body data-sidebar="dark">';
            break;
    }
}
?>