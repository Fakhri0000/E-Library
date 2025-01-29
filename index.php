
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Landing Page</title>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link rel="stylesheet" type="text/css" href="./style.css">
        <style>
            
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

*{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  box-sizing: border-box;
  scroll-behavior: smooth;
}



.row {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  width: 100%;
}


/*navbar*/

.navbar{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: auto;
    padding: 2rem;
    display: flex;
    flex-direction: row;
    align-items: center;
    background-color: #122D4F;
    justify-content: space-between;
    box-shadow: 2px 2px 8px gray;
    z-index: 99999;
}

.navbar__1{
    width: auto;
    height: auto;    
    text-align: center;
    font-weight: 600;
}

.navbar__1 a{
    color: white;
    display: block;
    position: relative;
    text-decoration: none;
    padding-left: 4.5rem;
    font-size: 1.5rem;
    font-weight: 500;
}   

.nav__logo {
    position: absolute;
    left: 0;
    bottom: -19px;
    width: 4rem;
    height: auto;
}

.navbar__link{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    text-align: center;
    align-items: center;
    width: 22rem;
}

.navbar__link li{
    list-style-type: none;
}

.navbar__link li a {
    color: white;
    display: block;
    position: relative;
    padding-left: 30px;
    text-decoration: none;
    font-size: 1.1rem;
}

.navbar__link li a::after{
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 100%;
    height: 0.1em;
    background-color: white;
    opacity: 0;
    transition: opacity 300ms, transform 300ms;
}
.navbar__link li a::after {
    opacity: 1;
    transform: scale(0);
    transform-origin: center;
}

.navbar__link li a:hover::after,
.navbar__link li a:focus::after {
    transform: scale(1);
}

.navlink__icon{
    position: absolute;
    bottom: -3px;
    left: 0px;
    font-size: 1.8rem;
    height: auto;
    color: yellow;
}

/*home*/
.section {
    margin: 10rem 0;
}

.p__content {
    opacity: 0.5;
    text-align: right;
    font-size: 1rem;
    line-height: 1.9em;
    letter-spacing: 0.03em;
    font-weight: 400;
}

.button__home {
    color: white;
    text-decoration: none;
    background-color: black;
    padding: 1.1em 1.7em;
    border-radius: 30px;
}

.row {
    padding: 0px 10px;
    margin: 40px 0;
}

.row__1{
    align-items: center;
    justify-content: space-between;
    padding: 0 1.5rem;

}

.box__1{
    padding: 10px;
    max-width: 50%;
    margin-right: 20px;
    text-align: right;
    height: auto;
}

.box__1 a {
    position: relative;
    bottom: -30px;
}

.box__2{
    margin: auto;
}

.row__2 {
    background-color: #383838;
    align-items: center;
}

.box__3{
    text-align: center;
    padding: 6rem 0;
    color: white;
    width: 50%;
    margin: auto;
    font-weight: 400;
}

.box__3 h1 {
    margin-bottom: 1.6em;
}

.box__3 p {
    font-weight:400;
    margin: auto auto 3em auto;
    max-width: 600px;
    opacity: 1;
    color: white;
    text-align: center;
}

.box__4 img{
    border-radius: 20px;
    margin-right: 150px ;
}

/*about*/

.about__title {
  text-align: center;
  position: relative;
  bottom: 50px;
}

.row{
  align-items: center;
  justify-content: space-between;
}

.about__row {
  padding: 0 80px;
}
.card__box {
  text-align: left;
  max-width: 500px;
  box-shadow: 2px 8px 8px 2px rgba(0,0,0,0.2);;
  padding: 1.2em 2em;
  height: auto;

}

.card__box p {
  text-align: left;
}

.icon__about {
  font-size: 5rem;
  height: auto;
}

/*footer*/
.footer {
  background-color: black;
  padding: 2rem 0;
  color: white;
  margin-bottom: 0;
  width: 100%;
  text-align: center;
}

