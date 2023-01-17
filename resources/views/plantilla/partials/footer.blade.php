<footer id="footer" class="footer">
    <div class="copyright">
        @php $pagina=new \App\Models\Pagina; $pagina=$pagina->contador(Request::path());@endphp
        <h5><b>{{ Request::path() }} {{$pagina->visitas}} vistas</b></h5>
    </div>
</footer>
