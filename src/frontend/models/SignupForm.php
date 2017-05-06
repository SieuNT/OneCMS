<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use yii\db\Exception;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $name;
    public $email;
    public $password;
    public $password_confirm;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'filter', 'filter' => 'strip_tags'],
            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 2, 'max' => 70],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_confirm', 'compare',
                'compareAttribute' => 'password',
                'message' => Yii::t('app', 'Password does not match the confirm password.')
            ],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null
     * @throws Exception
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->roles = User::ROLE_MEMBER;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $user->save();
            $uid = $user->getId();
            $auth = Yii::$app->authManager;
            $auth->assign($auth->getRole(User::ROLE_MEMBER), $uid);
            $transaction->commit();
            return $user;
        } catch (Exception $exception) {
            $transaction->rollBack();
            throw new Exception($exception->getMessage());
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Full Name'),
            'phone' => Yii::t('app', 'Phone Number'),
            'address' => Yii::t('app', 'Address'),
            'avatar' => Yii::t('app', 'Avatar'),
            'bio' => Yii::t('app', 'Bio'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'password_confirm' => Yii::t('app', 'Password Confirm'),
        ];
    }
}
