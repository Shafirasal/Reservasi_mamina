<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<link href="<?= base_url('css/output.css') ?>" rel="stylesheet"/>
<?= $this->include('templates/header') ?>

<!-- Hero Section -->
<section class="bg-[url('/images/bg-brick.jpg')] bg-cover bg-center py-20">
  <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-6">
    
    <!-- Left Text -->
    <div class="md:w-1/2 text-left">
      <p class="text-white-400 font-bold mb-2">MAMINA</p>
      <h1 class="text-5xl font-extrabold leading-tight mb-6">Baby Spa Dan Pijat Laktasi</h1>
      <a href="#" class="inline-block bg-red-600 hover:bg-red-500 text-white font-bold py-3 px-6 rounded">Contact</a>
    </div>

    <!-- Right Image -->
    <div class="relative md:w-1/2 mt-10 md:mt-0">
      <img src="<?= base_url('images/chicken-bucket.png') ?>" alt="Fried Chicken" class="w-full max-w-sm mx-auto">
      <div class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 bg-yellow-400 text-black font-bold rounded-full px-6 py-2 text-lg shadow-lg">
        50% OFF
      </div>
    </div>
  </div>
</section>

<!-- Swiper Section -->
<section class="bg-white py-20">
  <div class="container mx-auto px-4 shadow-lg rounded-xl">
    <!-- <h2 class="text-3xl font-bold text-center mb-10 text-black">Latest Articles</h2> -->

    <!-- Swiper Container -->
    <div class="swiper mySwiper w-full overflow-visible">
      <div class="swiper-wrapper">
        
        <!-- Slide 1 -->
        <div class="swiper-slide bg-white rounded-xl shadow-md w-80 mx-auto flex flex-col">
          <img src="<?= base_url('images/article-yoga.jpg') ?>" alt="Yoga" class="w-full h-48 object-cover rounded-t-xl">
          <div class="p-4 flex-1">
            <p class="text-gray-500 text-sm mb-1">May 2, 2018 by Letizia Biafore</p>
            <h3 class="font-bold text-lg mb-2 text-black">Yoga: Best Ways To Sneak Yoga Into Your Holiday</h3>
            <p class="text-xs uppercase text-orange-500 font-semibold">Lifestyle, Yoga, Travel</p>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide bg-white rounded-xl shadow-md w-80 mx-auto flex flex-col">
          <img src="<?= base_url('assets/logo_mamina.png') ?>" alt="Breakfast" class="w-full h-48 object-cover rounded-t-xl">
          <div class="p-4 flex-1">
            <p class="text-gray-500 text-sm mb-1">May 11, 2018 by Tullia Tornasi</p>
            <h3 class="font-bold text-lg mb-2 text-black">Recipe: 5 Best Healthy Strawberry Breakfast Recipes</h3>
            <p class="text-xs uppercase text-yellow-500 font-semibold">Recipe, Breakfast, Nutrition</p>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide bg-white rounded-xl shadow-md w-80 mx-auto flex flex-col">
          <img src="<?= base_url('images/article-boat.jpg') ?>" alt="Boating" class="w-full h-48 object-cover rounded-t-xl">
          <div class="p-4 flex-1">
            <p class="text-gray-500 text-sm mb-1">May 26, 2018 by Delinda Carmarata</p>
            <h3 class="font-bold text-lg mb-2 text-black">Vacation: Boating around the Cinque Terre in Italy</h3>
            <p class="text-xs uppercase text-orange-400 font-semibold">Vacation, Boating</p>
          </div>
        </div>
      </div>

      <!-- Navigation Buttons -->
      <div class="swiper-button-prev text-red-500"></div>
      <div class="swiper-button-next text-red-500"></div>
    </div>
  </div>
</section>

<?= $this->include('templates/footer') ?>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper('.mySwiper', {
    slidesPerView: 1,
    spaceBetween: 20,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    breakpoints: {
      768: { slidesPerView: 2 },
      1024: { slidesPerView: 3 }
    }
  });
</script>
