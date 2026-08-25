

<header class="w-full bg-white/[0.03] backdrop-blur-xl border-b border-white/10 fixed top-0 z-60">
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
    
        <a class="flex items-center space-x-3" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>">
            <div class="w-6 h-6 bg-gradient-to-tr from-pink-400 to-blue-500 rounded-bl-full rounded-tr-full cursor-pointer"></div>
            <span class="text-white font-semibold tracking-wider text-sm uppercase cursor-pointer">Company</span>
        </a>

        <nav id="mobile-menu" class="
           
        fixed inset-0 h-screen w-full flex flex-col justify-center items-center px-10 bg-[#000863]/95 backdrop-blur-md z-40
        transition-all duration-500 ease-in-out

        -translate-y-full opacity-0

        md:static md:h-auto md:w-auto md:backdrop-blur-none md:flex-row md:bg-transparent md:p-0 md:translate-y-0 md:opacity-100
        ">
            <a href="#home" class="hover:text-white text-gray-300 transition-colors duration-300 md:text-xs text-2xl mb-5 md:mb-0 text-center md:mr-10">Home</a>
            <a href="#about" class="hover:text-white text-gray-300 transition-colors duration-300 md:text-xs text-2xl mb-5 md:mb-0 text-center md:mr-10">About Us</a>
            <a href="#products" class="hover:text-white text-gray-300 transition-colors duration-300 md:text-xs text-2xl mb-5 md:mb-0 text-center md:mr-10">Products</a>
            <a href="#gallery" class="hover:text-white text-gray-300 transition-colors duration-300 md:text-xs text-2xl mb-5 md:mb-0 text-center md:mr-10">Gallery</a>
            <a href="#contact" class="hover:text-white text-gray-300 transition-colors duration-300 md:text-xs text-2xl mb-5 md:mb-0 text-center md:mr-10">Contact Us</a>
            <a id="open_auth" href="#" class="md:mt-0 mt-10 bg-gradient-to-r from-blue-600 to-indigo-600 text-center text-white px-5 py-3 md:py-2.5 rounded-md hover:from-blue-500 hover:to-indigo-500 transition-all duration-300 shadow-lg shadow-indigo-500/20">
                <?php 
                
                if (isset($_SESSION['name']))
                {
                    echo 'Привет, ' . $_SESSION['name'];
                }
                else
                {
                    echo 'Get Started';
                }

                ?>
            </a>
        </nav>

        <button class="md:hidden text-white focus:outline-none fixed right-7 top-7 z-51 hover:transform-[scale(1.1)] transition-transform duration-100" id="menu-btn">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>

    </div>
</header>
