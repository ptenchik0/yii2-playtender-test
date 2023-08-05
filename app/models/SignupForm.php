<?php


namespace app\models;


use Yii;
use yii\base\Model;
use yii\db\Exception;

class SignupForm extends Model
{

    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $password_confirm;

    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'password', 'password_confirm'], 'required'],
            [['first_name', 'last_name', 'email'], 'filter', 'filter' => 'trim'],
            [['first_name', 'last_name'], 'string', 'min' => 3, 'max' => 60],

            ['email', 'email'],
            ['email', 'unique',
                'targetClass' => User::class,
                'message' => Yii::t('app', 'This email address has already been taken.')
            ],

            ['password', 'string', 'min' => 6],
            ['password_confirm', 'compare', 'compareAttribute' => 'password', 'skipOnEmpty' => false],
        ];
    }

    public function attributeLabels()
    {
        return [
            'first_name' => Yii::t('app', 'User name'),
            'last_name' => Yii::t('app', 'Last name'),
            'email' => Yii::t('app', 'E-mail'),
            'password' => Yii::t('app', 'Password'),
            'password_confirm' => Yii::t('app', 'Confirm Password')
        ];
    }

    public function signup()
    {
        if ($this->validate()){
            $user = new User();
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->email = $this->email;
            $user->password = $this->password;

            if (!$user->save(false)){
                throw new Exception('Error while creating user');
            }else{
                return $user;
            }
        }

        return null;
    }

}