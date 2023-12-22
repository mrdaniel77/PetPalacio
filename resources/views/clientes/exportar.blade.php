<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo PDF</title>
</head>
<body>
    <h1>Exemplo de PDF</h1>
    <p>Este é um exemplo de conteúdo para o PDF.</p>

    <table border="1">
        <thead>
            <tr>
                <th>Chave</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>