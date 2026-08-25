<div id="close_black" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-400 w-full h-screen"></div>

<div id="check_window" class="transition-all text-center text-black/30 pointer-events-none fixed p-[20px] bg-white/80 z-100 top-[30%] left-[50%] transform-[translate(-50%)] rounded-xl flex justify-center items-center opacity-0 duration-300">
    <img id="check_img" src="./res/img/checkmark.png" class="w-[30px] h-[30px]" />
    <div id="check_txt" class="hidden text-black/80 text-md font-bold">Registration success! <br />Open <span class="text-[#9810FA]">Sign In</span> tab and log in</div>
</div>

<form action="#" id="auth_form" class="transform-[translateY(-800px)] transition-all opacity-0 flex-col justify-start p-10 fixed z-500 rounded-xl border-white/10 bg-white/[0.02] md:h-[500px] md:w-[400px] w-full h-full inset-0 m-auto backdrop-blur-xl border-2 border-white shadow-2xl shadow-purple-500/20">
    <img id="close_auth" src="./res/img/close.png" class="cursor-pointer absolute right-3 top-3 w-4 h-4" />
    <div class="text-sm absolute bottom-4 left-[50%] [transform:translateX(-50%)] text-white/30 font-light w-[400px] text-center px-auto">🔒 256-bit SSL Encrypted Connection</div>


    <div class="flex bg-white/[0.04] p-1 rounded-xl mb-6 border border-white/5">
        <button type="button" id="signin" class="flex-1 py-2 text-xs font-medium transition text-white bg-purple-600 rounded-lg shadow">Sign In</button>
        <button type="button" id="reg" class="flex-1 py-2 text-xs font-medium text-gray-400 hover:text-white transition">Register</button>
    </div>

    <input type="hidden" value="login" name="mode" id="auth_mode" />

    <input type="text" name="login" id="login" class="w-full mb-4 tracking-wider focus:tracking-normal focus:border-[#9810FA] transition-all bg-white/0 border-b-2 border-white h-[40px] text-white" type="text" placeholder="Login / Email / Phone" />
    <input type="password" name="pass" id="pass" class="w-full mb-4 tracking-wider focus:tracking-normal focus:border-[#9810FA] transition-all bg-white/0 border-b-2 border-white h-[40px] text-white" type="text" placeholder="Your password" />

    <input name="name_user" id="name" class="hidden w-full mb-4 tracking-wider focus:tracking-normal focus:border-[#9810FA] transition-all bg-white/0 border-b-2 border-white h-[40px] text-white" type="text" placeholder="Your Name" />

    <div id="pass_check" class="w-full flex flex-row items-center mb-4 h-[40px] text-white">
        <input id="pass_show" type="checkbox" class="mr-4" />
        <label for="pass_show" class="cursor-pointer">Show pass</label>
    </div>

    <!-- <button id="btn_log_in" class="w-full h-[40px] rounded-md mb-4 bg-[#9810FA] cursor-pointer font-bold text-white hover:border-2 hover:border-[#9810FA] hover:bg-white hover:text-[#9810FA] transition-all">Log in</button>-->
    <button id="btn_log_in" class="w-full h-[40px] rounded-md mb-4 bg-white/90 cursor-pointer font-bold text-black hover:border-b-2 hover:border-[#9810FA] hover:text-[#9810FA]">Log in</button> 

    <div id="form_error" class="hidden flex items-center space-x-2 bg-red-500/10 border border-red-500/20 rounded-xl p-3 text-red-400 text-xs mb-4">
        <span>⚠️</span>
        <span id="error_text">Текст ошибки</span>
    </div>


</form>