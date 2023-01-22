<body class = "font-sans">
    <div class = "w-screen h-screen bg-none flex justify-evenly ">
        <div class = "w-1/3 hidden h-auto max-lg:hidden max-md:hidden max-sm:hidden">1
        </div>
        <div class = "w-1/3 h-screen  bg-white shadow-2xl max-md:w-full max-lg:w-full ">
            <nav class = "w-auto h-[100px] bg-slate-800 flex items-center justify-center">
                <h1 class = "text-center text-white">Input Sampah</h1>
            </nav>
            <!-- Center : flex items-center justify-center-->
            <div class = "bg-white mx-5 h-fit rounded-md">
                <a href="<?= BASEURL;?>/Add"><button class =  " w-full text-white text-2xl  my-3 py-5 bg-blue-300 rounded-md">Tambah
                </button></a>
            </div>
            <div class = "bg-white mx-5 h-fit rounded-lg">
                <?php foreach ($data['types'] as $key):?>
                <div class = "w-full h-auto px-3 my-2 bg-slate-100 shadow-md rounded-md">
                    <h1 class = "text-justify text-2xl capitalize mb-5"><?= $key['name']; ?></h1>
                    <div class = "w-full flex pt-5 justify-evenly content-center">
                        <h5 class = "w-1/2 flex text-justify text-gray-400"><?= $key['Kategori']; ?></h5>
                        <a href = "<?= BASEURL; ?>/Home/delete/<?= $key['id']?>" class = "w-1/2 text-right text-red-500">Delete</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div> 
        </div>
        <div class = "w-1/3 hidden bg-red-200 max-lg:hidden max-md:hidden max-sm:hidden"> 3</div>
    </div>
</body>
</html>