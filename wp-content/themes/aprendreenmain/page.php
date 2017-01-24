<?php
get_header();
the_post();
// send request too Ulule
$request = wp_remote_get("https://api.ulule.com/v1/projects/9892");
$res = json_decode($request["body"]);
// set price require
$require = $res->goal;
// set price committed
$total = $res->committed;

?>

<?php get_footer(); ?>