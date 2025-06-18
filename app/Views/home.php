<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mamina - Baby Spa</title>

  <!-- Swiper & Tailwind -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Custom Styles -->
  <style>
    /* .shape-fill {
      fill: #EE9591;
    } */

.custom-shape-divider-bottom-1750221021 {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
}

.custom-shape-divider-bottom-1750221021 svg {
    position: relative;
    display: block;
    width: calc(106% + 1.3px);
    height: 331px;
}

.custom-shape-divider-bottom-1750221021 .shape-fill {
    fill: #EE9591;
    opacity: 0.6;
}
  </style>
</head>

<body class="bg-[#FEF8F8]">

  <!-- Header -->
  <header class="py-4 text-[#555555]" style="background-color: #FEF8F8;">
    <div class="container mx-auto flex justify-between items-center px-6">
      <div class="text-xl font-bold">MAMINA</div>
      <nav class="space-x-4 hidden md:flex">
        <a href="#" class="hover:text-[#555555]">Home</a>
        <a href="#" class="hover:text-[#528b89]">About Us</a>
        <a href="#" class="hover:text-[#528b89]">Shop</a>
        <a href="#" class="hover:text-[#528b89]">Pages</a>
        <a href="#" class="hover:text-[#528b89]">Blog</a>
        <a href="#" class="hover:text-[#528b89]">Contact</a>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="bg-[#FEF8F8] relative overflow-hidden py-20 min-h-screen">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-6 relative z-10">
      <!-- Left Text -->
      <div class="md:w-1/2 text-left">
        <h1 class="text-5xl font-extrabold leading-tight mb-5 text-[#555555]">
          Sistem Informasi Reservasi dan Reminder
        </h1>
        <p class="text-[#555555] mb-6">
          Mamina Baby Spa dan Pijat Laktasi merupakan penyedia layanan kebidanan komplementer berpusat di Kota Malang berupa layanan ibu dan bayi
        </p>
        <a href="/dashboard" class="inline-block bg-[#EE9591] hover:bg-[#e6847d] text-white font-bold py-3 px-6 rounded shadow-lg transition-colors duration-300">
          Masuk
        </a>
      </div>

      <!-- Right Image with Blob Background -->
<div class="relative md:w-1/2 mt-10 md:mt-0 flex justify-center items-center md:translate-x-10 lg:translate-x-20">
  <!-- Blob SVG -->
  <div class="absolute w-[500px] h-[500px] opacity-40 z-0">
    <svg width="500" height="500" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
      <path fill="#EDB9B9"
        d="M32.4,-61.2C40.8,-51.3,45.6,-40.2,52.8,-29.8C60,-19.4,69.5,-9.7,71.2,1C72.8,11.6,66.6,23.3,59.2,33.2C51.7,43.1,43,51.2,32.9,56.9C22.9,62.6,11.4,65.8,0.9,64.3C-9.7,62.8,-19.4,56.6,-32.8,52.8C-46.3,49.1,-63.6,47.9,-71.1,39.5C-78.6,31.1,-76.4,15.6,-73.2,1.8C-70,-11.9,-65.9,-23.8,-58.6,-32.6C-51.4,-41.4,-41,-47.2,-30.7,-56C-20.4,-64.9,-10.2,-76.8,0.9,-78.4C12,-79.9,24,-71.2,32.4,-61.2Z"
        transform="translate(100 100) scale(1.3)" />
    </svg>
  </div>

        <!-- Image -->
        <div class="relative z-10">
          <img src="<?= base_url('assets/ruangan1.png') ?>" alt="mamina" class="w-full max-w-lg mx-auto" />
        </div>
      </div>
    </div>

    <!-- Bottom Shape Divider -->
<!-- <div class="custom-shape-divider-bottom-1750221021">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
    </svg>
</div> -->
  </section>

  <!-- Footer -->
  <footer class="bg-[#EE9591] text-white text-sm py-4 mt-auto">
    <div class="container mx-auto px-4 text-center">
      &copy; <?= date('Y') ?> FRESHEAT. All rights reserved.
    </div>
  </footer>

</body>

</html>
