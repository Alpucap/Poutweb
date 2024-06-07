<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sacramento&display=swap');

        .carousel {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease-in-out;
            width: 100%;
            height: 100%;
        }

        .carousel-item {
            position: relative;
            min-width: 100%;
            height: 100%;
            max-height: 500px;
            box-sizing: border-box;
        }

        .carousel-item video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            filter: opacity(50%);
        }

        .carousel-item .overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #ebeeec;
            font-size: 96px;
            font-weight: 500;
            letter-spacing: 4px;
            text-align: center;
            font-family: 'Sacramento', cursive;
        }

        .carousel-control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            color: #ebeeec;
            padding: 10px;
            cursor: pointer;
            z-index: 1;
        }

        .carousel-control.prev {
            left: 10px;
        }

        .carousel-control.next {
            right: 10px;
        }

        @media screen and (max-width: 768px) {
            .carousel-item .overlay {
                font-size: 48px;
                font-weight: 300;
                letter-spacing: 2px;
                text-align: center;
                font-family: 'Sacramento', cursive;
            }
        }
        
    </style>
</head>
<body>
    <div class="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <video src="\video\PJ.mp4" autoplay loop muted></video>
                <div class="overlay">Persekutuan Jumat</div>
            </div>
            <div class="carousel-item">
                <video src="\video\PD.mp4" autoplay loop muted></video>
                <div class="overlay">Persekutuan Doa</div>
            </div>
            <div class="carousel-item">
                <video src="\video\RKK.mp4" autoplay loop muted></video>
                <div class="overlay">Ret-Ret Kelompok Kecil</div>
            </div>
            <div class="carousel-item">
                <video src="\video\Christmas.mp4" autoplay loop muted></video>
                <div class="overlay">Christmas</div>
            </div>
            <div class="carousel-item">
                <video src="\video\Easter.mp4" autoplay loop muted></video>
                <div class="overlay">Easter</div>
            </div>
            
        </div>
        <button class="carousel-control prev" onclick="prevSlide()">&#10094;</button>
        <button class="carousel-control next" onclick="nextSlide()">&#10095;</button>
    </div>
    <script>
        let currentIndex = 0;

        function showSlide(index) {
            const slides = document.querySelectorAll('.carousel-item');
            const totalSlides = slides.length;
            
            if (index >= totalSlides) {
                currentIndex = 0;
            } else if (index < 0) {
                currentIndex = totalSlides - 1;
            } else {
                currentIndex = index;
            }
            
            const newTransform = -currentIndex * 100 + '%';
            document.querySelector('.carousel-inner').style.transform = `translateX(${newTransform})`;
        }

        function nextSlide() {
            showSlide(currentIndex + 1);
        }

        function prevSlide() {
            showSlide(currentIndex - 1);
        }

        // Auto slide
        setInterval(() => {
            nextSlide();
        }, 10000); // Change video every 10 seconds
    </script>
</body>
