<?php

namespace Core;

use Core\Services;
use Valitron\Validator;

class View
{
    private $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function show(string $view, array $data = [])
    {
        $blade = Services::blade();
        $blade->share('errors', $this->validator->errors());
        $blade->share('posts', $this->validator->data());
        $blade->directive('hasError', function($name){
            return 
            '<?php if(isset($errors["'.$name.'"])): ?>
                has-error
            <?php endif; ?>';
        });
        $blade->directive('getError', function($name){
            return 
            '<?php if(isset($errors["'.$name.'"])): ?>
                <div style="color: red; font-weight: 700;">{{ $errors["'.$name.'"][0] }}</div>
            <?php endif; ?>';
        });
        $blade->directive('getData', function($name){
            return 
            '<?= $posts["'.$name.'"] ?? null; ?>';
        });
        $blade->directive('timeAgo', function($date){
            return '<?= timeAgo('.$date.') ?>';
        });
        return $blade->render($view, $data);
    }
}
?>