<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<link href="<?= base_url('css/output.css') ?>" rel="stylesheet"/>
<?= $this->include('templates/header') ?>

<!-- Hero Section -->
<section class="bg-[url('/asset/bg-brick.jpg')] bg-cover bg-center py-20">
  <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-6">
    
    <!-- Left Text -->
    <div class="md:w-1/2 text-left">
      <p class="text-white-400 font-bold mb-2"></p>
      <h1 class="text-5xl font-extrabold leading-tight mb-6">Sistem Informasi Reservasi dan Reminder</h1>
      <a href="/dashboard" class="inline-block bg-red-600 hover:bg-red-500 text-white font-bold py-3 px-6 rounded">Masuk</a>
    </div>

    <!-- Right Image -->
    <div class="relative md:w-1/2 mt-10 md:mt-0">
      <img src="<?= base_url('images/chicken-bucket.png') ?>" alt="Fried Chicken" class="w-full max-w-sm mx-auto">
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
