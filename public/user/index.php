<?php
require __DIR__.'/../../autoloader.php';
use app\security\authentication;
authentication::check();
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Dashboard</title>
    <link rel="icon" type="image" href="../image/logo.png">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


</head>

<body class="bg-slate-100 dark:bg-gray-200">
<header class="bg-white dark:bg-gray-800 shadow-md p-3">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center gap-3">
            <img src="../image/logo.png" alt="Logo" class="h-7 w-7">
        </div>
        <div>
            <a href="logout.php" class="bg-red-800 text-white px-4 py-2 rounded hover:bg-red-900 transition">Logout</a>
        </div>
    </div>

</header>   
   <div class="container mx-auto p-1 mt-2">
    <menu class="flex flex-wrap gap-1">
        <button id="tab-link" class="tab-link rounded px-2 border-red-800 text-red-900 border-2 font-semibold" page="biodata">Biodata</button>
        <button id="tab-link" class="tab-link rounded px-2 text-gray-600 border-2 font-semibold" page="keluarga">Keluarga</button>
        <button id="tab-link" class="tab-link rounded px-2 text-gray-600 border-2 font-semibold" page="pendidikan">Pendidikan</button>
    </menu>
        <div class="tab-content p-3 border-t-2 border-red-800 mt-3 bg-white" id="tab-content">
            <!-- isi konten -->
        </div>
</body>
<script src="/public/javascript/user2.js"></script>
</html>