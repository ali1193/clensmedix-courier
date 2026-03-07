<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentBlock extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'key',
        'label',
        'value',
    ];

    public static function get(string $key, string $default = '', ?string $label = null): string
    {
        $block = static::query()->where('key', $key)->first();

        if (! $block) {
            $block = static::query()->create([
                'key' => $key,
                'label' => $label,
                'value' => $default,
            ]);

            return $default;
        }

        return $block->value ?? $default;
    }

    public static function set(string $key, string $value, ?string $label = null): void
    {
        static::query()->updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'label' => $label]
        );
    }
}

