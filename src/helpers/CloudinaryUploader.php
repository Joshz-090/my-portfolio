<?php
require_once __DIR__ . '/../../config/cloudinary_config.php';

class CloudinaryUploader {
    public static function upload($file) {
        $timestamp = time();
        $params = [
            'timestamp' => $timestamp,
            'upload_preset' => 'ml_default' // We might need to create an unsigned preset or use signed upload.
            // Since we have API Secret, we can do a signed upload.
        ];
        
        // Generate Signature
        // Signature = hash of sorted params + api_secret
        ksort($params);
        $string_to_sign = "";
        foreach ($params as $key => $value) {
            $string_to_sign .= "$key=$value&";
        }
        $string_to_sign = rtrim($string_to_sign, "&");
        $signature = sha1($string_to_sign . CLOUDINARY_API_SECRET);
        
        $params['api_key'] = CLOUDINARY_API_KEY;
        $params['signature'] = $signature;
        $params['file'] = new CURLFile($file['tmp_name']);
        
        $ch = curl_init(CLOUDINARY_UPLOAD_URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($http_code === 200) {
            $data = json_decode($response, true);
            return $data['secure_url'];
        } else {
            // Log error or return null
            error_log("Cloudinary Upload Error: " . $response);
            return null;
        }
    }
    
    public static function uploadFromUrl($url) {
        $timestamp = time();
        $params = [
            'timestamp' => $timestamp
        ];
        
        ksort($params);
        $string_to_sign = "timestamp=$timestamp";
        $signature = sha1($string_to_sign . CLOUDINARY_API_SECRET);
        
        $postTags = [
            'file' => $url,
            'api_key' => CLOUDINARY_API_KEY,
            'timestamp' => $timestamp,
            'signature' => $signature
        ];
        
        $ch = curl_init(CLOUDINARY_UPLOAD_URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postTags);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($http_code === 200) {
            $data = json_decode($response, true);
            return $data['secure_url'];
        } else {
             error_log("Cloudinary URL Upload Error: " . $response);
            return null;
        }
    }
}
?>
