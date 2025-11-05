<?php
class Util
{
    public static function salvarFoto()
    {
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $arquivoTmp = $_FILES['foto']['tmp_name'];

            // Converte a imagem para base64
            $dadosImagem = base64_encode(file_get_contents($arquivoTmp));
            $arquivoBase64 = 'data:' . mime_content_type($arquivoTmp) . ';base64,' . $dadosImagem;

            // Credenciais Cloudinary
            $cloudName = "duomkvort";
            $apiKey = "883194321354425";
            $apiSecret = "DE-7qX-RGNN_faRQ2v_pa9SmydI";

            $url = "https://api.cloudinary.com/v1_1/$cloudName/image/upload";
            $timestamp = time();
            $assinatura = sha1("timestamp=$timestamp$apiSecret");

            // Dados do POST
            $dados = [
                'file' => $arquivoBase64,
                'api_key' => $apiKey,
                'timestamp' => $timestamp,
                'signature' => $assinatura,
            ];

            // Envia a requisição usando stream_context_create
            $opcoes = [
                'http' => [
                    'method' => 'POST',
                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                    'content' => http_build_query($dados),
                ],
            ];

            $contexto = stream_context_create($opcoes);
            $resposta = file_get_contents($url, false, $contexto);

            $resultado = json_decode($resposta, true);

            if (isset($resultado['secure_url'])) {
                return $resultado['secure_url'];
            }
        }

        return false;
    }

    public static function salvarFotoLocalmente()
    {
        // Define o diretório onde os arquivos serão salvos
        $diretorioUpload = "uploads/";

        // Verifica se o diretório existe, senão, cria
        if (!is_dir($diretorioUpload)) {
            mkdir($diretorioUpload, 0755, true);
        }

        // Verifica se um arquivo foi enviado
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $arquivoTmp = $_FILES['foto']['tmp_name'];
            $nomeOriginal = basename($_FILES['foto']['name']);
            $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

            // Gera um nome único para o arquivo
            $nomeUnico = uniqid("img_", true) . "." . $extensao;

            // Caminho final
            $caminhoFinal = $diretorioUpload . $nomeUnico;

            // Move o arquivo
            if (move_uploaded_file($arquivoTmp, $caminhoFinal)) {
                return $nomeUnico;
            }
        }
        return false;
    }
}
?>