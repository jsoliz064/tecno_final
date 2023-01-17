<div class="search-bar">
    <style>
        .result {
            position: absolute;
            margin: auto;
            top: 170%;
            right: 26%;
            bottom: 0;
            left: 0;
            width: 300px;
            height: 100px;
            background: rgb(255, 255, 255);
            border: 0.1vmin rgba(0, 0, 0, 0.158) solid;
            overflow-y: scroll;
            display: none;
        }

        .result::-webkit-scrollbar {
            width: 0.2em;
            background-color: #F5F5F5;
        }
    </style>
    @php
        $pagina = new \App\Models\Pagina();
        $paginas = $pagina->all();
    @endphp
    <form class="search-form d-flex align-items-center">
        <input id="search" type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button title="Search"><i class="bi bi-search"></i></button>
    </form>
    <div class="result" id="divresult">

    </div>


    <script>
        let paginas = @json($paginas);
        let divresult = document.getElementById('divresult');

        document.getElementById("search").addEventListener("keyup", function() {
            divresult.style.display = "block";
            var value = this.value.toLowerCase();
            var rows = paginas;
            divresult.innerHTML = "";
            let b = false
            let inner = `<div class="d-flex flex-column">`
            for (var i = 0; i < rows.length; i++) {
                var path = rows[i].path;
                var name = path.toLowerCase();
                if (name.indexOf(value) !== -1 && value.length > 0 && name.indexOf("destroy") === -1 && name.indexOf("edit") === -1) {
                    inner += `<a href="{{ url('`+path+`') }}">${name}</a>`;
                    b = true
                }
            }
            inner += "</div>";
            divresult.innerHTML = inner;
            if (!b) {
                divresult.style.display = "none";
            }
        });
    </script>
</div>
