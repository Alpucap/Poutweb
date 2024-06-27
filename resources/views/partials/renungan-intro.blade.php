<img src="{{ asset('img\Banner-Renungan.png') }}" alt="Banner Renungan">
<div class="renungan-container">
    <div class="renungan-marquee">Renungan Harian</div>
</div>

<style>
.renungan-container{
    background-color: #4682b4;
    color: #ebeeec;
    font-size: 20px;
    font-weight: bold;
    padding: 10px 0;
    overflow: hidden;
    white-space: nowrap;
}
  
.renungan-marquee {
    display: inline-block;
    padding-left: 100%;
    animation: renungan-marquee 3s linear infinite;
}
  
@keyframes renungan-marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-100%); }
}
</style>