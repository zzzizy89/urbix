<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/logueo.css">
	
    <script src="https://cdnjs.cloudfare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="hero-image-wrapper wrapper">
        <div class="bg-img">
            <img src="img/productos/w.png"  alt="">
        </div>
        <div class="front-img">
            <img src="img/productos/ww.png"  alt="">
        </div>
    </div>
    <div class="content-wrapper wrapper">
        <nav>
            <p>Dont Forget to check out our socials! <a href="#">@comba.code</a></p>
            <button>close</button>
        </nav>
        <header>
            <div class="h2">
                <h2>Subscribe</h2>
                <div class="header-revealer"></div>
            </div>
            <div class="h1">
                <h1>to get access</h1>
                <div class="header-revealer"></div>
            </div>
            <div class="form-wrapper">
                <form action="">
                    <input type="text" placeholder="your email">
                    <button>subscribe</button>
                </form>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid sequi odit, recusandae dicta, ab odio neque harum vero cum enim excepturi? Nemo harum, quos tempore maxime fugiat sunt iure similique?</p>
            </div>
           </header>
           <footer>
            <p>Welcome to the <span>club</span></p>
           </footer>
    </div>
</div>
<script>
    gsap.from(".hero-image-wrapper, .content-wrapper, .front-img", 2, {
        delay: 1,
        clipPath: "inset(0 100% 0 0)",
        ease:"power4.inOut",
        stagger: {
            amount: 0.5,
             },

         });

         gsap.from("img", 3, {
            delay: 1.5,
            scale: 2,
            ease:"power4.inOut",
            stagger: {
                amount: 0.25,
                 },
            }):

            gsap.to("header h1, header h2", 1, {
                delay: 3,
                top: 0,
                ease: "power3.out",
                stagger: {
                    amount: 0.2,
                     },
                });

            
</script>
    
</body>


</html>