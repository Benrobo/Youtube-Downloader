<?php require_once("./inc/head.php")?>

<?php require_once("./inc/header.php")?>


    <!-- section container -->
    <section class="section">
    
        <div class="container">
            <!-- url form -->
            <form action="result" method="POST" class="d-flex">
            <div class="url-form">
                    <input type="url" name="url" placeholder="Youtube video url" class="form-control m-1 url-inp" autofocus required>
                    <button class="btn m-1 download-btn">Download</button>
                </div>
            </form>

            <!-- About YGC -->
            <div class="about-cont">
                <div class="img-cont" data-aos="zoom-in">
                    <img src="./assets/img/section/phn.png" alt="" class="img-fluid">
                </div>
                <div class="body" data-aos="fade-left">
                    <h1>About Ytgoconverter</h1>
                    <br>
                    <p>
                        YGC is a free app that lets you convert YouTube videos to MP3 or other formats using the built-in online converter. You can also download any audio track from a video in just one tap..
                    </p>
                    <p>
                        YGC helps you to download YouTube videos and save them into MP3 (64kbps, 128kbps,192kbps,320kbps), MP4, WEBM, MKV format.

                        We use advanced technologies to get rid of youtube crappy conversion restrictions(like resolution limit) and provide you high-quality files. YGC Converter Makes Life Easier thats why our tools are so popular in the world.
                    </p>
                </div>
            </div>

            <!-- How to use section -->
            <div class="howto">
                <h1 data-aos="fade-up">How To Use</h1>
                <div class="boxes">
                    <div class="box" data-aos="zoom-in">
                        <span class="icon">
                            <ion-icon name="link-outline"></ion-icon>
                        </span>
                        <br>
                        <h2>Enter video Url</h2>
                    </div>
                    <div class="box" data-aos="zoom-in-up">
                        <span class="icon">
                            <ion-icon name="logo-youtube"></ion-icon>
                        </span>
                        <br>
                        <h2>Select Format</h2>
                    </div>
                    <div class="box" data-aos="zoom-in-left">
                        <span class="icon">
                            <ion-icon name="cloud-download-outline"></ion-icon>
                        </span>
                        <br>
                        <h2>Download Movie</h2>
                    </div>
                </div>
            </div>
            <br>
            <br>
        </div>
        <footer class="footer">
            <div class="top-footer">
               <div class="privacy">
                   <a href="">Privacy Policy</a>
                   <a href="">Terms and Condition</a>
               </div>
               <br>
               <div class="social">
                   <a href="/">
                   <span class="icon"><ion-icon name="logo-facebook"></ion-icon></span></a>
                   <a href="/">
                   <span class="icon">
                       <ion-icon name="logo-twitter"></ion-icon>
                   </span></a>
               </div>
            </div>
            <div class="btm-footer">
                <p>Copyright 2021 &copy; Ytgoconverter. All right reserved</p>
            </div>
        </footer>
    </section>
    <script>
        let downloadbtn = document.querySelector(".download-btn")

        downloadbtn.onclick = (e)=>{
            let inp = document.querySelector(".url-inp");
            if(inp.value !== ""){
                downloadbtn.innerHTML = `<span class="spinner-border text-dark"></span>`
            }
        }
    </script>
    <?php if(isset($_GET['err'])){?>
        <script>
            alert("<?php echo htmlspecialchars($_GET['err']); ?>")
            window.location = "index.php"
        </script>
    <?php }?>

<?php require_once("./inc/footer.php")?>