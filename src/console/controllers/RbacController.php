<?php

namespace console\controllers;

use common\models\User;
use onecms\rbac\OwnModelRule;
use yii\console\Controller;
use yii\db\Exception;
use yii\helpers\Console;

class RbacController extends Controller {
    public function actionInit() {
        $auth = \Yii::$app->authManager;
        $auth->removeAll();

        //User
        $user = $auth->createRole(User::ROLE_MEMBER);
        $user->description = 'Member - Tài khoản người dùng bình thường';
        $auth->add($user);

        //Own Model Permission
        $ownModelRule = new OwnModelRule();
        $auth->add($ownModelRule);

        //Editor
        $editor = $auth->createRole(User::ROLE_EDITOR);
        $editor->description = 'Editor - Tài khoản người dùng thêm sửa xóa bài viết và tối ưu hóa bài viết chuẩn SEO';
        $auth->add($editor);
        $auth->addChild($editor, $user);

        //Access to Backend Permission
        $accessBackend = $auth->createPermission('accessBackend');
        $accessBackend->description = 'Cho phép user có quyền vào backend';
        $auth->add($accessBackend);
        $auth->addChild($editor, $accessBackend);

        //Manager
        $manager = $auth->createRole(User::ROLE_MANAGER);
        $manager->description = 'Manager - Có quyền quản lý';
        $auth->add($manager);
        $auth->addChild($manager, $editor);

        //Admin
        $admin = $auth->createRole(User::ROLE_ADMIN);
        $admin->description = 'Admin';
        $auth->add($admin);
        $auth->addChild($admin, $manager);

        //Admin
        $super_admin = $auth->createRole(User::ROLE_SUPER_ADMIN);
        $super_admin->description = 'Super Admin';
        $auth->add($super_admin);
        $auth->addChild($super_admin, $admin);

        try {
            //Create first user
            $user = new User();
            $user->email = 'admin@admin.com';
            $user->name = 'Admin';
            $user->roles = User::ROLE_SUPER_ADMIN;
            $user->setPassword('admin123');
            $user->generateAuthKey();
            $user->save();
            $uid = $user->getId();
            //Assign user
            $auth->assign($super_admin, $uid);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }


        Console::output('Success! RBAC roles has been added.');

    }
}