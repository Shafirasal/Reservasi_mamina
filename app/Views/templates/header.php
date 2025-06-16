<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fresheat - Spicy Chicken</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link href="./output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header class="navbar">
    <div class="logo">FRESHEAT</div>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">Pages</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    <div class="social">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
        <a href="#" class="order-btn">ORDER NOW</a>
    </div>
</header> -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Fresheat</title>
  <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-black text-white font-sans min-h-screen flex flex-col">

<header class="bg-red-600 py-4">
  <div class="container mx-auto flex justify-between items-center px-6">
    <div class="text-xl font-bold">FRESHEAT</div>
    <nav class="space-x-4 hidden md:flex">
      <a href="#" class="hover:text-yellow-300">Home</a>
      <a href="#" class="hover:text-yellow-300">About Us</a>
      <a href="#" class="hover:text-yellow-300">Shop</a>
      <a href="#" class="hover:text-yellow-300">Pages</a>
      <a href="#" class="hover:text-yellow-300">Blog</a>
      <a href="#" class="hover:text-yellow-300">Contact</a>
    </nav>
    <div class="flex items-center gap-3">
      <a href="#" class="bg-white text-red-600 px-4 py-2 rounded font-semibold hover:bg-yellow-300">ORDER NOW</a>
    </div>
  </div>
</header>
