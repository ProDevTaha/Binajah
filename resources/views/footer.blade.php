<section class="container-fluid footer_section">
    <p>
        Copyright &copy; <span id="year"></span> All Rights Reserved by
        <a href="/">Binajah</a>
    </p>
    
    <script>
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
    
</section>
<!-- footer section -->
<style>
        .whatsapp-icon {
        position: fixed;
        bottom: 20px;  
        right: 20px;   
        width: 50px;  
        height: 50px; 
        cursor: pointer; 
        z-index: 9999;  
    }
</style>
<a href="">
    <img src="{{asset('images/whatsapp.svg')}}" alt="" class="whatsapp-icon">
</a>  