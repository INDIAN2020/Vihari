<?php 
add_action('admin_head', 'codingmarker');
function codingmarker() {
    global $current_screen;
    if('page' == $current_screen->id) 
    {
        echo <<<HTML
            <script type="text/javascript">
            jQuery(document).ready( function($) {

                /**
                 * Adjust visibility of the meta box at startup
                */
                if($('#page_template').val() == 'page-wpse-53486.php') {
                    // show the meta box
                    $('#myplugin_sectionid').show();
                    $("form#adv-settings label[for='myplugin_sectionid-hide']").show();
                } else {
                    // hide your meta box
                    $('#myplugin_sectionid').hide();
                    $("form#adv-settings label[for='myplugin_sectionid-hide']").hide();
                }

                // Debug only
                // - outputs the template filename
                // - checking for console existance to avoid js errors in non-compliant browsers
                if (typeof console == "object") 
                    console.log ('default value = ' + $('#page_template').val());

                /**
                 * Live adjustment of the meta box visibility
                */
                $('#page_template').live('change', function(){
                        if($(this).val() == 'page-wpse-53486.php') {
                        // show the meta box
                        $('#myplugin_sectionid').show();
                        $("form#adv-settings label[for='myplugin_sectionid-hide']").show();
                    } else {
                        // hide your meta box
                        $('#myplugin_sectionid').hide();
                        $("form#adv-settings label[for='myplugin_sectionid-hide']").hide();
                    }

                    // Debug only
                    if (typeof console == "object") 
                        console.log ('live change value = ' + $(this).val());
                });                 
            });    
            </script>
HTML;
    } 
    elseif ( 'post' == $current_screen->id ) 
    {
        echo <<<HTML
            <script type="text/javascript">
            jQuery(document).ready( function($) {
                if ( $('#in-category-6').is(':checked') ) {
                    $("form#adv-settings label[for='myplugin_sectionid-hide']").show();
                    $('#myplugin_sectionid').show();
                } else {
                    $('#myplugin_sectionid').hide();
                    $("form#adv-settings label[for='myplugin_sectionid-hide']").hide();
                }

                $('#in-category-6').live('change', function(){
                    if ( $(this).is(':checked') ) {
                        $('#myplugin_sectionid').show();
                        $("form#adv-settings label[for='myplugin_sectionid-hide']").show();
                    } else {
                        $('#myplugin_sectionid').hide();
                        $("form#adv-settings label[for='myplugin_sectionid-hide']").hide();
                    }
                });                 
            });    
            </script>
HTML;
    }
}