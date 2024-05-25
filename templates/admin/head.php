<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="apple-touch-icon" sizes="76x76" href="http://localhost/pemweb/public/admin/img/apple-icon.png"/>
    <link rel="icon" type="image/png" href="http://localhost/pemweb/public/admin/img/favicon.png"/>
    <title>Exantara</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="http://localhost/pemweb/public/admin/css/nucleo-icons.css" rel="stylesheet"/>
    <link href="http://localhost/pemweb/public/admin/css/nucleo-svg.css" rel="stylesheet"/>
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="http://localhost/pemweb/public/admin/css/dashboard.css?v=1.0.1" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
</head>

<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
<div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
<?php include 'sidebar.php'; ?>

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    <?php include 'navbar.php'; ?>

<!--    --><?php //include 'tail.php'; ?>