<?php

use Carbon\Carbon;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Ad extends Eloquent implements StaplerableInterface
{
    
    use EloquentTrait;
    
    /**
    * The database table used by model
    * @var string
    */
    protected $table = 'banners';
    
    /**
    * Which fields may be mass assigned?
    * @var array
    */
    protected $fillable = ['name', 'widget_code', 'clicks', 'url', 'image_file_name', 'image_file_size', 'image_content_type', 'banner_updated_at', 'published', 'expires_at'];
    
    public function __construct(array $attributes = array()) {
        
        $this->hasAttachedFile('banner', [
            'storage' => 's3',
            's3_client_config' => [
                'key' => getenv('S3_KEY'),
                'secret' => getenv('S3_SECRET'),
                'region' => getenv('S3_REGION')
                ],
            's3_object_config' => [
                'Bucket' => getenv('S3_BUCKET')
                ],
            'styles' => [
                'medium' => '300x300',
                'thumb' => '100x100'
                ],
            'url' => '/banners/:attachment/:id_partition/:style/banner:extension',
            'keep_old_files' => true
            ]);
        
        parent::__construct($attributes);
    }
    
    public function scopeActive($query) {
        return $query->where('published', '=', 1)->where('expires_at', '>=', new DateTime('today'));
    }
    
    public function getDates() {
        return ['expires_at'];
    }
    
    public function setExpiresAtAttribute($value) {
        if (!empty($value)) {
            $this->attributes['expires_at'] = Carbon::createFromFormat(Config::get('settings.date_format', 'd/m/Y'), $value);
        }
    }
    
    public function getExpiresAtFormattedAttribute() {
        
        return (!empty($this->expires_at)) ? $this->expires_at->format(Config::get('settings.date_format', 'd/m/Y')) : null;
    }
}