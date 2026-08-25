<?php session_start(); ?>
<?php include './res/db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="shortcut icon" href="./res/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta name="format-detection" content="telephone=no">
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
    <script src="./res/main.js?v=2.3"></script>
    <script src="./res/tailwind.js?v=2.3"></script>
    <link href="./res/styles.css?v=2.3" type="text/css" rel="stylesheet">
    <title></title>
    <noscript></noscript>
</head>
<body class="bg-[url('./res/img/bg.webp')] bg-cover md:bg-center bg-no-repeat flex flex-col min-h-full overflow-x-hidden justify-items-start">

  
  <?php include './res/header.php'; ?>
  <?php include './res/auth.php'; ?>
  
  <main class="mt-20 max-w-7xl px-15 pt-20 md:pt-32 pb-16 relative z-10">
    <div class="max-w-2xl">
      
      
      <h1 class="text-4xl md:text-6xl font-light tracking-tight [text-shadow:2px_2px_10px_rgba(0,0,0,1)] text-white mb-2">
        Landing Page
      </h1>
      <p class="text-xl md:text-2xl text-gray-200 font-medium [text-shadow:2px_2px_10px_rgba(0,0,0,1)] tracking-wide mb-6">
        lorem ipsum aemet
      </p>

      
      <p class="text-white text-sm md:text-base [text-shadow:2px_2px_10px_rgba(0,0,0,1)] leading-relaxed max-w-lg mb-10">
        Integer at pharetra elit, eu porttitor turpis. Sed tincidunt, diam vel tempus egestas, metus nunc consectetur leo, vel fermentum risus nisl ut libero. Phasellus vel lectus metus. Praesent vitae eros id nulla lacinia ullamcorper. Maecenas maximus sit amet mi vel euismod.
      </p>

      
      <a id="open_auth_main_last" href="#" class="inline-block bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium text-sm tracking-wider uppercase px-8 py-4 rounded-md shadow-lg shadow-blue-500/20 hover:shadow-indigo-500/40 hover:scale-[1.02] transition-all duration-300">
        What's more
      </a>

    </div>


    


<div id="cards_grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:mb-40 my-16 max-w-7xl mx-auto px-1">


<?php 
    
    global $pdo;

    $sql = "SELECT name, description, status, param_name, param_value, param_unit, dynamics FROM devices";
    $stmt = $pdo->query($sql);
    
    $color_main = 'emerald';
    $mark_dynamics = '▲';


    while ($row = $stmt->fetch())
    {
      switch (strtolower($row['status']))
      {
        case 'active':
          $color_main = 'emerald';
          $mark_dynamics = '▲';
          break;
        case 'warning':
          $color_main = 'rose';
          $mark_dynamics = '▼';
          break;
        case 'testing':
          $color_main = 'blue';
          $mark_dynamics = '▲▼';
          break;
      }

      ?>
      
      
      <div class="relative bg-white/[0.02] backdrop-blur-md border border-white/10 rounded-2xl p-6 hover:border-purple-500/40 hover:bg-white/[0.04] hover:scale-[1.02] hover:shadow-xl hover:shadow-purple-500/5 transition-all duration-300 group">
    
    <div class="flex items-center justify-between mb-6">
      <div class="p-2.5 bg-purple-500/10 rounded-xl text-purple-400 border border-purple-500/20 group-hover:bg-purple-500/20 transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
        </svg>
      </div>
      
      
      <span class="bg-<?php echo $color_main; ?>-500/10 text-<?php echo $color_main; ?>-400 text-[10px] font-bold uppercase tracking-widest px-2.5 py-1 rounded-md border border-<?php echo $color_main; ?>-500/20 shadow-sm shadow-<?php echo $color_main; ?>-500/5">
        <?php echo htmlspecialchars($row['status']); ?>
      </span>
    </div>

    <h3 class="text-white font-medium text-base tracking-wide mb-1 group-hover:text-purple-400 transition-colors">
      <?php echo htmlspecialchars($row['name']); ?>
    </h3>
    
    <p class="text-gray-400 text-xs font-light leading-relaxed mb-4">
      <?php echo htmlspecialchars($row['description']); ?>
    </p>

    <div class="w-full h-[1px] bg-white/5 my-4"></div>

    <div class="flex items-end justify-between mt-2">
      <div>
        <span class="block text-[10px] uppercase tracking-wider text-white font-medium mb-1"><?php echo htmlspecialchars($row['param_name']); ?></span>
        <span class="text-3xl font-bold tracking-tight text-white font-mono [text-shadow:0_0_15px_rgba(147,51,234,0.3)]">
          <?php echo htmlspecialchars($row['param_value']); ?> <span class="text-xs font-light text-gray-400"><?php echo htmlspecialchars($row['param_unit']); ?></span>
        </span>
      </div>
      
      
      <div class="text-<?php echo $color_main; ?>-400 text-xs font-medium bg-<?php echo $color_main; ?>-500/5 px-2 py-1 rounded flex items-center space-x-1">
        <span><?php echo $mark_dynamics; ?></span> <span><?php echo htmlspecialchars($row['dynamics']); ?></span>
      </div>
    </div>

  </div>
      
      
      <?php

    }
    
    
    
    
