<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ECO PEDULI</title>
  @vite('resources/css/app.css')
</head>

<body>
  <div class="absolute top-0 left-0 z-40 flex items-center w-full bg-transparent ud-header"></div>
  <div class="container">
    <div class="relative flex items-center justify-between -mx-4">
      <div class="max-w-full px-4 w-60">
        <a href="index.html" class="block w-full py-5 navbar-logo">
          <img width="45%" src="assets/images/logo/logoeco.svg" alt="logo" />
        </a>
      </div>

      <div class="flex items-center justify-between w-full px-4">
        <div>
          <nav id="navbarCollapse" class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent lg:py-0 lg:px-4 lg:shadow-none xl:px-6">
            <ul class="blcok lg:flex 2xl:ml-20">
              <li class="relative group">
                <a href="#home"
                  class="flex py-2 mx-10 text-base font-medium ud-menu-scroll text-dark group-hover:text-primary lg:mr-0 lg:inline-flex lg:py-6 lg:px-0 lg:text-body-color xl:ml-10 ">
                  Home
                </a>
              </li>
              <li class="relative group">
                <a href="/#belum ada"
                  class="flex py-2 mx-8 text-base font-medium ud-menu-scroll text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-body-color xl:ml-10">
                  Jadwal
                </a>
              </li>
              <li class="relative group">
                <a href="belum ada"
                  class="flex py-2 mx-8 text-base font-medium ud-menu-scroll text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-body-color xl:ml-10">
                  Edukasi
                </a>
              </li>
              <li class="relative group">
                <a href="belum ada"
                  class="flex py-2 mx-8 text-base font-medium ud-menu-scroll text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-body-color xl:ml-10">
                  Penukaran
                </a>
              </li>
              <li class="relative group">
                <a href="/#contact"
                  class="flex py-2 mx-8 text-base font-medium ud-menu-scroll text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-body-color xl:ml-10">
                  Tentang kami
                </a>
              </li>
            </ul>
          </nav>
        </div>

        <div class="hidden sm:flex">
          <a href="signin.html" class="loginBtn py-2 px-[22px] text-base font-medium text-dark hover:opacity-70">
            Masuk
          </a>
          <a href="signup.html" class="px-6 py-2 text-base font-medium text-white duration-300 ease-in-out rounded-md signUpBtn bg-primary hover:bg-blue-dark">
            Daftar
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="relative z-10 overflow-hidden pt-[1px] pb-[60px] md:pt-[130px] lg:pt-[160px]">
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-stroke/0 via-stroke to-stroke/0"></div>
    <div class="container">
      <div class="flex flex-wrap items-center -mx-4">
        <div class="w-full px-4">
          <div class="text-center">
            <h1 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[40px] md:leading-[1.2]">
              ECO PEDULI
            </h1>
            <p class="mb-5 text-base text-body-color">
              Website Bank Sampah Universitas Udayana
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="bg-[#F4F7FF] py-14 lg:py-20">
    <div class="container">
      <div class="flex flex-wrap -mx-4">
        <div class="w-full px-4">
          <div class="wow fadeInUp relative mx-auto max-w-[525px] overflow-hidden rounded-lg bg-white py-14 px-8 text-center sm:px-12 md:px-[60px]" data-wow-delay=".15s">
            <div class="mb-10 text-center">
              <h1 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[40px] md:leading-[1.2] inline-block max-w-[160px]">
                <img width="100%" src="assets/images/logo/logoeco.svg" alt="logo" />
                LOGIN
              </h1>
            </div>
            <form>
              <div class="mb-[22px]">
                <input type="email" placeholder="Email" class="w-full px-5 py-3 text-base transition bg-transparent border rounded-md outline-none border-stroke text-body-color placeholder:text-dark-6 focus:border-primary focus-visible:shadow-none" />
              </div>
              <div class="mb-[22px]">
                <input type="password" placeholder="Password" class="w-full px-5 py-3 text-base transition bg-transparent border rounded-md outline-none border-stroke text-body-color placeholder:text-dark-6 focus:border-primary focus-visible:shadow-none" />
              </div>
              <div class="mb-9">
                <input type="submit" value="Login" class="w-full px-5 py-3 text-base text-white transition duration-300 ease-in-out border rounded-md cursor-pointer border-primary bg-primary hover:bg-blue-dark" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="wow fadeInUp relative z-10 bg-[#090E34] pt-20 lg:pt-[100px]" data-wow-delay=".15s">
    <div class="container">
      <div class="flex flex-wrap -mx-4">
        <!-- Footer content -->
      </div>
    </div>
  </footer>
</body>
</html>
