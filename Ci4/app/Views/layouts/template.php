<!DOCTYPE html>
<html>
<head>
    <!-- Each pages title will go here -->
    <title><?=$this->renderSection('title',true)?></title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta content="" name="A quiz engine for teachers and trainers to create a short multiple choice quiz for their learners">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- the pro version is recommended for small screens -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- My Style.CSS -->
    <link href="<?= base_url();?>assets/css/style.css" rel="stylesheet">

    <!-- Alpine.js CDN link-->
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>

    <style>
        body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>

</head>
<body>
    <?= $this->renderSection('content'); ?>
</body>


