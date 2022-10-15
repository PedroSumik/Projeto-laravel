<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>Leitura de CSV</title>
</head>

<style>
    html,
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }

    #content {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
    }

    #controllers {
        width: 100%;
        height: 15%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #tabela {
        width: 80%;
        height: 80%;
        overflow: auto;
    }

    .input_pesquisar {
        width: 50%;
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .header {
        background-color: #212529 !important;
        color: white;
    }

    .off {
        display: none;
    }
</style>

<body>
    <div id="content">
        <div id="controllers">
            <div class="input_pesquisar">
                <label for="pesquisa">Pesquise aqui:</label>
                <input type="text" class="form-control" id="pesquisa">
                <button type="button" id="search-btn" class="btn btn-primary">Pesquisar</button>
            </div>
        </div>
        <div id="tabela">
            <table class="table table-hover lista">
                @foreach($rows as $row)
                <tr>
                    @if($loop->index == 0)
                    @foreach($row as $r)
                    <th class="header">{{$r}}</th>
                    @endforeach
                    @else
                    @foreach($row as $r)
                    <td class="valores">{{$r}}</td>
                    @endforeach
                    @endif
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
<script>
    let btn = document.getElementById("search-btn");

    let search = function() {
        let valor = $('#pesquisa').val();
        valor = valor.replace(/ /g, "");

        if (valor == "") {
            $('.valores').parent().show();
            return;
        }

        let all = $('.valores');

        $('.valores').parent().hide();
        $('.valores').each(function(idx, el){ 
            let text = $(this).text().replace(/ /g, "");
            if (text == valor) {
                $(this).parent().show();
            }
        })
    }

    btn.addEventListener('click', search, false)
</script>

</html>