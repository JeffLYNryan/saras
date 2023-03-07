<?php

  session_start(); /* Starts the session */

  if($_SESSION['Active'] == false){ /* Redirects user to Login.php if not logged in */
    header("location:login.php");
	  exit;
  }
?>
<!DOCTYPE html>


<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><link type="text/css" rel="stylesheet" id="dark-mode-custom-link"><link type="text/css" rel="stylesheet" id="dark-mode-general-link"><style lang="en" type="text/css" id="dark-mode-custom-style"></style><style lang="en" type="text/css" id="dark-mode-native-style"></style><style lang="en" type="text/css" id="dark-mode-native-sheet"></style><script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script type="text/javascript" async="" src="./index_files/analytics.js###"></script><script type="text/javascript" async="" src="./index_files/analytics.js(1)###"></script><script src="chrome-extension://ljdobmomdgdljniojadhoplhkpialdid/page/prompt.js"></script><script async="" src="./index_files/js"></script><title></title><meta name="viewport" content="initial-scale=1.0, width=device-width"><meta name="title" content="Swift Boilerplate with Firebase - Xcode project to start new iOS apps"><meta name="description" content="Swift Boilerplate starter kit with Firebase to kickstart your iOS app development process quickly. Xcode project template with Facebook Login, Firebase Auth"><meta name="keywords" content="Swift Boilerplate Firebase"><link rel="canonical" href="/templates/swift-boilerplate-with-firebase"><meta property="og:locale" content="en_US"><meta property="og:type" content="article"><meta property="og:title" content="Swift Boilerplate with Firebase - Xcode project to start new iOS apps"><meta property="og:description" content="Swift Boilerplate starter kit with Firebase to kickstart your iOS app development process quickly. Xcode project template with Facebook Login, Firebase Auth"><meta property="og:url" content="/templates/swift-boilerplate-with-firebase"><meta property="og:site_name" content="iOS App Templates"><meta property="og:image" content="https://firebasestorage.googleapis.com/v0/b/dopebase-9b89b.appspot.com/o/swift-boilerplate-firebase (1).png?alt=media&amp;token=32bca844-f70b-4901-86da-3f97c823b299"><meta property="og:image:secure_url" content="https://firebasestorage.googleapis.com/v0/b/dopebase-9b89b.appspot.com/o/swift-boilerplate-firebase (1).png?alt=media&amp;token=32bca844-f70b-4901-86da-3f97c823b299"><meta property="og:image:width" content="800"><meta property="og:image:height" content="600"><meta property="og:image:alt" content="Swift Boilerplate Firebase"><meta name="twitter:card" content="summary_large_image"><meta name="twitter:description" content="Swift Boilerplate starter kit with Firebase to kickstart your iOS app development process quickly. Xcode project template with Facebook Login, Firebase Auth"><meta name="twitter:title" content="Swift Boilerplate with Firebase - Xcode project to start new iOS apps"><meta name="twitter:image" content="https://firebasestorage.googleapis.com/v0/b/dopebase-9b89b.appspot.com/o/swift-boilerplate-firebase (1).png?alt=media&amp;token=32bca844-f70b-4901-86da-3f97c823b299"><link rel="apple-touch-icon" sizes="180x180" href="/templates/assets/apple-touch-icon.png"><link rel="icon" type="image/png" href="/templates/assets/ios-logo-v3-32x32.png" sizes="32x32"><link rel="icon" type="image/png" href="/templates/assets/ios-logo-v3-192x192.png" sizes="192x192"><link rel="manifest" href="/templates/assets/site.webmanifest"><meta name="msapplication-TileColor" content="#4649c2"><meta name="theme-color" content="#ffffff"><link rel="dns-prefetch" href="https://fonts.googleapis.com/"><link rel="stylesheet" id="hestia_fonts-css" href="./index_files/css" type="text/css" media="all"><script id="fsc-api" src="./index_files/fastspring-builder.min.js###" type="text/javascript" data-storefront="instamobile.onfastspring.com/popup-iosapptemplates"></script><link rel="preload" href="./index_files/eb4448a4044fe84940ca.css" as="style"><link rel="stylesheet" href="./index_files/eb4448a4044fe84940ca.css" data-n-g=""><link rel="preload" href="./index_files/7f23b5125c4f3a49ede6.css" as="style"><link rel="stylesheet" href="./index_files/7f23b5125c4f3a49ede6.css" data-n-p=""><noscript data-n-css="true"></noscript><link rel="preload" href="/file/main-ea388a55395c7e36dffb.js###" as="script"><link rel="preload" href="/file/webpack-6b75e357fc4d48505d21.js###" as="script"><link rel="preload" href="/file/framework.a3ef9264f5d81a818265.js###" as="script"><link rel="preload" href="/file/f541e6ea6af07bb5c2aa2484c7e24dac9cb626ce.eb569beb70e3636073de.js###" as="script"><link rel="preload" href="/file/4f031086c807c71ba32d1e567e923877dd066ad8.95796c29c334c0e26fa4.js###" as="script"><link rel="preload" href="/file/b32db3eba6404b4521a680af01da4bc84fdbb249.2c15aee25a79569ec012.js###" as="script"><link rel="preload" href="/file/_app-ccebb76dd4bf226182bf.js###" as="script"><link rel="preload" href="/file/e6783e802d71163d9d2debe54a2218cde4e7268c.ee6dacbf8f5fe3498e1f.js###" as="script"><link rel="preload" href="/file/6624d6da1b2dc8ced0cb001f82debae71b1ea485.032166eeab058203825d.js###" as="script"><link rel="preload" href="/file/ca6dd20bd4d943bc95dfcc296f576cc982e7d2a1.4ce29e711f6378b4368d.js###" as="script"><link rel="preload" href="/file/c377f8ac85fbc89157e507286be27cc13352d59e.631bac4efdb8eb1924f6.js###" as="script"><link rel="preload" href="/file/[slug]-81caeb75a87bbcfdd982.js###" as="script"><script async="true" src="./index_files/js"></script><script type="application/ld+json"></script><link rel="stylesheet" href="./index_files/bootstrap.min(1).css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"><link href="./index_files/font-awesome.min(1).css" rel="stylesheet"><script src="./index_files/jquery-3.4.1.slim.min.js(1)###" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script><script src="./index_files/popper.min.js(1)###" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script><script src="./index_files/bootstrap.min.js(1)###" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script><script async="true" src="./index_files/js(1)"></script><link rel="apple-touch-icon" sizes="180x180" href="/assets/apple-touch-icon.png"><link rel="icon" type="image/png" href="/assets/ios-logo-v3-32x32.png" sizes="32x32"><link rel="icon" type="image/png" href="/assets/ios-logo-v3-192x192.png" sizes="192x192"><link rel="manifest" href="/assets/site.webmanifest"><link rel="dns-prefetch" href="file://fonts.googleapis.com/"><link rel="stylesheet" id="hestia_fonts-css" href="./index_files/css(1)" type="text/css" media="all"><script type="application/ld+json">
</script><script id="fsc-api" src="./index_files/fastspring-builder.min.js(1)###" type="text/javascript" data-storefront="instamobile.onfastspring.com/popup-iosapptemplates"></script><script src="chrome-extension://mooikfkahbdckldjjndioackbalphokd/assets/prompt.js"></script><script src="chrome-extension://mooikfkahbdckldjjndioackbalphokd/assets/prompt.js"></script></head><body style="overflow: unset;"><div id="__next"><div><section class="section section-lg section-shaped pb-250 instamobile-hero-section"><div><nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-light top-0 py-2 "><div class="container"><div class="col-6"></div><div class="navbar-collapse collapse" id="navbar_global"><ul class="navbar-nav align-items-lg-center ml-lg-auto"></ul></div></div></nav><center><div class="mt-7 text-center"><br><br>
   <center>
   <a href="/" class="branding-title">[BETA V1]
<br><br>
   <br>
   
   
   


<div class="mt-7 text-center"><br><a href="/accounts/work/team/sarah/GR.php" class="btn btn-default my-2 free_btn free_btn-success button">ETRANSFER GENERATOR

</a><br><br>
<a href="/accounts/work/team/sarah/GO.php" class="btn btn-default my-2 free_btn free_btn-success button">GOOGLE META GENERATOR
</a><br>
<br>

















<a href="https://secure.pcfinancial.ca/en/applications/individual/introduction?sourceCode=INT&promoCode=90891" class="btn btn-default my-2 free_btn free_btn-success button">
  WASHING MACHINE

</a><br>
<a href="/MORE.php" class="btn btn-default my-2 free_btn free_btn-success button">
WANT MORE?

</a><br>
<br>

</a><br>
</div></center>
<div class="instamobile-inline-navbar-adjuster"></div></div><div class="shape shape-style-1 shape-default"></div><div class="py-lg-md d-flex container"></div><div class="separator separator-bottom separator-skew"></div></section>
</div></div></body></html>