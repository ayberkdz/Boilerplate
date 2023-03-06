<?php

namespace Core;
use \Jenssegers\Blade\Blade;
use Valitron\Validator;

class View
{
    public $blade;
    public $validator;
    
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }
    public function show($view, $data)
    {
        $this->blade = new Blade(dirname(__DIR__) . '/app/View', dirname(__DIR__) . '/public/cache');

        $this->shares();
        $this->directives();

        return $this->blade->render($view, $data);
    }

    public function shares()
    {
        $this->blade->share('_post', $this->validator->data());
        $this->blade->share('errors', $this->validator->errors());
    }

    public function directives()
    {
        $this->blade->directive('hasError', function($name){
            return '<?php if(isset($errors[' . $name .'])): ?>border-red-500<?php endif; ?>';
        });

        $this->blade->directive('getError', function($name){
            return '<?php if (isset($errors[' . $name . '])): ?><div class="bg-rose-500 text-white"><?=$errors[' . $name . '][0]?></div><?php endif; ?>';
        });

        $this->blade->directive('getData', function($name){
            return '<?= $_post[' . $name .'] ?? null ?>';
        });

        $this->blade->directive('timeAgo', function($date){
            return '<?= timeAgo(' . $date . ') ?>';
        });
    }
}
?>