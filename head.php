<?php
include('config.php');
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Creative</title>
    <!-- Custom CSS -->
    <link href="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }

        body {
            font-family: Rubik, sans-serif;

        }

        ::-webkit-scrollbar {
            display: none;
        }


        a {
            text-decoration: none;
        }

        label {
            font-size: 13px;

        }

        /* Add hover effect to sidebar links */
        .sidebar-link:hover {
            background-color: #f0f0f0;
            color: #337ab7;
            text-decoration: none;
        }

        /* Add active state to sidebar links */
        .sidebar-link.active {
            background-color: #337ab7;
            color: #fff;
            text-decoration: none;
        }

        /* Add transition effect to sidebar links */
        .sidebar-link {
            transition: background-color 0.3s, color 0.3s;
        }

        /* Add animation to sidebar navigation */
        .sidebar-nav {
            animation: slideIn 0.5s;
        }


        @keyframes slideIn {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(0);
            }
        }


        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 40px;
            /* reduced width */
            height: 20px;
            /* reduced height */
        }

        .switch input[type="checkbox"] {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 20px;
            /* added border radius */

        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            /* reduced height */
            width: 16px;
            /* reduced width */
            left: 2px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;

        }

        input[type="checkbox"]:checked+.slider {
            background-color: #2196F3;
        }

        input[type="checkbox"]:checked+.slider:before {
            -webkit-transform: translateX(20px);
            -ms-transform: translateX(20px);
            transform: translateX(20px);
        }

        .slider.round {
            border-radius: 20px;
            /* added border radius */
        }

        .slider.round:before {
            border-radius: 50%;
            /* added border radius */
        }
    </style>

</head>

<body>