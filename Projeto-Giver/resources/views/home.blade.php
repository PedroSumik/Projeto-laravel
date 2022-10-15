<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Importar arquivo</title>
</head>

<style>
    html,
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    form {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-evenly;
    }

    .all {
        width: 50%;
        height: 90%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border-radius: 15px;
        border: solid 1px #ccc;
    }

    .content-form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 20%;
    }

    #content-list {
        width: 100%;
        height: 80%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #arquivo-btn {
        background-color: #ccc;
    }

    .lista {
        width: 80%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
    }
</style>

<body>
    <div class="all">
        <div class="mb-3 content-form ">
            <form method="post" action="/" enctype='multipart/form-data'>
                @csrf
                <label for="caminho" class="form-label">Importe o seu arquivo: </label>
                <input class="form-control" type="file" id="caminho" name="caminho">
                <button type="submit" class="btn btn-primary mb-3">Enviar Arquivo</button>
            </form>
        </div>
        <div id="content-list">
            <table class="table table-hover lista">
                <tr>
                    <th>Id</th>
                    <th>Nome Arquivo</th>
                    <th>Ir</th>
                </tr>
                @foreach($arquivos as $arq)
                <tr>
                    <td>{{$arq->id}}</td>
                    <td>{{$arq->caminho}}</td>
                    <td>
                        <a href="/arquivo/{{$arq->id}}"> Ir</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>