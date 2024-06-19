<style>
    .loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(17, 17, 17, 0.879);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .loader span {
        font-size: 24px;
        margin: 0 5px;
        opacity: 0;
        animation: fadeInOut 2s infinite;
    }

    .loader span:nth-child(1) { animation-delay: 0s; }
    .loader span:nth-child(2) { animation-delay: 0.5s; }
    .loader span:nth-child(3) { animation-delay: 1s; }
    .loader span:nth-child(4) { animation-delay: 1.5s; }

    @keyframes fadeInOut {
        0%, 100% { opacity: 0; }
        50% { opacity: 1; }
    }
</style>

<div id="loader" class="loader">
    <span>P</span>
    <span>O</span>
    <span>U</span>
    <span>T</span>
</div>

<script>
    function hideLoader() {
        document.getElementById('loader').style.display = 'none';
    }

    window.addEventListener('load', function() {
        hideLoader(); 
    });
</script>
