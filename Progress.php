<?php
/**
 * @author Maxim Cherednyk <maks757q@gmail.com, +380639960375>
 */

namespace bl\progress;


use bl\progress\behaviors\Validate;
use bl\progress\components\ValidateProgress;
use Yii;
use yii\base\Component;

/**
 * @method validateOne(string $key, int $user_id)
 * @method validate(string $key)
*/

class Progress extends Component
{
    public $honors = [];
    public $validatorClass;

    public function behaviors()
    {
        return [
            'validate' => [
                'class' => Validate::class
            ]
        ];
    }


    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->standardHonors();
        $this->registerDependencies();
    }

    private function registerDependencies()
    {
        \Yii::$container->set('bl\progress\interfaces\IProgressValidator',
            $this->validatorClass);
    }

    public function standardHonors(){
        $standardHonors = [
            'userConfirm' => [
                'class' => ValidateProgress::className(),
                'name' => 'Registration success',
                'image' => Yii::getAlias('@vendor/maks757/yii2-progress/image/user.png'),
                'long_description' =>
                    'fdsf as fasd fasdf asdf asd fasd fdsaf df asdf sdf sad fasdf asdf asd 
                    fdsf as fasd fasdf asdf asd fasd fdsaf df asdf sdf sad fasdf asdf asd 
                    fdsf as fasd fasdf asdf asd fasd fdsaf df asdf sdf sad fasdf asdf asd',
                'short_description' => 'fdsf as fasd fasdf asdf asd fasd fdsaf',
            ]
        ];
        $this->honors = array_merge($standardHonors, $this->honors);
    }
}