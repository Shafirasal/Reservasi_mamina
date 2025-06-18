<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<link href="<?= base_url('css/output.css') ?>" rel="stylesheet"/>
<?= $this->include('templates/header') ?>

<!-- Hero Section -->
<!-- <section class="bg-[url('/asset/bg-brick.jpg')] bg-cover bg-center py-20"> -->

<section class="bg-[#FEF8F8] relative overflow-hidden py-20 min-h-screen">
    <!-- Content -->
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-6 relative z-10">
        <!-- Left Text -->
        <div class="md:w-1/2 text-left">
            <h1 class="text-5xl font-extrabold leading-tight mb-5 text-[#555555]">Sistem Informasi Reservasi dan Reminder</h1>
            <p class="text-[#555555] mb-6">Mamina Baby Spa dan Pijat Laktasi merupakan penyedia layanan kebidanan komplementer yang berpusat di Kota Malang berupa layanan ibu dan bayi. Aplikasi ini dikembangkan untuk mempermudah manajemen data reservasi pelanggan, dilengkapi dengan fitur pengiriman pesan pengingat dan pengiriman link pengisian ulasan oleh pelanggan melalui Whatsapp.</p>
            <a href="/dashboard" class="inline-block bg-[#EE9591] hover:bg-[#e6847d] text-white font-bold py-3 px-6 rounded shadow-lg transition-colors duration-300">Masuk</a>
        </div>

        <!-- Right Image with Blob Background -->
        <div class="relative md:w-1/2 mt-10 md:mt-0">
            <!-- Blob positioned behind the image -->
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] pointer-events-none opacity-25 z-0">
                <svg width="400" height="400" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#EDB9B9" d="M32.4,-61.2C40.8,-51.3,45.6,-40.2,52.8,-29.8C60,-19.4,69.5,-9.7,71.2,1C72.8,11.6,66.6,23.3,59.2,33.2C51.7,43.1,43,51.2,32.9,56.9C22.9,62.6,11.4,65.8,0.9,64.3C-9.7,62.8,-19.4,56.6,-32.8,52.8C-46.3,49.1,-63.6,47.9,-71.1,39.5C-78.6,31.1,-76.4,15.6,-73.2,1.8C-70,-11.9,-65.9,-23.8,-58.6,-32.6C-51.4,-41.4,-41,-47.2,-30.7,-56C-20.4,-64.9,-10.2,-76.8,0.9,-78.4C12,-79.9,24,-71.2,32.4,-61.2Z" transform="translate(100 100)" scale(1.2)"/>
                </svg>
            </div>
            
            <!-- Image positioned above the blob -->
            <div class="relative z-10">
                <img src="<?= base_url('assets/ruangan1.png') ?>" alt="mamina" class="w-full max-w-lg mx-auto">
            </div>
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




