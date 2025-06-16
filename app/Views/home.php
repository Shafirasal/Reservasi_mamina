<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
/>
<link href="./css/output.css" rel="stylesheet"/>
<?= $this->include('templates/header') ?>

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
<section class="bg-white py-16">
  <div class="container mx-auto px-6">
    <h2 class="text-3xl font-bold text-center mb-8">Latest Articles</h2>
    
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <!-- Slide 1 -->
        <div class="swiper-slide bg-white rounded-lg shadow-md overflow-hidden">
          <img src="<?= base_url('images/article-yoga.jpg') ?>" alt="Yoga" class="w-full h-48 object-cover">
          <div class="p-4">
            <p class="text-gray-500 text-sm mb-1">May 2, 2018 by Letizia Biafore</p>
            <h3 class="font-bold text-lg mb-2">Yoga: Best Ways To Sneak Yoga Into Your Holiday</h3>
            <p class="text-xs uppercase text-orange-500 font-semibold">Lifestyle, Yoga, Travel</p>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide bg-white rounded-lg shadow-md overflow-hidden">
          <img src="<?= base_url('assets/logo_mamina.png') ?>" alt="Breakfast" class="w-full h-48 object-cover">
          <div class="p-4">
            <p class="text-gray-500 text-sm mb-1">May 11, 2018 by Tullia Tornasi</p>
            <h3 class="font-bold text-lg mb-2">Recipe: 5 Best Healthy Strawberry Breakfast Recipes</h3>
            <p class="text-xs uppercase text-yellow-500 font-semibold">Recipe, Breakfast, Nutrition</p>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide bg-white rounded-lg shadow-md overflow-hidden">
          <img src="<?= base_url('images/article-boat.jpg') ?>" alt="Boating" class="w-full h-48 object-cover">
          <div class="p-4">
            <p class="text-gray-500 text-sm mb-1">May 26, 2018 by Delinda Carmarata</p>
            <h3 class="font-bold text-lg mb-2">Vacation: Boating around the Cinque Terre in Italy</h3>
            <p class="text-xs uppercase text-orange-400 font-semibold">Vacation, Boating</p>
          </div>
        </div>
        
      </div>

      <!-- Pagination -->
        <div class="swiper-button-next text-black"></div>
        <div class="swiper-button-prev text-black"></div>    
    </div>
  </div>
</section>

<?= $this->include('templates/footer') ?>

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
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      }
    }
  });
</script>
