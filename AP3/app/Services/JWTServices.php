<?php

namespace App\Services;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTService
{
    private static $algo = 'SHA256';

    private static function getSecretKey()
    {
        $key = getenv('JWT_SECRET');
        if (!$key) {
            throw new \RuntimeException('JWT_SECRET non configuré dans .env');
        }
        return $key;
    }

    public static function generateToken($user)
    {
        if (!isset($user['idPersonne'], $user['Email'], $user['idRole'])) {
            throw new \InvalidArgumentException("Données utilisateur invalides pour générer le token");
        }

        $payload = [
            'iat' => time(),
            'exp' => time() + 3600,
            'uid' => $user['idPersonne'],
            'email' => $user['Email'],
            'role' => $user['idRole']
        ];

        return JWT::encode($payload, self::getSecretKey(), self::$algo);
    }

    public static function generateRefreshToken($user)
    {
        if (!isset($user['idPersonne'])) {
            throw new \InvalidArgumentException("Données utilisateur invalides pour le refresh token");
        }

        $payload = [
            'iat' => time(),
            'exp' => time() + (86400 * 30),
            'uid' => $user['idPersonne'],
            'type' => 'refresh'
        ];

        return JWT::encode($payload, self::getSecretKey(), self::$algo);
    }

    public static function validateToken($token)
    {
        return JWT::decode($token, new Key(self::getSecretKey(), self::$algo));
    }
}