.row {
  align-items: center;
}

.footer__1 {
  margin: auto auto 30px auto;
  max-width: 500px;
}

.footer__2 p{

  color: white;
}

a {
  text-decoration: none;
  color: white;
}

.footer__1  ul{
  display: flex;
  align-items: center;
  justify-content: center;
}

.footer__1  li {
  list-style-type: none;
  margin: 10px;
}

.footer__1  ul li:first-child{
  justify-self: center;
}

.footer__icon {
  font-size: 2rem;
  position: relative;
  bottom: -6px;
  margin-right: 15px;
}

        </style>
    </head>
    <body>
        <nav class="navbar">
            <div class="navbar__inner navbar__1">
                <a href="/"
                    ><img src="assets/img/logo.png" alt="logo" class="nav__logo" />
                    E-Library</a
                >
            </div>

            <div class="navbar__inner navbar__2">
                <ul class="navbar__link">
                    <li>
                        <a href="#home"
                            ><i class="uil uil-estate navlink__icon"></i> Home</a
                        >
                    </li>
                    <li>
                        <a href="#about"
                            ><i class="uil uil-question-circle navlink__icon"></i>
                            About</a
                        >
                    </li>
                    <li>
                        <a href="login.php"
                            ><i class="uil uil-users-alt navlink__icon"></i> Login</a
                        >
                    </li>
                </ul>
            </div>
        </nav>

         <section class="section" id="home">
                <div class="row row__1">
                    <div class="box__1">
                        <h1 class="section_tile">
                            Cara Baru Untuk Meminjam Buku
                        </h1>
                        <p class="p__content">
                            Ayo meminjam buku di E-Library. Jaman
                            sekarang masih pinjam buku tatap muka? mulai dari
                            sekarang pinjam buku lewat online aja
                        </p>
                        <a href="register.php" class="button__home">
                            Buat Akun
                        </a>
                    </div>
                    <div class="box__2">
                        <img src="assets/img/index2.png" alt="Book.png" />
                    </div>
                </div>
            </section>


            <section class="section about" id="about">
                <h1 class="about__title">Lebih banyak Tentang Membaca</h1>
                <div class="row about__row">
                    <div class="card__box box__1">
                        <i class="uil uil-graduation-cap icon__about"></i>
                        <p class="p__content">
                        Membaca buku merupakan aktivitas yang menyenangkan
                        jadikan membaca buku sebagai jembatan ilmu.
                        Sumber ilmu yang amat kaya tersedia di lembaran kertas
                        membaca tidak hanya di sekolah tetapi di setiap kehidupanmu
                        juga membaca
                        </p>
                    </div>
                    <div class="card__box box__2">
                        <i class="uil uil-signal-alt-3 icon__about"></i>
                        <p class="p__content">
                            60 juta penduduk Indonesia memiliki gadget, 
                            atau urutan kelima dunia terbanyak kepemilikan 
                            gadget. Lembaga riset digital marketing Emarketer
                            memperkirakan pada 2018 jumlah pengguna aktif 
                            smartphone di Indonesia lebih dari 100 juta orang.
                        </p>
                    </div>

                </div>
            </section>


            <footer class="section footer">
                    <div class="footer__1">
                            <span>Media links:</span>
                        <ul>
                            <li>
                            <a href="www.instagram.com" target="_blank"><i class="uil uil-instagram footer__icon"></i> Instagram</a>
                            </li>
                            <li>
                            <a href="www.facebook.com" target="_blank"><i class="uil uil-facebook-f footer__icon"></i> Facebook</a>
                            </li>
                            <li>
                            <a  rel="noreferrer"><i class="uil uil-phone-alt footer__icon"></i> Phone</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__2">
                        <p>E-Library adalah website peminjaman buku gratis. Baca Sekarang!</p>
                    </div>
            </footer>
    </body>
</html>
