<?php
/*
Plugin Name: Rockable Contact Form
Plugin URI:
Description: A simple plugin that generates a set contact form.
Author: Tony Edwards
Version: 1.0
Author URI: http://www.tonyedwards.io
*/

define ('RCF_PATH', WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) . '/');
define ('RCF_NAME', 'Rockable Contact Form');
define ('RCF_VERSION', '1.0');
define ('RCF_SLUG', 'rcf-contact-form');

function rcf_build_form($sendTo, $subject) {
    
    if(isset($_POST['rcf-submit'])){
        $rcfProcessor = new RockableProcessForm($sendTo);
        $message = $rcfProcessor->email($subject, $rcfProcessor->buildMsg($_POST), $_POST['rcf-email']);
        print '<h3>$message</h3>';
    }


    $form = '<div class="<?php print RCF_SLUG; ?>">
        <form name="<?php print RCF_SLUG; ?>" method="POST">
            <div>
                <label for = "rcf-name">Name:</label><br/>
                <input type="text" name="rcf-name" required="required" placeholder="ex john Smith" />
            </div>
            <div>
                <label for = "rcf-email">Email:</label><br/>
                <input type="email" name="rcf-email" required="required" placeholder="ex joe@example.com" />
            </div>
            <div>
                <label for = "rcf-message">Message:</label><br/>
                <textarea name="rcf-name" required="required"></textarea>
            </div>
            <div>
                <input type="submit" name="rcf-submit" value="Submit" />
            </div>
        </form>
    </div>';
    return $form;
}

function rcf_insert_form($atts, $content=null){
    extract(shortcode_atts( array('sendto' => get_bloginfo('admin_email'), 'subject' => 'Contact Form form '. get_bloginfo('name')), $atts));
    $form = rcf_build_form($snedto, $subject);
    return $form;
}
add_shortcode('rcf_form', 'rcf_insert_form');

function rcf_get_form($sendto = '', $subject = ''){
    $sendto = ($sendto == '') ? get_bloginfo('admin_email') : $sendto;
    $subject = ($subject == '') ? 'Contact Form form' . get_bloginfo('name') : $subject;
    print rcf_build_form($sendto, $subject);
}