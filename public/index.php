<?php
require __DIR__.'/../autoloader.php';
use app\security\authentication;
$crsf = authentication::__csrfToken();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="icon" type="image/png" href="/image/logo.png">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <div class=" text-red-900 font-bold p-3">
            <?php
            if (isset($_GET['id'])) {
                echo "<script>alert('Siswa bernama " . htmlspecialchars($_GET['id']) . " sudah terdaftar');</script>";
            } elseif (isset($_GET['attention']) && $_GET['attention'] == "belum_login") {
                echo "<script>alert('Anda harus login terlebih dahulu');</script>";
            }
            ?>
    </div>
    <style>
        .animate-pulse {
                animation: pulse 6s ease infinite;
                }

                @keyframes pulse {
                0% {
                    background-size: 100% 100%;
                }
                50% {
                    background-size: 200% 200%;
                }
                100% {
                    background-size: 100% 100%;
                }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-[#09122C] via-[#872341] to-[#BE3144] bg-cover h-screen animate-pulse sm:flex items-center justify-center">
    <div class="bg-white mx-auto w-screen sm:max-w-sm rounded-md p-2">
        <form action="/api/api_login.php" method="post" class="my-5">
            <div class="text-center ">
                <img src="/image/logo.png" alt="logo" class="w-20 h-20 mx-auto">
                <h1 class="text-2xl font-bold text-gray-800">LOGIN</h1>
            </div>
            <div class="mt-4 flex flex-col gap-2">
                <input type="hidden" name="csrf_token" value="<?php echo $crsf; ?>">
                <input type="text" name="nis" id="nis" placeholder="NIS" class="h-12 w-full border border-gray-300 rounded-md pl-2 text-lg font-semibold active:outline-none focus:outline-none focus:border-blue-500">
                <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" class="h-12 w-full border border-gray-300 rounded-md pl-2 text-lg font-semibold active:outline-none focus:outline-none focus:border-blue-500">
            </div>
            <div class="mt-2">
                <?php if (isset($_GET['pesan'])) : ?>
                    <p class="text-red-800 text-center font-normal">Nama tidak terdaftar</p>  
                <?php endif; ?>  
            </div>
            <div class="mt-4">
                <button type="submit" class="w-full bg-red-800 text-white rounded-md p-2 h-10 font-semibold focus:scale-90 transition">LOGIN</button>
            </div>
        </form>
    </div>
</body>
</html>