<!DOCTYPE html>
<html lang="en" dir ="ltr">
    <head>
        <meta charset="utf-8">
        <title>reCAPTCHA V2</title>
        <link rel="stylesheet" href="style.css">
        <link rel='shortcut icon' type='image/x-icon' href='favicon.ico'/>
    </head>
    <body>
        <h1>Formulário reCAPTCHA V2</h1>
        <hr>
        <form method="post">
            <div>
                <label for="name">Nome:</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label>E-mail</label>
                <input type="email" name="email" required>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </body>