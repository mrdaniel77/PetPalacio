<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exportar PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
    <h1>Listagem do cliente</h1>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Observações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $data->nome }}</td>
                <td>{{ $data->cpf }}</td>
                <td>{{ $data->telefone }}</td>
                <td>{{ $data->email }}</td>
                <td>
                    @if (!empty($data->observacao))
                        {{$data->observacao}}
                    @else
                        Sem observação
                    @endif                    
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
