<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'variant_slug',
        'price',
        'price_aed',
        'price_lkr',
        'price_gbp',
        'discount_price',
        'discount_price_aed',
        'discount_price_lkr',
        'discount_price_gbp',
        'stock',
        'SKU',
        'barcode',
        'is_primary',
        'weight',
        'dimensions',
    ];

    protected $appends = ['converted_price', 'converted_discount_price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function translations()
    {
        return $this->hasMany(ProductVariantTranslation::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'variant_id');
    }

    public function getConvertedPriceAttribute()
    {
        $currency = session('currency', 'USD');
        return $this->getPriceByCurrency($currency);
    }

    public function getConvertedDiscountPriceAttribute()
    {
        $currency = session('currency', 'USD');
        return $this->getDiscountPriceByCurrency($currency);
    }

    public function getPriceByCurrency($currency = 'USD')
    {
        $currency = strtoupper($currency);
        
        switch($currency) {
            case 'AED':
                return $this->price_aed ?: $this->price;
            case 'LKR':
                return $this->price_lkr ?: $this->price;
            case 'GBP':
                return $this->price_gbp ?: $this->price;
            default:
                return $this->price;
        }
    }

    public function getDiscountPriceByCurrency($currency = 'USD')
    {
        $currency = strtoupper($currency);
        
        switch($currency) {
            case 'AED':
                return $this->discount_price_aed ?: $this->discount_price;
            case 'LKR':
                return $this->discount_price_lkr ?: $this->discount_price;
            case 'GBP':
                return $this->discount_price_gbp ?: $this->discount_price;
            default:
                return $this->discount_price;
        }
    }

    public function getCurrencySymbol()
    {
        $currency = session('currency', 'USD');
        $symbols = [
            'USD' => '$',
            'AED' => 'AED',
            'LKR' => 'LKR',
            'GBP' => '£'
        ];
        
        return $symbols[$currency] ?? '$';
    }

    /*public function attributeValues()
    {
        return $this->belongsToMany(
            \App\Models\AttributeValue::class,
            'product_attribute_values',
            'product_id',
            'attribute_value_id'
        )->withTimestamps();
    }*/

    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class, 'product_variant_attribute_values');
    }
}
