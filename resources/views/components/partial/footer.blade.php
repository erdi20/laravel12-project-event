<footer class="bg-gradient-to-b from-teal-900 to-teal-800 px-6 pb-8 pt-12 text-white">
    <div class="container mx-auto">
        <div class="mb-12 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
            <!-- Brand & Description -->
            <div class="lg:col-span-1">
                <div class="mb-6 flex items-center">
                    <span class="bg-gradient-to-r from-amber-300 to-amber-200 bg-clip-text text-3xl font-bold tracking-tighter text-transparent">EventKu</span>
                </div>
                <p class="mb-6 leading-relaxed text-teal-200">
                    Platform terpercaya untuk menemukan dan mengelola event terbaik. Temukan pengalaman tak terlupakan dengan berbagai acara pilihan.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="flex h-10 w-10 items-center justify-center rounded-full bg-teal-700 transition-all duration-300 hover:bg-teal-600">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="flex h-10 w-10 items-center justify-center rounded-full bg-teal-700 transition-all duration-300 hover:bg-teal-600">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="flex h-10 w-10 items-center justify-center rounded-full bg-teal-700 transition-all duration-300 hover:bg-teal-600">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="flex h-10 w-10 items-center justify-center rounded-full bg-teal-700 transition-all duration-300 hover:bg-teal-600">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="lg:col-span-1">
                <h3 class="relative mb-6 inline-block text-lg font-semibold">
                    Tautan Cepat
                    <span class="absolute bottom-0 left-0 h-0.5 w-12 bg-amber-400"></span>
                </h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ url('/events') }}" class="flex items-center text-teal-200 transition-colors duration-300 hover:text-amber-300">
                            <i class="fas fa-chevron-right mr-2 text-xs text-amber-400"></i>
                            Jelajahi Acara
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/my-registrations') }}" class="flex items-center text-teal-200 transition-colors duration-300 hover:text-amber-300">
                            <i class="fas fa-chevron-right mr-2 text-xs text-amber-400"></i>
                            Riwayat Pendaftaran
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-teal-200 transition-colors duration-300 hover:text-amber-300">
                            <i class="fas fa-chevron-right mr-2 text-xs text-amber-400"></i>
                            Event Terpopuler
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-teal-200 transition-colors duration-300 hover:text-amber-300">
                            <i class="fas fa-chevron-right mr-2 text-xs text-amber-400"></i>
                            Event Mendatang
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-teal-200 transition-colors duration-300 hover:text-amber-300">
                            <i class="fas fa-chevron-right mr-2 text-xs text-amber-400"></i>
                            Jadi Penyelenggara
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="lg:col-span-1">
                <h3 class="relative mb-6 inline-block text-lg font-semibold">
                    Hubungi Kami
                    <span class="absolute bottom-0 left-0 h-0.5 w-12 bg-amber-400"></span>
                </h3>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <div class="mr-3 flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-teal-700">
                            <i class="fas fa-map-marker-alt text-sm text-amber-400"></i>
                        </div>
                        <span class="text-teal-200">Jl. Event No. 123, Jakarta Selatan, Indonesia</span>
                    </li>
                    <li class="flex items-start">
                        <div class="mr-3 flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-teal-700">
                            <i class="fas fa-phone text-sm text-amber-400"></i>
                        </div>
                        <span class="text-teal-200">+62 21 1234 5678</span>
                    </li>
                    <li class="flex items-start">
                        <div class="mr-3 flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-teal-700">
                            <i class="fas fa-envelope text-sm text-amber-400"></i>
                        </div>
                        <span class="text-teal-200">info@eventku.com</span>
                    </li>
                    <li class="flex items-start">
                        <div class="mr-3 flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-teal-700">
                            <i class="fas fa-clock text-sm text-amber-400"></i>
                        </div>
                        <span class="text-teal-200">Senin - Jumat: 09:00 - 18:00</span>
                    </li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="lg:col-span-1">
                <h3 class="relative mb-6 inline-block text-lg font-semibold">
                    Berlangganan
                    <span class="absolute bottom-0 left-0 h-0.5 w-12 bg-amber-400"></span>
                </h3>
                <p class="mb-4 text-teal-200">
                    Dapatkan informasi event terbaru dan penawaran spesial langsung di inbox Anda.
                </p>
                <form class="space-y-3">
                    <div>
                        <input type="email" placeholder="Alamat email Anda" class="w-full rounded-lg border border-teal-700 bg-teal-800 px-4 py-3 text-white placeholder-teal-400 transition-colors duration-300 focus:border-amber-400 focus:outline-none">
                    </div>
                    <button type="submit" class="w-full rounded-lg bg-gradient-to-r from-amber-500 to-amber-600 px-4 py-3 font-semibold text-white shadow-md transition-all duration-300 hover:from-amber-600 hover:to-amber-700 hover:shadow-lg">
                        Berlangganan
                    </button>
                </form>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-teal-700 pt-8">
            <div class="flex flex-col items-center justify-between md:flex-row">
                <p class="mb-4 text-sm text-teal-300 md:mb-0">
                    &copy; 2023 EventKu. All rights reserved.
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-sm text-teal-300 transition-colors duration-300 hover:text-amber-300">Syarat & Ketentuan</a>
                    <a href="#" class="text-sm text-teal-300 transition-colors duration-300 hover:text-amber-300">Kebijakan Privasi</a>
                    <a href="#" class="text-sm text-teal-300 transition-colors duration-300 hover:text-amber-300">FAQ</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button id="backToTop" class="invisible fixed bottom-6 right-6 rounded-full bg-amber-500 p-3 text-white opacity-0 shadow-lg transition-all duration-300 hover:bg-amber-600">
    <i class="fas fa-arrow-up"></i>
</button>

<script>
    // Back to top button functionality
    const backToTopButton = document.getElementById('backToTop');

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopButton.classList.remove('opacity-0', 'invisible');
            backToTopButton.classList.add('opacity-100', 'visible');
        } else {
            backToTopButton.classList.remove('opacity-100', 'visible');
            backToTopButton.classList.add('opacity-0', 'invisible');
        }
    });

    backToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
