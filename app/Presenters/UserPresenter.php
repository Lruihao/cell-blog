<?php

namespace App\Presenters;

use App\Models\User;

/**
 * Class UserPresenter
 *
 * @package namespace App\Presenters;
 */
class UserPresenter
{
    /**
     * 获取作者信息
     * @param int $userId
     * @return mixed
     */
    public function getUserInfo($userId = 0) {
        $columns = ['id', 'name', 'avatar'];

        if ($userId > 0) {
            return User::where("id", $userId)->first($columns);
        }
        return User::first($columns);
    }
}
