<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileHelper
{
    /**
     * Guarda un archivo base64 recibido en formato JSON con validaciones.
     *
     * @param array $fileData
     * @param string $path Carpeta donde se guardará
     * @param int $maxSizeKB Tamaño máximo en KB (por defecto: 5MB)
     * @param array $allowedTypes Tipos permitidos ('jpeg', 'png', 'pdf', etc.)
     * @return string|null Ruta del archivo o null si hubo error
     */
    public static function saveBase64File(array $fileData, string $path = 'uploads', int $maxSizeKB = 5120, array $allowedTypes = ['jpeg', 'jpg', 'png', 'gif', 'webp', 'pdf']): ?array
    {
        if (!isset($fileData['data']) || !isset($fileData['name'])) {
            return null;
        }

        $data = $fileData['data'];
       /*  dd($data); */
        $originalName = $fileData['name'];

        $extension = self::mimeToExtension($fileData['type']);       
        // Validar tipo
        if (!in_array($extension, $allowedTypes)) {
            return null;
        }

        // Decodificar base64
        $decoded = base64_decode($data);
        if ($decoded === false) {
            return null;
        }

        // Validar tamaño
        $sizeKB = strlen($decoded) / 1024;
        if ($sizeKB > $maxSizeKB) {
            return null;
        }

        // Nombre único
        $filename = Str::random(10) . '.' . $extension;
        
        // Guardar en disco
        Storage::disk('public')->put("{$path}/{$filename}", $decoded);

        /* return "{$path}/{$filename}"; */
        return [
        'file_name' => $filename,
        'file_path' => "{$path}/{$filename}",
        ];
    }

    /**
     * Convierte MIME types a extensiones de archivo
     */
    private static function mimeToExtension(string $mime): ?string
    {
        $map = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            'image/webp' => 'webp',
            'application/pdf' => 'pdf',
        ];

        return $map[$mime] ?? null;
    }
}
