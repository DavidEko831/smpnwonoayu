<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Minuman Admin</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
    
    </head>
<body>
    <nav class="flex flex-col gap-y-8 bg-[#ABC270] md:gap-y-14">
        <div class="relative flex items-center justify-center">
            <a href="/homeadmin" class="pt-2 absolute left-0 ml-4">
                <svg width="59" height="71" viewBox="0 0 59 71" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[20px] mt-3 md:w-[70px] md:h-[57px]">
                    <path d="M57.2162 3.51066L58.9062 66.6637C58.9211 67.3032 58.7462 67.935 58.4001 68.4913C58.0541 69.0476 57.55 69.5072 56.9423 69.8207C56.3346 70.1342 55.6461 70.2897 54.9511 70.2704C54.256 70.2511 53.5807 70.0579 52.9978 69.7114L2.55844 39.4621C0.467161 38.2084 0.382846 35.0578 2.40399 33.6906L51.1533 0.786855C51.7156 0.406048 52.3798 0.173781 53.0739 0.115289C53.7681 0.0567973 54.4655 0.174318 55.0904 0.455082C55.7154 0.735846 56.2439 1.16912 56.6187 1.70782C56.9935 2.24652 57.2001 2.87005 57.2162 3.51066Z" fill="#FDC300"/>
                </svg>      
            </a>
            <img src="/gambar/desa semambung.png" alt="" class="w-[66px] h-[59px] pt-2 md:w-[105px] md:h-[99px]">
        </div>

        <div class="flex flex-row justify-center gap-x-10 text-white mb-2 md:text-[25px] md:gap-x-32">
            <a href="/homeadmin/makananadmin" >Makanan</a>
            <a href="/homeadmin/minumanadmin" class="underline decoration-[#FDC300] decoration-4">Minuman</a>
            
        </div>
    </nav>

    <main>
        <!--search bar-->
        
        <form class="mx-auto mt-4 w-[308px] h-[24px] md:w-[676px] md:h-[45px] md:ml-8 md:mt-8">
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 outline-none md:placeholder:text-[19px]"
                    placeholder="Cari produk disini..." name="search" value="{{ request('search') }}" />
            </div>
        </form>


    
<section class="relative">
    <div class="flex flex-col">
      <div
        class="grid grid-cols-2 gap-x-14 mx-auto md:grid-cols-3 md:gap-x-20"
      >
      
      @foreach ($produks as $produk )
        
        <!--Card-->
        <div class="flex flex-col mt-14">
          <h4 class="text-[10px] font-bold text-center md:text-[25px]">
            {{ $produk->namaToko }}
          </h4>
          <img
            src="{{ asset('storage/' . $produk->foto) }}"
            alt=""
            class="w-[100px] h-[100px] md:w-[309px] md:h-[300px]"
          />
          <p class="text-[10px] md:text-[20px]">{{ $produk->namaProduk }}</p>
          <p class="text-[13px] md:text-[25px]">{{ $produk->harga }}</p>
          <p class="text-[10px] md:text-[15px]">{{ $produk->alamat }}</p>
          <a
            href="tel:{{ $produk->telp }}"
            class="flex flex-row text-[10px] md:text-[15px]"
            >{{ $produk->telp }}<img
              src="/gambar/wa.svg"
              alt=""
              class="float-right w-[18px] h-[18px] md:w-[24px] md:h-[24px]"
          /></a>
          
        </div>

      

        @endforeach
       
      </div>
    </div>
  </section>

  <div class="mt-6 flex items-center justify-center">
    {{ $produks->links() }} <!-- Laravel pagination links -->
</div>
    </main>

    <section class="relative">
        <a href="https://wa.me/yourphonenumber" class="bg-[#25D366] p-3 rounded-full fixed bottom-4 left-4 z-30">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 md:w-[72px] md:h-[77px] text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.52 3.48C18.37 1.34 15.51.25 12.46.25c-6.02 0-10.93 4.91-10.93 10.93 0 1.92.49 3.81 1.42 5.47L1.25 22.75l6.39-1.66c1.59.87 3.39 1.32 5.3 1.32 6.02 0 10.93-4.91 10.93-10.93 0-3.05-1.09-5.91-3.35-8.17zM12.46 20.6c-1.64 0-3.24-.43-4.65-1.24l-.33-.19-3.78.98 1.01-3.7-.22-.34C3.36 15.02 2.89 13.77 2.89 12.46c0-5.27 4.3-9.56 9.56-9.56 2.56 0 4.96 1 6.77 2.82 1.81 1.81 2.82 4.22 2.82 6.77 0 5.27-4.29 9.56-9.58 9.56zm5.42-7.82c-.28-.14-1.66-.82-1.92-.92-.26-.1-.45-.14-.64.14-.19.28-.74.92-.92 1.11-.17.19-.34.22-.62.07-.28-.14-1.18-.44-2.26-1.4-.83-.74-1.39-1.66-1.56-1.94-.17-.28-.02-.42.12-.56.12-.12.28-.34.42-.51.14-.19.19-.28.28-.47.09-.19.05-.36-.02-.5-.07-.14-.62-1.48-.85-2.02-.22-.53-.44-.45-.64-.45-.16 0-.35 0-.54 0-.19 0-.5.07-.77.35-.26.28-1 1-1 2.45s1.02 2.84 1.16 3.04c.14.19 2 3.06 4.85 4.29.68.29 1.21.46 1.63.6.68.22 1.3.19 1.78.12.54-.07 1.66-.68 1.9-1.34.24-.66.24-1.24.17-1.34-.07-.1-.26-.19-.54-.33z"/>
            </svg>
        </a>
    </section>

<x-footer-admin></x-footer-admin>

</body>
</html>