<?php
    if($_POST){
        /*echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        exit;*/
        $curl = curl_init();// Inicializar cURL
        curl_setopt_array($curl,[
            CURLOPT_URL => "https://www.google.com/recaptcha/api/siteverify",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => [
                'secret' => '6Lc51PkdAAAAAGUQjXMVFfNfPiYgX-5nBGuUrGtb',
                'response' => $_POST['g-recaptcha-response'] ?? ''
            ]
        ]);// Configurar cURL
        $response = curl_exec($curl);// Executa cURL
        curl_close($curl);// Fechar cURL
        /*echo "<pre>";
        print_r(json_decode($response));
        echo "</pre>";*/
        $responseArray = json_decode($response,true);// Decodificar JSON
        $sucesso = $responseArray['success'] ?? false;// Verificar se o reCAPTCHA foi validado
        /*echo "<pre>";
        var_dump($sucesso);
        echo "</pre>";*/
        echo $sucesso ? "Usuário cadastrado com sucesso!" : "Erro ao cadastrar usuário!";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en" dir ="ltr">
    <head>
        <meta charset="utf-8">
        <title>reCAPTCHA V2</title>
        <link rel="stylesheet" href="style.css">
        <link rel='shortcut icon' type='image/x-icon' href='favicon.ico'/>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            function validarPost(){
                //console.log(grecaptcha.getResponse());
                if(grecaptcha.getResponse() != "") return true;
                alert("Por favor, confirme que não é um robô!");
                return false;
            }
        </script>
    </head>
    <body>
        <h1>Formulário reCAPTCHA V2</h1>
        <hr>
        <form method="post" onsubmit="return validarPost()">
            <div>
                <label for="name">Nome:</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label>E-mail</label>
                <input type="email" name="email" required>
            </div>
            <div class="g-recaptcha" data-sitekey="6Lc51PkdAAAAAAPrk_fullFy_xiwQdQSBrLfyYKr"></div>
            <button type="submit">Enviar</button>
        </form>
    </body>