?>
  
  

</div>



<div class="mt-12 bg-white/[0.02] border border-white/10 rounded-2xl p-6 backdrop-blur-md">
    <h2 class="text-white font-medium text-lg mb-4 tracking-wide">Журнал безопасности</h2>
    
    <div class="space-y-2 font-mono text-xs text-gray-400">
        <?php
        global $pdo;

        
        $sql = "SELECT logs.action, logs.created_at, users.name 
                FROM logs 
                LEFT JOIN users ON logs.user_id = users.id 
                ORDER BY logs.created_at DESC LIMIT 10"; 
                
        $stmt = $pdo->query($sql);

        while ($row = $stmt->fetch()) {
            ?>
            <div class="flex justify-between border-b border-white/5 py-2">
                <div>
                    
                    <span class="text-purple-400 font-medium">[<?php echo htmlspecialchars($row['name'] ?? 'Система'); ?>]</span>
                    <span class="text-white"><?php echo htmlspecialchars($row['action']); ?></span>
                </div>
                
                <span class="text-gray-500"><?php echo $row['created_at']; ?></span>
            </div>
            <?php
        }
        ?>
    </div>
</div>





<?php

if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') : 
?>

<div class="mt-12 bg-white/[0.02] border border-white/10 rounded-2xl p-6 backdrop-blur-md">
    <h2 class="text-white font-medium text-lg mb-4 tracking-wide">Панель администратора: Добавить </h2>
    
    
    <form method="POST" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <input type="text" name="dev_name" placeholder="Название" required class="bg-white/5 border border-white/10 rounded-xl p-3 text-white text-xs focus:outline-none focus:border-purple-500">
            <input type="text" name="dev_param_name" placeholder="Имя параметра (напр. Подача)" required class="bg-white/5 border border-white/10 rounded-xl p-3 text-white text-xs focus:outline-none focus:border-purple-500">
            <input type="text" name="dev_param_value" placeholder="Значение (напр. 1200)" required class="bg-white/5 border border-white/10 rounded-xl p-3 text-white text-xs focus:outline-none focus:border-purple-500">
            <input type="text" name="dev_param_unit" placeholder="Единицы измерения" required class="bg-white/5 border border-white/10 rounded-xl p-3 text-white text-xs focus:outline-none focus:border-purple-500">
        </div>
        <textarea name="dev_desc" placeholder="Описание работы" required class="w-full bg-white/5 border border-white/10 rounded-xl p-3 text-white text-xs h-20 focus:outline-none focus:border-purple-500"></textarea>
        
        <button type="submit" name="add_device" class="bg-purple-600 hover:bg-purple-700 text-white font-medium text-xs px-6 py-3 rounded-xl transition-colors">
            Внести в базу данных
        </button>
    </form>
</div>

<?php 

if (isset($_POST['add_device'])) {
    global $pdo;

    
    $d_name = htmlspecialchars(trim($_POST['dev_name']));
    $d_desc = htmlspecialchars(trim($_POST['dev_desc']));
    $d_p_name = htmlspecialchars(trim($_POST['dev_param_name']));
    $d_p_value = htmlspecialchars(trim($_POST['dev_param_value']));
    $d_p_unit = htmlspecialchars(trim($_POST['dev_param_unit']));

    try {
        $ins_sql = "INSERT INTO devices (name, description, status, param_name, param_value, param_unit, dynamics) 
                    VALUES (:name, :description, 'testing', :p_name, :p_value, :p_unit, '0%')";
        
        $ins_stmt = $pdo->prepare($ins_sql);
        $ins_stmt->execute([
            'name'        => $d_name,
            'description' => $d_desc,
            'p_name'      => $d_p_name,
            'p_value'     => $d_p_value,
            'p_unit'     => $d_p_unit
        ]);

        
        echo "<script>window.location.href='./index.php';</script>";
        exit;

    } catch (\PDOException $e) {
        echo "<script>alert('Ошибка добавления: " . $e->getMessage() . "');</script>";
    }
}

endif; 
?>


  </main>

  <?php include './res/footer.php'; ?>
</body>
</html>