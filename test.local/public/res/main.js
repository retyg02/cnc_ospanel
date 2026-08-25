document.addEventListener('DOMContentLoaded', () => {





const cardsGrid = document.getElementById('cards_grid');

cardsGrid.addEventListener('click', (e) => {
    const card = e.target.closest('.group');
    if (!card) return;

    const device_name = card.querySelector('h3').innerText;
    console.log('[DASHBOARD] Оператор выбрал устройство:', device_name);
});

 const error_show = (message) => {
    const error = document.getElementById('error_text');
    const error_box = document.getElementById('form_error');

    if (error && error_box)
    {
        error.innerText = message;
        error_box.classList.remove('hidden');

        setTimeout(() => {
            error_box.classList.add('hidden');
        }, 4000);
    }
 };

    const menu_btn = document.getElementById('menu-btn');
    const mobile_menu = document.getElementById('mobile-menu');

    if (menu_btn && mobile_menu) {
        menu_btn.addEventListener('click', () => {
            
            mobile_menu.classList.toggle('-translate-y-full');
            mobile_menu.classList.toggle('translate-y-0');
            
            
            mobile_menu.classList.toggle('opacity-0');
            mobile_menu.classList.toggle('opacity-100');

            if (!mobile_menu.classList.contains('-translate-y-full'))
            {
                document.body.classList.add('overflow-y-hidden');
            }
            else
            {
                document.body.classList.remove('overflow-y-hidden');
            }
        });
    }

    const signin = document.getElementById('signin');
    const reg = document.getElementById('reg');

    const name = document.getElementById('name');

    
    const btn_log_in = document.getElementById('btn_log_in');

    const val_mode = document.getElementById('auth_mode');

    if (signin && reg && name && btn_log_in) {
        signin.addEventListener('click', () => {
            name.classList.add('hidden');

            signin.classList.add('text-white');
            signin.classList.add('bg-purple-600');
            signin.classList.add('rounded-lg');
            signin.classList.add('shadow');

            signin.classList.remove('text-gray-400');
            signin.classList.remove('hover:text-white');

            reg.classList.add('text-gray-400');
            reg.classList.add('hover:text-white');

            reg.classList.remove('text-white');
            reg.classList.remove('bg-purple-600');
            reg.classList.remove('rounded-lg');
            reg.classList.remove('shadow');

            

            val_mode.attributes.value.value = 'login';
            

            btn_log_in.innerText = 'Log in';
        });
        reg.addEventListener('click', () => {
            name.classList.remove('hidden');

            reg.classList.add('text-white');
            reg.classList.add('bg-purple-600');
            reg.classList.add('rounded-lg');
            reg.classList.add('shadow');

            reg.classList.remove('text-gray-400');
            reg.classList.remove('hover:text-white');

            signin.classList.add('text-gray-400');
            signin.classList.add('hover:text-white');

            signin.classList.remove('text-white');
            signin.classList.remove('bg-purple-600');
            signin.classList.remove('rounded-lg');
            signin.classList.remove('shadow');

            
            btn_log_in.classList.remove('hidden');

            val_mode.attributes.value.value = 'reg';
            

            btn_log_in.innerText = 'Sign Up';
        });
        
    }

    const cross_close = document.getElementById('close_auth');
    const black_close = document.getElementById('close_black');

    const auth_form = document.getElementById('auth_form');

    
    const open_auth = document.getElementById('open_auth');

    if (cross_close && black_close && auth_form && open_auth)
    {

        cross_close.addEventListener('click', () => {
            auth_form.classList.toggle('transform-[translateY(-800px)]');
            auth_form.classList.toggle('transform-[translateY(0px)]');
            
            
            auth_form.classList.toggle('opacity-0');
            auth_form.classList.toggle('opacity-100');

            black_close.classList.toggle('hidden');

            if (!auth_form.classList.contains('transform-[translateY(-800px)]'))
            {
                document.body.classList.add('overflow-y-hidden');
            }
            else
            {
                document.body.classList.remove('overflow-y-hidden');
            }
        });

        black_close.addEventListener('click', () => {
            auth_form.classList.toggle('transform-[translateY(-800px)]');
            auth_form.classList.toggle('transform-[translateY(0px)]');
            
            
            auth_form.classList.toggle('opacity-0');
            auth_form.classList.toggle('opacity-100');

            black_close.classList.toggle('hidden');

            if (!auth_form.classList.contains('transform-[translateY(-800px)]'))
            {
                document.body.classList.add('overflow-y-hidden');
            }
            else
            {
                document.body.classList.remove('overflow-y-hidden');
            }
        });


        
        open_auth.addEventListener('click', () => {

            if (open_auth.innerText.includes('Привет'))
            {
                if (confirm('Are you sure?'))
                {
                    window.location.href = './res/logout.php';
                }
            }
            else
            {
                auth_form.classList.toggle('transform-[translateY(-800px)]');
                auth_form.classList.toggle('transform-[translateY(0px)]');
            
            
                auth_form.classList.toggle('opacity-0');
                auth_form.classList.toggle('opacity-100');

                black_close.classList.toggle('hidden');

                if (!auth_form.classList.contains('transform-[translateY(-800px)]'))
                {
                    document.body.classList.add('overflow-y-hidden');
                }
                else
                {
                    document.body.classList.remove('overflow-y-hidden');
                }
            }

            
        });
    }
    



    
if (auth_form)
{
    auth_form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const login = document.getElementById('login').value.trim();
        const pass = document.getElementById('pass').value;
        const mode = document.getElementById('auth_mode').value;

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


        if (!login || !pass)
        {
            error_show('Please, fill up both of the fields');
            return;
        }

        if (!emailRegex.test(login))
        {
            error_show('Please, write the correct email')
            return;
        }

        if (pass.length < 6)
        {
            error_show('Please make your password longer');
            return;
        }

        const form_data = { login, pass, mode };

        if (mode === 'reg')
        {
            const name = document.getElementById('name').value.trim();
            if (!name)
            {
                error_show('Please, write your name down');
                return;
            }
            form_data.name = name;

            localStorage.setItem('last_logged_name', name);
        }

        const json_send = JSON.stringify(form_data);
        console.log('Данные готовы', json_send);

        try {
            const response = await fetch('./res/form.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: json_send
            });

            if (!response.ok)
            {
                error_show(`Server failure ${response.status}`);
                return;
            }

            const res = await response.json();

            console.log('Ответ: ', res);


            if (res.success)
            {
                console.log('Отправлена');

                auth_form.classList.toggle('transform-[translateY(-800px)]');
                auth_form.classList.toggle('transform-[translateY(0px)]');
            
            
                auth_form.classList.toggle('opacity-0');
                auth_form.classList.toggle('opacity-100');

                black_close.classList.toggle('hidden');

                if (!auth_form.classList.contains('transform-[translateY(-800px)]'))
                {
                    document.body.classList.add('overflow-y-hidden');
                }
                else
                {
                    document.body.classList.remove('overflow-y-hidden');
                }
                localStorage.setItem('last_logged_user', login);
            

                auth_form.reset();

                if (mode === 'login')
                {
                    const header_btn = document.getElementById('open_auth');

                    if (header_btn)
                    {
                        header_btn.innerText = 'Привет, ' + res.name;
                        header_btn.classList.remove('bg_gradient_to_r');
                        header_btn.classList.add('text-purple-400', 'font-semibold');
                    }

                    const pop_up_check = document.getElementById('check_window');
                    const check_img = document.getElementById('check_img');
                    const check_txt = document.getElementById('check_txt');

                    check_txt.classList.add('hidden');
                    check_img.classList.remove('hidden');

                    pop_up_check.classList.remove('opacity-0');
                    pop_up_check.classList.add('opacity-100');

                    setTimeout(() => {
                        pop_up_check.classList.add('opacity-0');
                        pop_up_check.classList.remove('opacity-100');
                    }, 2000);
                    
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                    
                }
                else
                {
                    const pop_up_check = document.getElementById('check_window');
                    const check_img = document.getElementById('check_img');
                    const check_txt = document.getElementById('check_txt');

                    check_img.classList.add('hidden');
                    check_txt.classList.remove('hidden');

                    pop_up_check.classList.remove('opacity-0');
                    pop_up_check.classList.add('opacity-100');

                    setTimeout(() => {
                        pop_up_check.classList.add('opacity-0');
                        pop_up_check.classList.remove('opacity-100');
                    }, 2000);
                }

                document.getElementById('menu-btn').click();
                if (document.body.classList.contains('overflow-y-hidden'))
                {
                    document.getElementById('menu-btn').click();
                }
            }
            else
            {
                error_show(res.message);
            }
            

            
        } catch (error) {
    error_show('Unexpected error: ' + error.message);
}
    });
}

const savedEmail = localStorage.getItem('last_logged_user');
const savedName = localStorage.getItem('last_logged_name');

if (savedEmail)
{
    document.getElementById('login').value = savedEmail;
    console.log('Last Login: ', savedEmail);
}

if (savedName)
{
    document.getElementById('name').value = savedName;
    console.log('Last Name: ', savedName);
}


const pass_input = document.getElementById('pass');
const pass_checkbox = document.getElementById('pass_show');

pass_checkbox.addEventListener('click', (e) => {
    if (e.target.checked)
    {
        pass_input.setAttribute('type', 'text');
        pass_checkbox.checked = true;
    }
    else
    {
        pass_input.setAttribute('type', 'password');
        pass_checkbox.checked = false;
    }
});

});

