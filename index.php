<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'modules/PHPMailer/src/PHPMailer.php';

$phpmailer = new PHPMailer();
$phpmailer->setLanguage('fr');
$phpmailer->CharSet = 'UTF-8';

$errors = [];
if (!empty($_POST)) {
  $lname = $_POST['lname'];
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  if (empty($lname)) {
    $errors['lname'] = 'Le nom est requis';
  }
  if (empty($fname)) {
    $errors['fname'] = 'Le prénom est requis';
  }
  if (empty($email)) {
    $errors['email'] = 'L\'adresse mail est requis';
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'L\'adresse mail est invalide';
  }
  if (empty($message)) {
    $errors['message'] = 'Un message est requis';
  }
  if (empty($errors)) {
    $phpmailer->From = trim($_POST["email"]);
    $phpmailer->FromName = trim($_POST["fname"]) . " " . trim($_POST["lname"]);
    $phpmailer->AddAddress('mathis.gasparotto@hotmail.com', 'Mathis Gasparotto');
    $phpmailer->Subject =  "Nouveau message de " . trim($_POST["fname"]) . " " . trim($_POST["lname"]) . " (from mathisgasparotto.fr)";
    $phpmailer->WordWrap = 50;
    $phpmailer->IsHTML(true);
    $phpmailer->MsgHTML('
    <div><b>Nom : </b>'.$_POST["lname"].'</div>
    <div><b>Prénom : </b>'.$_POST["fname"].'</div>
    <div><b>Email : </b><a href="mailto:'.$_POST["email"].'">'.$_POST["email"].'</a></div>
    <div><b>Message :</b></div>
    <div><p style="margin:0;">'.$_POST["message"].'</p></div>
    ');
    $phpmailer->AltBody = $_POST["message"];
    if (!$phpmailer->send()) {
      $sendError = $phpmailer->ErrorInfo;
    } else{
      $sendSuccess = 'Message bien envoyé';
      unset($lname, $fname, $email, $message);
    }
  }
} ?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/data/style/main.css">
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;600;700;800;900&display=swap" /> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <link rel="shortcut icon" href="/data/img/favicon.ico" type="image/x-icon">
  <title>Développeur Web - Mathis GASPAROTTO</title>
</head>

<body id="index body" class="loading">
  <div class="loading-screen">
    <div class="dots">
      <span class="dot" style="--animation-delay: 0s"></span>
      <span class="dot" style="--animation-delay: .4s"></span>
      <span class="dot" style="--animation-delay: .8s"></span>
      <span class="dot" style="--animation-delay: 1.2s"></span>
    </div>
  </div>
  <div class="screen-container">
    <div class="content">
      <header class="header" id="header">
        <div class="menu">
          <div class="logo">
            <a href="#top" class="home_link scroll-to-top">
              <svg class="logo-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1080 650.26">
              <g>
                <g>
                  <path class="border" d="M76.39,88.17h106.64l119.09,252.2,119.87-252.2h105.08v467.04h-113.64v-207.83l-101.97,223.4h-18.68l-101.97-224.96v209.39H76.39V88.17Zm85.62,445.24V249.3h13.23l126.88,274L431.34,249.3h10.9v284.11h56.04V109.97h-56.82l-128.44,273.22h-21.79L163.57,109.97h-58.38v423.45h56.82Z"></path>
                  <path class="border" d="M670.42,69.75c81.46-28.79,148.61-18.67,211.45,11.96l-50.48,95.44c-39.69-16.52-83.08-20.18-124.92-5.39-78.53,27.75-108.42,104.36-82.23,178.49,28.79,81.46,104.92,112.35,178.31,86.41,77.06-27.23,99.45-83.03,87.34-126.63l-125.5,44.35-32.94-93.21,242.19-85.59,14.78,41.83c45.91,129.9,7.96,265.5-152.03,322.04-139.45,49.28-275.09-19.19-321.52-150.56-46.42-131.37,16.09-269.87,155.53-319.14Zm158.72,449.16c141.64-50.06,176.75-165.65,133.69-287.49l-9.08-25.69-187.88,66.39,18.41,52.11,127.7-45.13c20.53,60.44-.89,142.32-104.38,178.88-94.68,33.46-180.92-12.02-211.26-97.89-30.35-85.87,8.18-175.44,102.85-208.89,38.9-13.75,81.99-13.29,120.34-2.9l28.04-56.14c-50.87-22.48-106.79-24.18-169.9-1.88-122.56,43.31-177.91,169.37-135.64,289,42.28,119.63,164.54,182.92,287.1,139.61Z"></path>
                </g>
                <g>
                  <path class="inner" d="M116.87,118.53h41.25l1.56,3.89h-40.48l-2.33-3.89Zm7.78,15.57h40.48l1.56,3.89h-39.7l-2.34-3.89Zm7.78,15.57h40.48l1.56,3.89h-39.7l-2.34-3.89Zm7.79,15.57h39.7l1.56,3.89h-38.92l-2.33-3.89Zm7.78,15.57h39.7l1.56,3.89h-38.92l-2.34-3.89Zm8.56,15.57h38.14l1.56,3.89h-37.36l-2.34-3.89Zm7.79,15.57h37.36l1.56,3.89h-36.58l-2.33-3.89Zm7.78,15.57h36.58l1.56,3.89h-35.8l-2.34-3.89Zm7.78,15.57h35.81l2.34,3.89h-35.81l-2.34-3.89Zm7.79,15.57h35.81l1.56,3.89h-35.03l-2.33-3.89Zm7.78,15.57h35.03l2.34,3.89h-35.03l-2.34-3.89Zm7.01,15.57h35.81l1.56,3.89h-35.03l-2.34-3.89Zm7.01,15.57h35.81l1.56,3.89h-35.03l-2.33-3.89Zm7.01,15.57h35.8l1.56,3.89h-35.03l-2.33-3.89Zm7.78,15.57h35.81l1.56,3.89h-35.03l-2.34-3.89Zm7.01,15.57h35.81l1.56,3.89h-35.03l-2.34-3.89Zm7.01,15.57h36.58l1.56,3.89h-35.81l-2.33-3.89Zm7.78,15.57h35.03l2.34,3.89h-35.03l-2.34-3.89Zm7.01,15.57h35.81l2.33,3.89h-35.8l-2.34-3.89Zm7.01,15.57h36.58l2.34,3.89h-36.59l-2.33-3.89Zm44.37,15.57l2.33,3.89h-37.36l-2.33-3.89h37.36Zm7.78,15.57l2.34,3.89h-38.14l-2.33-3.89h38.14Zm7.01,15.57l2.33,2.34-1.56,2.33h-35.8l-2.34-4.67h37.36Zm-3.89,15.57l-2.33,3.89h-21.8l-2.33-3.89h26.46Zm-7.01,15.57l-2.33,3.89h-7.79l-2.33-3.89h12.45Zm-3.11,14.01l-3.11,3.89-3.11-3.89h6.23ZM450.02,118.53h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.89h-40.48v-3.89Zm0,15.57h40.48v3.11h-40.48v-3.11Z"></path>
                  <path class="inner" d="M537.7,329.65l41.1-14.52-.17,4.19-40.37,14.26-.56-3.93Zm2.99,15.46l40.37-14.26-.17,4.19-39.63,14-.56-3.93Zm3.72,15.2l39.63-14,.56,3.93-39.63,14.01-.56-3.93Zm4.45,14.94l39.63-14.01,1.3,3.67-39.63,14.01-1.3-3.67Zm5.19,14.68l39.63-14.01,2.03,3.41-39.63,14-2.03-3.41Zm6.65,14.16l39.63-14,2.76,3.15-40.37,14.26-2.03-3.41Zm7.39,13.9l40.37-14.26,2.76,3.15-40.37,14.26-2.77-3.15Zm8.86,13.38l41.1-14.52,2.76,3.15-41.83,14.78-2.03-3.41Zm9.59,13.12l42.57-15.04,3.5,2.89-44.04,15.56-2.03-3.41Zm10.33,12.86l45.5-16.08,4.23,2.63-46.24,16.34-3.5-2.89Zm12.53,12.08l48.44-17.12,4.97,2.37-49.91,17.64-3.5-2.89Zm13.99,11.57l52.84-18.67,4.97,2.37-54.31,19.19-3.5-2.89Zm16.2,10.79l58.71-20.75,5.7,2.11-60.92,21.53-3.5-2.89Zm89.59-15.15l8.64,1.08-75.59,26.71-4.97-2.37,71.92-25.42Zm56.56-3.48c6.13-1.34,16.66-4.24,24.74-7.09,10.27-3.63,16.62-6.7,22.97-9.77l115.22-40.72-3.11,5.22-260.54,92.07-5.7-2.11,106.42-37.61Zm149.77-36.42l-3.84,5.49-220.18,77.81-6.44-1.85,230.45-81.44Zm-21.97,24.27l-8.24,7.04-158.53,56.02-10.84-.3,177.61-62.76Zm-135-183.45l169.54-59.91,1.3,3.67-169.54,59.91-1.29-3.67Zm5.19,14.68l169.54-59.91,1.3,3.67-169.54,59.91-1.3-3.67Zm5.19,14.68l169.54-59.91,1.3,3.67-169.54,59.91-1.3-3.67Zm70.37,189.78c-5.35,3.54-14.63,7.65-32.98,14.13-11.74,4.15-24.48,7.82-35.27,9.99l68.25-24.12Zm24.02-74.53l76.33-26.97-2.37,4.97-80,28.27,6.04-6.26Zm22.7-24.53l59.45-21.01-1.64,4.71-62.38,22.05,4.58-5.75Zm10.96-20.38l51.37-18.15-1.64,4.71-52.11,18.41,2.38-4.97Zm4.84-100.78l39.63-14,1.3,3.67-40.37,14.26-.56-3.93Zm2.45,81.69l45.5-16.08-.9,4.45-46.97,16.6,2.37-4.97Zm1.27-66.49l39.63-14,.56,3.93-40.37,14.26,.17-4.19Zm1.62,48.96l44.04-15.56-.91,4.45-44.77,15.82,1.64-4.71Zm.69-16.75l41.83-14.78-.17,4.19-41.83,14.78,.17-4.19Zm-.05-16.49l40.37-14.26-.17,4.19-39.63,14-.56-3.93Z"></path>
                </g>
              </g>
              <line class="line" x1="44.02" y1="614.88" x2="1035.98" y2="614.88"></line>
              <line class="line" x1="44.02" y1="614.88" x2="1035.98" y2="614.88"></line>
            </svg>
            </a>
          </div>
          <div class="hamburger-menu">
            <div class="bar"></div>
          </div>

        </div>
      </header>
      <main class="main-container">
        <div class="main">

          <div class="click-to-select"></div>

          <div class="page home-page" id="top">

            <section class="main-hero">
              <div class="overlay">
                <div class="inner">
                  <div class="start">
                    <h1 class="title"><span>Développeur</span> Web</h1>
                    <h2 class="subtitle">Mathis <span>GASPAROTTO</span></h2>
                    <div class="btns">
                      <a href="/data/downloads/CV_DeveloppeurWeb_MathisGasparotto_RVB.pdf" class="btn btn-dl btn_with_icon btn-secondary cv-dl-btn left" download="CV_DeveloppeurWeb_MathisGasparotto_RVB.pdf">
                        <i class="fa fa-dl"></i>
                        <span class="content">Télécharger mon CV</span>
                      </a>
                      <a href="#contact" class="btn btn-primary right scroll-animation">Contact</a>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <div class="page-content" id="page-content">
              
              <section class="skills section" id="skills">
                <div class="container">
                <h2 class="section-title d-none">Mes compétences</h2>
                  <div class="skills-section">
                    <div class="img-container">
                      <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="img">
                        <path d="M34.9,-55.5C47.3,-53.3,60.9,-48.1,67.4,-38.4C74,-28.7,73.6,-14.3,75.6,1.1C77.5,16.6,81.9,33.2,76.6,45.2C71.4,57.3,56.5,64.7,42.2,67.4C27.8,70,13.9,67.8,1.4,65.3C-11.1,62.9,-22.2,60.3,-36.2,57.4C-50.3,54.6,-67.3,51.7,-75.6,42.1C-83.9,32.5,-83.5,16.2,-77.2,3.6C-70.9,-9,-58.7,-17.9,-52.6,-31.3C-46.5,-44.7,-46.4,-62.5,-38.7,-67.4C-30.9,-72.3,-15.4,-64.3,-2.1,-60.6C11.2,-57,22.5,-57.7,34.9,-55.5Z" transform="translate(100 100), scale(1.2)" />
                      </svg>
                    </div>
                    <div class="skill-content">
                      <h3 class="title">Développement front-end</h3>
                      <h4 class="text">HTML - CSS - JS - jQuery - Vue.js</h4>
                    </div>
                  </div>
                  <div class="skills-section">
                    <div class="img-container">
                      <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="img">
                        <path d="M37.1,-67.8C44.6,-60,44.8,-43,51.5,-30.1C58.3,-17.3,71.6,-8.6,78.1,3.7C84.6,16.1,84.2,32.2,76.8,44.1C69.5,55.9,55.2,63.3,41.2,66.1C27.3,68.8,13.6,66.7,1.7,63.7C-10.2,60.7,-20.4,56.9,-31.2,52.3C-42,47.8,-53.4,42.6,-61,33.8C-68.6,25,-72.3,12.5,-71.9,0.2C-71.5,-12.1,-67.1,-24.1,-60.2,-34.2C-53.4,-44.2,-44.1,-52.2,-33.6,-58.3C-23.2,-64.3,-11.6,-68.5,1.6,-71.3C14.8,-74.1,29.6,-75.6,37.1,-67.8Z" transform="translate(100 100), scale(1.2)" />
                      </svg>
                    </div>
                    <div class="skill-content">
                      <h3 class="title">Développement back-end</h3>
                      <h4 class="text">PHP - Laravel - SQL</h4>
                    </div>
                  </div>
                  <div class="skills-section">
                    <div class="img-container">
                      <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="img">
                        <path d="M41.9,-68.5C55.1,-65,66.9,-55.3,70.8,-42.8C74.6,-30.3,70.3,-15.2,69.7,-0.4C69,14.4,71.9,28.8,67.6,40.4C63.3,52,51.7,60.8,39.3,69.7C26.8,78.5,13.4,87.5,2.2,83.7C-8.9,79.8,-17.9,63.1,-31.4,54.8C-44.9,46.6,-62.9,46.7,-73.8,38.9C-84.6,31.2,-88.3,15.6,-83.8,2.6C-79.2,-10.3,-66.5,-20.7,-56.8,-30.5C-47.2,-40.3,-40.6,-49.7,-31.7,-55.6C-22.7,-61.6,-11.4,-64.1,1.5,-66.7C14.4,-69.4,28.8,-72.1,41.9,-68.5Z" transform="translate(100 100), scale(1.17)" />
                      </svg>
                    </div>
                    <div class="skill-content">
                      <h3 class="title">Développement par CMS</h3>
                      <h4 class="text">WordPress - Elementor - WooCommerce</h4>
                    </div>
                  </div>
                  <div class="skills-section">
                    <div class="img-container">
                      <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="img">
                        <path d="M36.1,-65.3C48.1,-55.7,59.9,-48.5,66.7,-38.1C73.4,-27.6,75.2,-13.8,72,-1.9C68.8,10.1,60.6,20.2,55.1,32.9C49.7,45.7,46.9,61,38.2,72.1C29.4,83.2,14.7,89.9,2.6,85.4C-9.5,80.9,-19,65.2,-28.9,54.7C-38.7,44.3,-48.9,39.2,-58.3,31C-67.6,22.8,-76.1,11.4,-76.2,0C-76.2,-11.5,-67.9,-23,-61.4,-36.1C-54.9,-49.2,-50.2,-64,-40.3,-74.8C-30.3,-85.5,-15.2,-92.3,-1.5,-89.6C12.1,-87,24.2,-74.9,36.1,-65.3Z" transform="translate(100 100)" />
                      </svg>
                    </div>
                    <div class="skill-content">
                      <h3 class="title">Suite Adobe</h3>
                      <h4 class="text">Photoshop - Illustrator - InDesign - XD - Premiere Pro - After Affects</h4>
                    </div>
                  </div>
                </div>
              </section>
              <section class="section projects" id="projects">
                <div class="container">
                  <h2 class="section-title">Mes projets</h2>
                  <div class="projects-container">
                    <div class="project-container">
                      <div class="img-container">
                        <img src="/data/img/site-personnel-mathis-gasparotto-developpeur-projet.jpg" class="img" alt="site-personnel-mathis-gasparotto-developpeur-projet" title="Illustration de mon projet personnel" loading="lazy">
                        <h3 class="title">Site personnel</h3>
                      </div>
                      <div class="text-container">
                        <p class="content text">
                          À l’heure actuelle, le projet de développement web front-end pour lequel j’en suis le plus fière, c’est mon site personnel. Il y a 2 ans, je suis tombé sur un tuto sur YouTube pour faire un site avec un aspect 3D. Et ceux, juste en utilisant du simple HTML, CSS et JS. Donc je me suis lancé sur l’idée de refaire mon site personnel avec ce style 3D, afin de découvrir et d’expérimenter la 3D en CSS. <br>
                          Ce projet m’a permis de découvrir et d’expérimenter plein de nouvelles pratiques en CSS. C’est un peu mon site bac à sable. C’est un site sur lequel je travaille de temps en temps, à mes heures perdues. Ce qui fait qu’en 2 ans, il n’est toujours pas entièrement fini. En réalité, au niveau fonctionnalité et performance, il est assez complet, mais il manque plus qu’à rédiger les textes du site (je n’aime vraiment pas ça 😅).
                        </p>
                        <a href="https://github.com/Mathis-Gasparotto/dev.mathisgasparotto.fr" class="btn read-more-btn btn-primary" target="_blank">Repository</a>
                      </div>
                    </div>
                    <div class="project-container">
                      <div class="img-container">
                        <img src="/data/img/generator-de-facture-laravel-mathis-gasparotto-developpeur-projet.jpg" class="img" alt="generator-de-facture-laravel-mathis-gasparotto-developpeur-projet" title="Illustration du projet du générateur de facture sous Laravel" loading="lazy">
                        <h3 class="title">Générateur de facture</h3>
                      </div>
                      <div class="text-container">
                        <p class="content text">
                          Dans le cadre de ma 2ème année de mon Bachelor Web & Multimedia, j’ai eu l’occasion de découvrir le framework PHP Laravel. Durant cette découverte, j’ai notamment développé une plateforme de génération de factures. Pour un peu plus d’explication, cette plateforme permet, suite à la connexion à son compte, de gérer ses clients, gérer ses missions avec ces clients, et pouvoir gérer automatiquement tous les documents relatifs à une mission (facture, etc..). Durant ce projet, j’ai donc pu faire des CRUD, et gérer les données en base de données, ainsi que gérer des relations entre plusieurs tables de données (même si en réalité il manque juste la génération du pdf 😉).
                        </p>
                        <a href="https://github.com/Mathis-Gasparotto/mds_dev_objet_2021/tree/master/quote-generator" class="btn read-more-btn btn-primary" target="_blank">Repository</a>
                      </div>
                    </div>
                    <div class="project-container">
                      <div class="img-container">
                        <img src="/data/img/plateforme-de-vote-mathis-gasparotto-web-developpeur-laravel-projet.jpg" class="img" alt="plateforme-de-vote-mathis-gasparotto-web-developpeur-laravel-projet" title="Illustration du projet de plateforme de vote sous Laravel" loading="lazy">
                        <h3 class="title">Plateforme de vote</h3>
                      </div>
                      <div class="text-container">
                        <p class="content text">
                          Dans le cadre d’un projet de fin d’année (toujours en 2ème année de mon Bachelor), j’ai développé une plateforme de référendum (dédiée à être interne à l’école). Cette plateforme permettait de proposer aux délégués des classes de faire des référendums, et de les proposer aux étudiants, afin qu’ils puissent voter pour ou contre. Sur cette plateforme (qui est en réalité un site pour mobile développé en Laravel), il y a 3 types de comptes. Soit les comptes Administrateur de la plateforme (super admin !) qui peuvent tout faire, de façon à administrer la plateforme en cas de problème. Il y avait également les comptes de l’administration de l’école, qui eux peuvent juste consulter les référendums en cours (et ceux archivés), et les accepter ou non (à la fin de la période de vote). Puis nous avions les comptes délégués, qui peuvent proposer des référendums aux autres étudiants, et qui peuvent y voter. Et enfin, il y avait les comptes étudiants, qui eux peuvent juste voir les référendums en cours (ainsi que ceux archivés), voter à ces référendums, et suivre leur progression.
                        </p>
                        <a href="https://github.com/Mathis-Gasparotto/my-digital-vote" class="btn read-more-btn btn-primary" target="_blank">Repository</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="projects-show-more container">
                  <div class="left bold">Et bien d’autres projets en tout genre…</div>
                  <div class="right">
                    <a href="https://github.com/Mathis-Gasparotto?tab=repositories" class="btn btn-secondary btn-with-icon" target="_blank">
                      <i class="fa fa-github"></i><span>Visiter mon GitHub</span>
                    </a>
                  </div>
                </div>
              </section>
              <section class="section who bg-secondary cl-white" id="who">
                <div class="container">
                  <div class="left img-container">
                    <img src="/data/img/mathis_gasparotto_developpeur_web.jpg" alt="mathis_gasparotto_developpeur_web" title="Mathis Gasparotto - Développeur Web" loading="lazy" class="img">
                  </div>
                  <div class="right content-container">
                    <h2 class="title">Qui suis-je ?</h2>
                    <p class="text">
                      Je suis un jeune étudiant passionné par l’informatique en général, mais surtout par le développement Web.<br> J’étudie actuellement à l’école de MyDigitalSchool en 3ème année de Bachelor Web &amp; Multimédia, où j'ai découvert un vrai passion pour le <strong>développement web</strong>. Je suis principalement passioné par le <strong>développement Back-End</strong>, avec un petit penchant pour le language de programme <strong>PHP</strong>.
                    </p>
                  </div>
                </div>
              </section>
              <section class="section coordinates bg-light" id="contact"> 
                <div class="container">
                  <h2 class="section-title d-none">Mes coordonnées de contact</h2>
                  <address class="wrapper">
                    <div class="single-coordinate">
                      <a href="mailto:mathis.gasparotto@hotmail.com">
                        <i class="fa fa-envelope icon"></i>
                      </a>
                      <span class="title">Email</span>
                      <a href="mailto:mathis.gasparotto@hotmail.com">
                        <span class="text">mathis.gasparotto@hotmail.com</span>
                      </a>
                    </div>
                    <div class="single-coordinate">
                      <a href="https://www.linkedin.com/in/mathis-gasparotto/" target="_blank">
                        <i class="fa fa-linkedin-in icon"></i>
                      </a>
                      <span class="title">Linkedin</span>
                      <a href="https://www.linkedin.com/in/mathis-gasparotto/" target="_blank">
                        <span class="text">Mathis GASPAROTTO</span>
                      </a>
                    </div>
                  </address>
                </div>
              </section>
              <section class="section contact-form bg-secondary" id="contact-form">
                <div class="container">
                  <hgroup class="title-container">
                    <h2 class="section-title d-none">Fomulaire de contact</h2>
                    <p class="title h2">Envoyez-moi un message</p>
                  </hgroup>
                  <div class="form-container">
                    <form method="POST" class="form" action="/#contact-form">
                    <?php if (isset($sendSuccess) && $sendSuccess) { ?>
                      <div class="alert alert-success send-info"><?php echo $sendSuccess; ?></div>
                    <?php } ?>
                    <?php if (isset($sendError) && $sendError) { ?>
                      <div class="alert alert-danger send-infos"><?php echo $sendError; ?></div>
                    <?php } ?>
                    <div class="input-container">
                      <label for="lname" class="required">Nom</label>
                      <input class="<?php echo((!empty($errors['lname'])) ? 'is-invalid' : '') ?>" type="text" id="lname" name="lname" placeholder="Votre nom" value="<?php if(isset($lname)) echo $lname; ?>" >
                      <?php if(isset($errors['lname'])){ ?>
                        <div class="invalid-feedback"><?php echo $errors['lname']; ?></div>
                      <?php } ?>
                    </div>
                    <div class="input-container">
                      <label for="fname" class="required">Prénom</label>
                      <input class="<?php echo((!empty($errors['fname'])) ? 'is-invalid' : '') ?>" type="text" id="fname" name="fname" placeholder="Votre prénom" value="<?php if(isset($fname)) echo $fname; ?>" >
                      <?php if(isset($errors['fname'])){ ?>
                        <div class="invalid-feedback"><?php echo $errors['fname']; ?></div>
                      <?php } ?>
                    </div>
                    <div class="input-container">
                      <label for="email" class="required">Email</label>
                      <input class="<?php echo((!empty($errors['email'])) ? 'is-invalid' : '') ?>" type="text" id="email" name="email" placeholder="Adresse Email" value="<?php if(isset($email)) echo $email; ?>" >
                      <?php if(isset($errors['email'])){ ?>
                        <div class="invalid-feedback"><?php echo $errors['email']; ?></div>
                      <?php } ?>
                    </div>
                    <div class="input-container">
                      <label for="message" class="required">Message</label>
                      <textarea class="<?php echo((!empty($errors['message'])) ? 'is-invalid' : '') ?>" name="message" id="message" cols="30" rows="10" placeholder="Indiquez votre message ici"><?php if(isset($message)) echo $message; ?></textarea>
                      <?php if(isset($errors['message'])){ ?>
                        <div class="invalid-feedback"><?php echo $errors['message']; ?></div>
                      <?php } ?>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Envoyer" >
                    </form>
                  </div>
                </div>
              </section>
              <section class="section cta bg-secondary" id="cta">
                <div class="container">
                  <hgroup>
                    <h2 class="section-title d-none">Télécharger mon CV</h2>
                    <p class="title cl-white h2">Sinon, vous pouvez toujours télécharger mon CV 😉</p>
                  </hgroup>
                  <a href="/data/downloads/CV_DeveloppeurWeb_MathisGasparotto_RVB.pdf" class="btn btn-dl btn_with_icon btn-primary cv-dl-btn left" download="CV_DeveloppeurWeb_MathisGasparotto_RVB.pdf">
                    <i class="fa fa-dl"></i>
                    <span class="content">Télécharger mon CV</span>
                  </a>
                </div>
              </section>
            </div>

            <footer class="footer bg-secondary cl-white">
              ©Mathis GASPAROTTO | 2022
            </footer>
          </div>

        </div>
        <div class="back-page one">

        </div>
        <div class="back-page two">

        </div>
        <div class="back-page three">

        </div>
      </main>
      <nav class="nav-desktop">
        <ul class="nav-items">
          <li style="--i: 0.1s" class="nav-item">
            <a href="#skills" class="nav-link">
              Skills
            </a>
          </li>
          <li style="--i: 0.15s" class="nav-item">
            <a href="#projects" class="nav-link">
              Projets
            </a>
          </li>
          <li style="--i: 0.2s" class="nav-item">
            <a href="#who" class="nav-link">
              Qui suis-je ?
            </a>
          </li>
          <li style="--i: 0.25s" class="nav-item">
            <a href="#contact" class="nav-link">
              Contact
            </a>
          </li>
        </ul>
      </nav>
      <nav class="nav-mobile bg-light">
        <ul class="nav-items">
          <li class="nav-item" id="nav-skills"><a href="#skills" class="nav-link scroll-animation">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" class="icon">
              <path d="m386.372 165.925c0-10.2-8.299-18.499-18.499-18.499h-1.242c-1.589 0-2.96-1.085-3.41-2.701-2.133-7.646-5.101-15.084-8.824-22.107-.765-1.442-.544-3.146.551-4.239l.633-.633c7.212-7.213 7.212-18.95 0-26.162l-14.785-14.784c-7.229-7.229-18.932-7.231-26.162 0l-.138.138c-1.12 1.119-2.85 1.325-4.311.509-7.212-4.026-14.878-7.244-22.785-9.564-1.44-.423-2.446-1.793-2.446-3.377 0-10.201-8.298-18.499-18.498-18.499h-20.908c-10.201 0-18.499 8.299-18.499 18.543 0 1.54-1.006 2.91-2.445 3.333-7.908 2.321-15.574 5.539-22.785 9.564-1.46.814-3.192.611-4.32-.518l-.13-.129c-7.223-7.223-18.932-7.231-26.161 0l-14.784 14.783c-7.229 7.229-7.231 18.931 0 26.162l.633.633c1.093 1.094 1.314 2.798.55 4.239-3.723 7.021-6.692 14.459-8.824 22.106-.451 1.616-1.821 2.702-3.41 2.702h-1.243c-10.201 0-18.499 8.299-18.499 18.499v20.907c0 10.201 8.299 18.499 18.499 18.499h2.228c1.538 0 2.897 1.04 3.381 2.589 2.293 7.342 5.37 14.474 9.145 21.197.727 1.295.464 2.97-.639 4.073l-1.821 1.82c-7.229 7.229-7.231 18.931 0 26.162l14.783 14.783c7.228 7.228 18.931 7.232 26.161 0l2.315-2.314c1.078-1.079 2.725-1.357 4.005-.674 6.659 3.551 13.701 6.428 20.93 8.548 1.432.42 2.431 1.813 2.431 3.389v3.346c0 10.2 8.299 18.499 18.499 18.499h20.908c10.2 0 18.498-8.299 18.498-18.499v-3.346c0-1.576 1-2.969 2.431-3.389 7.23-2.121 14.272-4.997 20.93-8.548 1.279-.682 2.927-.405 4.006.675l2.313 2.313c7.228 7.229 18.931 7.231 26.163 0l14.784-14.784c7.212-7.213 7.212-18.949-.001-26.162l-1.82-1.819c-1.103-1.104-1.367-2.78-.641-4.073 3.775-6.721 6.852-13.853 9.147-21.199.483-1.548 1.842-2.588 3.38-2.588h2.228c10.2 0 18.499-8.299 18.499-18.499v-20.905zm-14.999 20.907c0 1.931-1.57 3.501-3.501 3.501h-2.228c-8.135 0-15.248 5.271-17.697 13.115-1.983 6.349-4.643 12.515-7.908 18.326-4.003 7.13-2.723 16.186 3.113 22.024l1.82 1.82c1.365 1.365 1.365 3.586 0 4.951l-14.783 14.783c-1.367 1.367-3.583 1.369-4.952 0l-2.313-2.313c-5.705-5.706-14.617-7.066-21.669-3.303-5.756 3.07-11.844 5.556-18.094 7.39-7.777 2.281-13.208 9.593-13.208 17.781v3.346c0 1.93-1.57 3.5-3.5 3.5h-20.908c-1.931 0-3.501-1.57-3.501-3.5v-3.346c0-8.188-5.432-15.5-13.208-17.781-6.248-1.833-12.335-4.319-18.093-7.39-2.667-1.422-5.599-2.113-8.523-2.113-4.809 0-9.597 1.867-13.145 5.415l-2.315 2.314c-1.366 1.366-3.581 1.368-4.95 0l-14.784-14.783c-1.366-1.367-1.368-3.582 0-4.951l1.821-1.821c5.836-5.836 7.116-14.892 3.112-22.023-3.264-5.813-5.924-11.979-7.907-18.326-2.45-7.845-9.562-13.116-17.697-13.116h-2.228c-1.93 0-3.501-1.57-3.501-3.501v-20.907c0-1.93 1.57-3.5 3.501-3.5h1.243c8.269 0 15.612-5.622 17.857-13.671 1.844-6.61 4.41-13.039 7.629-19.11 3.87-7.3 2.585-16.089-3.196-21.87l-.633-.633c-1.366-1.367-1.368-3.582 0-4.951l14.784-14.784c.892-.892 1.933-1.025 2.474-1.025s1.583.133 2.485 1.035l.129.129c5.821 5.822 14.962 7.056 22.228 3 6.235-3.481 12.863-6.263 19.698-8.269 7.784-2.284 13.22-9.573 13.22-17.769 0-1.931 1.57-3.501 3.501-3.501h20.908c1.93 0 3.5 1.57 3.5 3.545 0 8.151 5.437 15.44 13.222 17.725 6.834 2.005 13.462 4.787 19.698 8.268 7.265 4.055 16.406 2.822 22.228-2.999l.139-.139c1.365-1.366 3.583-1.368 4.95 0l14.784 14.784c1.365 1.365 1.365 3.586 0 4.951l-.632.632c-5.783 5.782-7.067 14.571-3.197 21.871 3.218 6.071 5.786 12.501 7.628 19.11 2.245 8.049 9.588 13.671 17.858 13.671h1.242c1.931 0 3.501 1.57 3.501 3.5v20.908z"></path>
              <path d="m256 96.26c-43.25 0-78.437 35.187-78.437 78.437 0 43.311 35.298 78.437 78.437 78.437 43.144 0 78.437-35.132 78.437-78.437 0-43.25-35.187-78.437-78.437-78.437zm0 141.876c-17.739 0-33.792-7.328-45.316-19.104 6.929-10.753 17.429-18.719 29.671-22.424 4.679 2.462 10 3.864 15.645 3.864s10.965-1.401 15.645-3.864c12.243 3.705 22.743 11.671 29.672 22.424-11.525 11.776-27.578 19.104-45.317 19.104zm-18.715-71.379c0-10.319 8.395-18.715 18.715-18.715s18.715 8.395 18.715 18.715c0 10.319-8.396 18.715-18.715 18.715s-18.715-8.395-18.715-18.715zm73.561 39.76c-6.999-9.208-16.188-16.494-26.717-21.204 3.526-5.327 5.586-11.704 5.586-18.556 0-18.59-15.124-33.714-33.714-33.714s-33.714 15.124-33.714 33.714c0 6.852 2.06 13.229 5.585 18.556-10.529 4.71-19.719 11.996-26.718 21.205-5.453-9.362-8.593-20.228-8.593-31.82 0-34.98 28.459-63.439 63.439-63.439s63.438 28.459 63.438 63.439c0 11.592-3.14 22.458-8.592 31.819z"></path>
              <path d="m381.263 51.619c-33.873-33.629-78.869-51.966-126.577-51.614-40.215.291-78.124 13.808-109.628 39.09-3.231 2.593-3.748 7.312-1.156 10.543 2.593 3.229 7.312 3.748 10.543 1.155 28.845-23.148 63.545-35.523 100.35-35.789 43.742-.321 84.886 16.467 115.901 47.259 31.02 30.796 48.102 71.827 48.102 115.534 0 37.393-12.329 72.551-35.653 101.675-2.59 3.233-2.068 7.952 1.165 10.542 1.384 1.108 3.039 1.646 4.683 1.646 2.199 0 4.378-.962 5.858-2.812 25.115-31.358 38.946-70.796 38.946-111.051 0-47.734-18.657-92.545-52.534-126.178z"></path>
              <path d="m370.942 305.203c-3.34-2.448-8.034-1.728-10.483 1.613-10.254 13.982-18.897 29.084-25.775 44.942h-157.261c-10.179-23.552-24.116-45.067-41.482-64.018-27.38-29.877-42.557-68.659-42.737-109.203-.168-37.868 13.102-74.882 37.368-104.22 2.64-3.192 2.192-7.919-.999-10.558-3.192-2.641-7.919-2.192-10.558.999-26.5 32.041-40.993 72.472-40.809 113.846.196 44.281 16.774 86.638 46.678 119.27 15.624 17.05 28.269 36.327 37.681 57.379-7.727 4.488-12.939 12.851-12.939 22.412 0 7.193 2.949 13.709 7.698 18.407-4.749 4.699-7.698 11.214-7.698 18.407s2.949 13.708 7.698 18.407c-4.749 4.699-7.698 11.214-7.698 18.407 0 14.284 11.622 25.906 25.906 25.906h.477v2.098c0 18.033 14.671 32.704 32.704 32.704h94.576c18.034 0 32.704-14.671 32.704-32.704v-2.098h.477c14.285 0 25.906-11.622 25.906-25.906 0-7.193-2.948-13.708-7.698-18.407 4.749-4.699 7.698-11.214 7.698-18.407s-2.948-13.708-7.698-18.407c4.749-4.699 7.698-11.214 7.698-18.407 0-9.532-5.178-17.872-12.866-22.371 6.253-13.946 13.978-27.243 23.045-39.608 2.449-3.341 1.726-8.034-1.613-10.483zm-49.948 174.093c0 9.763-7.943 17.706-17.706 17.706h-94.576c-9.763 0-17.706-7.943-17.706-17.706v-2.098h129.987v2.098zm-97.818-38.912h113.293c6.014 0 10.907 4.893 10.907 10.907s-4.893 10.907-10.907 10.907h-160.938c-6.014 0-10.907-4.893-10.907-10.907s4.893-10.907 10.907-10.907h12.585c4.142 0 7.499-3.358 7.499-7.499s-3.358-7.499-7.499-7.499h-12.585c-6.014 0-10.907-4.893-10.907-10.907s4.893-10.907 10.907-10.907h160.938c6.014 0 10.907 4.893 10.907 10.907s-4.893 10.907-10.907 10.907h-113.293c-4.142 0-7.499 3.358-7.499 7.499s3.357 7.499 7.499 7.499zm113.293-51.812h-160.938c-6.014 0-10.907-4.893-10.907-10.908 0-5.327 3.841-9.767 8.898-10.714.161-.021.323-.042.484-.074.5-.07 1.007-.12 1.526-.12h160.938c.544 0 1.075.053 1.599.131.167.033.334.055.501.077 5.012.982 8.807 5.404 8.807 10.7-.001 6.015-4.894 10.908-10.908 10.908z"></path>
            </svg>
            Skills
          </a></li>
          <li class="nav-item" id="nav-projects"><a href="#projects" class="nav-link scroll-animation">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" class="icon">
              <path d="m511.271 96.69c0-31.382-21.423-58.555-51.484-66.11-9.006-18.705-27.726-30.58-48.757-30.58h-208.26c-20.109 0-38.309 11.038-47.677 28.495h-86.169c-37.603 0-68.194 30.592-68.194 68.195l0 347.12c0 37.6 30.59 68.19 68.189 68.19h72.22c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-72.219c-29.329 0-53.189-23.861-53.189-53.19v-251.98c0-29.329 23.86-53.19 53.189-53.19h119.06c17.975 0 34.596 8.97 44.461 23.997l27.209 41.429c12.646 19.263 33.955 30.764 57 30.764h126.43c29.329 0 53.189 23.861 53.189 53.19v155.79c0 29.329-23.86 53.19-53.189 53.19h-271.94c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h271.94c37.6 0 68.189-30.59 68.189-68.19zm-495.542 52.542v-52.542c0-29.332 23.863-53.195 53.194-53.195h80.761c-.693 3.475-1.045 7.027-1.045 10.635v17.043h-20.327c-29.286 0-53.198 23.387-54.088 52.467h-5.304c-21.493 0-40.683 10.006-53.191 25.592zm256.459 46.601-27.209-41.429c-12.646-19.263-33.955-30.764-56.999-30.764h-98.756c.881-20.809 18.073-37.467 39.088-37.467h208.258c21.577 0 39.131 17.559 39.131 39.142v94.515h-59.051c-17.975 0-34.596-8.97-44.462-23.997zm192.972 27.687v-119.4c0-4.142-3.357-7.5-7.5-7.5s-7.5 3.358-7.5 7.5v116.078c-2.328-.241-4.689-.368-7.08-.368h-52.379v-94.515c0-29.854-24.283-54.142-54.131-54.142h-172.93v-17.043c0-5.286 1.031-10.401 3.069-15.213 6.133-14.529 20.288-23.917 36.061-23.917h208.26c16.193 0 30.494 9.738 36.426 24.792 1.794 4.587 2.704 9.411 2.704 14.337v20.69c0 4.142 3.357 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-20.689c0-2.015-.124-4.015-.344-6 18.77 8.393 31.454 27.229 31.454 48.561v148.732c-8.01-9.984-18.764-17.665-31.11-21.903z"></path>
              <path d="m351.772 124.512c-3.658-1.945-8.197-.554-10.143 3.103l-27.468 51.681-18.992-23.637c-2.593-3.228-7.314-3.744-10.544-1.149s-3.744 7.315-1.149 10.544l26.12 32.508c1.432 1.781 3.586 2.802 5.846 2.802.234 0 .47-.011.706-.033 2.511-.237 4.734-1.72 5.918-3.947l32.81-61.729c1.943-3.658.555-8.199-3.104-10.143z"></path>
              <path d="m66.062 281.15h127.927c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-127.927c-4.143 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5z"></path>
              <path d="m66.062 308.901h127.927c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-127.927c-4.143 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5z"></path>
            </svg>
            Projets
          </a></li>
          <li class="nav-item" id="nav-who"><a href="#who" class="nav-link scroll-animation">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.997 511.997" xml:space="preserve" class="icon">
              <path d="m187.318 138.097c18.759 0 34.02-15.261 34.02-34.02 0-1.708.117-3.416.348-5.073 2.591-18.56 19.356-32.127 38.188-30.883 5.921.383 11.72 2.283 16.77 5.495 3.495 2.222 8.13 1.19 10.353-2.304 2.223-3.495 1.191-8.131-2.304-10.353-7.172-4.561-15.419-7.26-23.84-7.805-26.627-1.755-50.35 17.472-54.022 43.78-.326 2.343-.492 4.747-.492 7.144 0 10.488-8.532 19.02-19.02 19.02s-19.02-8.532-19.02-19.02c0-4.162.289-8.334.858-12.404 6.41-45.931 47.775-79.526 94.181-76.483 44.041 2.887 79.671 38.252 82.881 82.261 2.915 40.016-21.413 77.286-59.162 90.635-6.375 2.256-10.658 8.417-10.658 15.33v11.25c0 10.488-8.532 19.02-19.02 19.02s-19.02-8.532-19.02-19.02v-11.25c0-23.012 14.475-43.587 36.022-51.2 21.628-7.655 35.563-29.036 33.888-51.991-.129-1.782-.355-3.567-.672-5.305-.744-4.075-4.649-6.774-8.725-6.032-4.075.743-6.775 4.649-6.032 8.724.221 1.208.378 2.451.468 3.7 1.185 16.24-8.656 31.357-23.929 36.762-27.527 9.725-46.021 35.984-46.021 65.342v11.25c0 18.759 15.261 34.02 34.02 34.02s34.02-15.261 34.02-34.02v-11.25c0-.627.333-1.073.661-1.189 44.101-15.595 72.524-59.129 69.12-105.866-3.75-51.434-45.391-92.765-96.859-96.138-54.197-3.552-102.527 35.704-110.019 89.374-.665 4.753-1.002 9.625-1.002 14.48-.001 18.758 15.261 34.019 34.019 34.019z"></path>
              <path d="m257.375 259.338c-18.759 0-34.021 15.262-34.021 34.021v.22c0 18.759 15.262 34.021 34.021 34.021s34.021-15.262 34.021-34.021v-.22c.001-18.759-15.261-34.021-34.021-34.021zm19.022 34.241c0 10.488-8.533 19.021-19.021 19.021s-19.021-8.533-19.021-19.021v-.22c0-10.488 8.533-19.021 19.021-19.021s19.021 8.533 19.021 19.021z"></path>
              <path d="m436.805 503.317-26.17-164.242c-5.97-37.411-33.532-67.58-70.217-76.859-2.201-.557-4.538-.086-6.353 1.281s-2.911 3.483-2.982 5.753c-.003.08-.01.158-.013.238h-.005v.096c-.698 19.431-8.763 37.59-22.745 51.164-14.09 13.68-32.67 21.214-52.318 21.218-.006 0-.013 0-.019 0-19.642-.002-38.218-7.536-52.307-21.217-14.061-13.653-22.145-31.943-22.761-51.499-.071-2.271-1.168-4.386-2.982-5.753-1.815-1.368-4.153-1.839-6.353-1.281-36.697 9.282-64.259 39.452-70.218 76.86l-16.94 106.33c-.651 4.091 2.136 7.935 6.227 8.587 4.094.649 7.935-2.137 8.587-6.227l16.94-106.331c4.495-28.219 23.599-51.532 49.748-61.688v75.089c0 9.634 4.836 18.5 12.936 23.715 4.643 2.989 9.933 4.506 15.254 4.506 3.963 0 7.944-.841 11.687-2.542l11.738-5.335c-.002.128-.009.256-.009.384 0 6.679 2.604 12.958 7.325 17.672l13.466 13.476c.834.833 1.716 1.589 2.632 2.28l-25.577 57.194c-3.922 8.729-2.003 19.147 4.772 25.923l4.883 4.886h-133.644l2.338-14.681c.651-4.09-2.137-7.935-6.228-8.586-4.093-.652-7.935 2.137-8.586 6.228l-3.72 23.36c-.345 2.167.277 4.378 1.702 6.048 1.425 1.669 3.51 2.631 5.705 2.631h346.8c2.195 0 4.28-.962 5.705-2.632 1.426-1.668 2.047-3.878 1.702-6.046zm-118.037-171.805c4.661-4.526 8.767-9.48 12.296-14.771v38.096c0 4.578-2.208 8.625-6.057 11.104s-8.447 2.813-12.614.919l-30.246-13.746c13.621-4.114 26.155-11.441 36.621-21.602zm-119.175 35.349c-4.167 1.893-8.765 1.559-12.614-.92s-6.057-6.525-6.057-11.104v-38.111c3.53 5.296 7.638 10.256 12.303 14.785 10.465 10.161 22.996 17.488 36.613 21.603zm35.865 15.769c-1.889-1.887-2.93-4.395-2.93-7.063s1.041-5.176 2.941-7.074l2.664-2.671 17.861-8.117 17.847 8.111 2.689 2.689c1.889 1.886 2.929 4.394 2.929 7.062s-1.041 5.177-2.935 7.069l-13.455 13.464c-3.901 3.896-10.25 3.896-14.145.006zm-4.703 98.876c-2.401-2.401-3.083-6.086-1.692-9.182l26.086-58.332c.281.009.562.02.843.02.282 0 .565-.011.847-.02l26.092 58.343c1.386 3.084.703 6.769-1.7 9.172l-15.481 15.49h-19.513zm56.202 15.491 4.882-4.884c6.778-6.777 8.696-17.196 4.78-25.913l-25.583-57.206c.918-.692 1.803-1.45 2.639-2.285l13.454-13.464c4.728-4.721 7.331-10.999 7.331-17.678 0-.129-.007-.256-.009-.385l11.738 5.334c8.77 3.986 18.842 3.252 26.941-1.963 8.1-5.216 12.936-14.082 12.936-23.715v-75.093c26.147 10.152 45.254 33.469 49.758 61.692l24.787 155.56z"></path>
            </svg>
            Qui suis-je ?
          </a></li>
          <li class="nav-item" id="nav-contact"><a href="#contact" class="nav-link scroll-animation">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" xml:space="preserve" class="icon">
              <path d="M26.9,21.314l-4.949-4.95a1,1,0,0,0-1.414,0l-2.122,2.121a3,3,0,0,1-4.243,0l-.242-.242a3,3,0,0,1,0-4.243l2.121-2.122a1,1,0,0,0,0-1.414L11.1,5.515a1,1,0,0,0-1.414,0L7.565,7.636a9.01,9.01,0,0,0,0,12.728l4.485,4.485a9.01,9.01,0,0,0,12.728,0L26.9,22.728A1,1,0,0,0,26.9,21.314Zm-5.656-2.829,3.535,3.536-.707.707-3.535-3.536ZM10.394,7.636l3.535,3.535-.707.708L9.686,8.343Zm3.07,15.8L8.979,18.95a7.012,7.012,0,0,1-.657-9.142l3.556,3.556a5.009,5.009,0,0,0,.637,6.293l.242.242a5.012,5.012,0,0,0,6.293.637l3.556,3.556A7.013,7.013,0,0,1,13.464,23.435Z"></path>
              <path d="M27,32H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2H27a3,3,0,0,1,3,3V29A3,3,0,0,1,27,32ZM5,4A1,1,0,0,0,4,5V29a1,1,0,0,0,1,1H27a1,1,0,0,0,1-1V5a1,1,0,0,0-1-1Z"></path>
              <path d="M27,62H5a3,3,0,0,1-3-3V37a3,3,0,0,1,3-3H27a3,3,0,0,1,3,3V59A3,3,0,0,1,27,62ZM5,36a1,1,0,0,0-1,1V59a1,1,0,0,0,1,1H27a1,1,0,0,0,1-1V37a1,1,0,0,0-1-1Z"></path>
              <path d="M25,41H7a1,1,0,0,0-1,1V54a1,1,0,0,0,1,1H25a1,1,0,0,0,1-1V42A1,1,0,0,0,25,41ZM16,48.65,9.632,43H22.366Zm-3.734-.641L8,51.78V44.225Zm1.506,1.337.9.8a1.993,1.993,0,0,0,2.671.005l.9-.8L22.361,53H9.639Zm5.972-1.337L24,44.225V51.78Z"></path>
              <path d="M59,2H37a3,3,0,0,0-3,3V29a3,3,0,0,0,3,3h5V44.538l-1.17-2.479a2.962,2.962,0,0,0-1.369-1.731,3.007,3.007,0,0,0-2.281-.3l-.921.248a2,2,0,0,0-1.378,2.56l4.174,12.124a.988.988,0,0,0,.182.32l2.709,3.2L42,61.021A1,1,0,0,0,43,62H57a1,1,0,0,0,1-1V58.3l1.832-2.748A1.006,1.006,0,0,0,60,55V42a2.926,2.926,0,0,0-.874-2.108,3.058,3.058,0,0,0-3.23-.682,2.867,2.867,0,0,0-.77-1.318,3.06,3.06,0,0,0-3.23-.682,2.867,2.867,0,0,0-.77-1.318A3.053,3.053,0,0,0,48,35.171V32H59a3,3,0,0,0,3-3V5A3,3,0,0,0,59,2ZM49,37a.974.974,0,0,1,.712.306A.957.957,0,0,1,50,38v7a1,1,0,0,0,2,0V40a1,1,0,0,1,1-1,.974.974,0,0,1,.712.306A.957.957,0,0,1,54,40v5a1,1,0,0,0,2,0V42a1,1,0,0,1,1-1,.974.974,0,0,1,.712.306A.957.957,0,0,1,58,42V54.7l-1.832,2.748A1.006,1.006,0,0,0,56,58v2H43.979l-.041-1.921a1,1,0,0,0-.236-.626l-2.818-3.326L36.779,42.2l.914-.246a1.018,1.018,0,0,1,.768.1.98.98,0,0,1,.462.6c.015.059,3.173,6.763,3.173,6.763A1,1,0,0,0,44,49V29.112A1.082,1.082,0,0,1,44.907,28a.974.974,0,0,1,.805.3A.957.957,0,0,1,46,29V45a1,1,0,0,0,2,0V38A1,1,0,0,1,49,37Zm11-8a1,1,0,0,1-1,1H48V29a2.926,2.926,0,0,0-.874-2.108,2.966,2.966,0,0,0-2.387-.881A3.077,3.077,0,0,0,42,29.112V30H37a1,1,0,0,1-1-1V5a1,1,0,0,1,1-1H59a1,1,0,0,1,1,1Z"></path>
              <path d="M48,8a8,8,0,0,0,0,16h4a1,1,0,0,0,0-2H48a6,6,0,1,1,6-6v1a1,1,0,0,1-2,0V16a4.033,4.033,0,1,0-1.286,2.92A2.987,2.987,0,0,0,56,17V16A8.009,8.009,0,0,0,48,8Zm0,10a2,2,0,1,1,2-2A2,2,0,0,1,48,18Z"></path>
            </svg>
            Contact
          </a></li>
        </ul>
        <div class="progress-bar">
          <span class="progressed"></span>
        </div>
      </nav>
      <div class="scroll-to-top go-to-top" id="go-to-top">
        <a href="#top" class="go-to-top-link bg-white">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon">
            <path id="path2" d="m12 9.414-6.293 6.293c-.39.39-1.024.39-1.414 0s-.39-1.024 0-1.414l7-7c.39-.391 1.024-.391 1.414 0l7 7c.39.39.39 1.024 0 1.414s-1.024.39-1.414 0z"></path>
          </svg>
        </a>
      </div>
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
      <script src="/data/script/jquery.min.js"></script>
      <script src="/data/script/main.js"></script>
      <script>
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
      </script>
    </div>
  </div>
</body>

</html>