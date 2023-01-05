<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <!-- Styles -->
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
</head>
<body>
    <div>
        <button id="dark-mode-button" >Activar modo oscuro</button>
        <button id="nino-mode-button" >Activar modo niño</button>
        <button id="adulto-mode-button" >Activar modo adulto</button>
        @yield('contenido')
    </div>
      
      <footer class="text-center">
        <ul class="footer-links">
          <li>
            <a >About</a>
          </li>
          <li>
            <a >Privacy Policy</a>
          </li>
          <li>
            <a >Disclaimer</a>
          </li>
       </ul>
      </footer>

        
      <script>
        document.getElementById('dark-mode-button').addEventListener('click', toggleDarkMode);
        function toggleDarkMode() {
        
        document.body.classList.toggle('dark-mode');
        }
        document.getElementById('nino-mode-button').addEventListener('click', toggleNinoMode);
        function toggleNinoMode() {
        
        document.body.classList.toggle('nino-mode');
        }

        document.getElementById('adulto-mode-button').addEventListener('click', toggleAdultoMode);
        function toggleAdultoMode() {
        
        document.body.classList.toggle('adulto-mode');
        }
        
      </script>
    </body>
    
</html>
    