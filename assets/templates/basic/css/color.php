<?php
header("Content-Type:text/css");
$color = "#f0f";
$color2 = "#000";
function checkhexcolor($color){
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}
if (isset($_GET['color']) AND $_GET['color'] != '') {
    $color = "#" . $_GET['color'];
}
if (!$color OR !checkhexcolor($color)) {
    $color = "#f0f";
}
function checkhexcolor2($color2){
    return preg_match('/^#[a-f0-9]{6}$/i', $color2);
}
if (isset($_GET['color2']) AND $_GET['color2'] != '') {
    $color2 = "#" . $_GET['color2'];
}
if (!$color2 OR !checkhexcolor2($color2)) {
    $color2 = "#000";
}
?>

.header .main-menu li a:hover, .header .main-menu li a:focus,.licence-widget .licence-text a,.author-widget__list li a:hover,.menuactive,.cssload-loader, .footer-links li::after, .faq-item.open .faq-title .title,.base--color, .testimonial-card::before, .link a:hover{
    color: <?php echo $color; ?>!important
}

.cmn--table thead tr th, .header .nav-right .login-btn, .cmn-btn,.widget__title::after,.table.style--two thead,.subscribe-form .subscribe-btn,.base--bg,.pagination li.active a, .pagination li.active span,.pagination li a:hover,.author-widget__wave,.border-btn:hover,.image-share-list li a:hover,.author-widget__thumb,.liked,.category-slider .slick-arrow:hover{
    background-color: <?php echo $color; ?>!important
}


.header .nav-right .login-btn,.pagination li.active a, .pagination li.active span,.pagination li a:hover,.border-btn:hover,.image-share-list li a:hover{
    border-color: <?php echo $color; ?>!important
}

.preloader .animated-preloader, .preloader .animated-preloader::before,.cssload-loader::before, .cssload-loader::after, .social-icons li a:hover {
    background:<?php echo $color; ?>!important
}

.custom-radio__field:checked + .custom-radio__circle::before{
    box-shadow:inset 0 0 0 5px <?php echo $color; ?>!important
}

.custom-radio__circle::before{
    box-shadow: inset 0 0 0 2px <?php echo $color; ?>!important;
}

.deposit:focus {
    box-shadow: 0 0 0 0.2rem <?php echo $color; ?>!important;
}


.faq-item.open .faq-title .right-icon::after, .faq-item.open .faq-title .right-icon::before {
    background: <?php echo $color; ?>!important;
}

a:hover {
color: <?php echo $color; ?>;
}


.pricing-card__icon i {

color: <?php echo $color; ?> !important;
}


.package-amount.color--1{
color: <?php echo $color; ?> !important;
}
