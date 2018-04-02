<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $verify_token
 * @property string $status
 */
class User extends Authenticatable
{
    use Notifiable;

    public const STATUS_AWAIT = 'await';
    public const STATUS_ACTIVE = 'active';

    protected $fillable = [
        'name', 'email', 'password', 'status',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Handling users registration
     * @param string $name
     * @param string $email
     * @param string $password
     * @return User
     */
    public static function register(string $name, string $email, string $password): self
    {
        return static::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'verify_token' => Str::uuid(),
            'status' => self::STATUS_AWAIT,
        ]);
    }

    /**
     * Manually creates user
     * @param string $name
     * @param string $email
     * @return User
     */
    public static function new(string $name, string $email): self
    {
        return static::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt(Str::random()),
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public function waiting(): bool
    {
        return $this->status === self::STATUS_AWAIT;
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function verify(): void
    {
        if (!$this->waiting()) {
            throw new \DomainException('User is already verified.');
        }

        $this->update([
            'status' => self::STATUS_ACTIVE,
            'verify_token' => null,
        ]);
    }
}
