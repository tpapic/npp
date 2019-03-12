<?php

namespace App\Util;

use App\Action;
use App\AppModule;
use App\Role;
use App\User;
use Auth;

class Permission
{

    /**
     * Checks a list of actions.
     * Mode:
     *   'all' - all actions must return true for the request to be true
     *   'any' - any action must return true for the request to be true
     *
     * @param string|array $actions
     * @param int|\App\User $user
     * @param string $mode
     * @return bool
     */
    public static function checkAll($actions, $user = null, $mode = 'all')
    {
        if (is_string($actions)) {
            $actions = [$actions];
        }
        foreach ($actions as $action) {
            $allowed = Permission::check($action, $user);
            if ($mode === 'all' && $allowed === false) {
                return false;
            }
            if ($mode === 'any' && $allowed === true) {
                return true;
            }
        }
        if ($mode === 'all') {
            return true;
        }
        return false;
    }

    /**
     * Checks if a user has a permission for action.
     *
     * @param string $action
     * @param int|\App\User $user
     * @return bool
     */
    public static function check($action, $user = null)
    {
        if (is_int($user)) {
            $user = User::findOrFail($user);
        }
        if (!$user) {
            $user = Auth::user();

            if (!$user) {
                return false;
            }
        }

        if (is_string($action)) {
            $action = Action::where('name', $action)->first();
        }

        if (!isset($action->name)) {
            return false;
        }

        $roles = $user->roles()->get();
        /** @var Role $role */
        foreach ($roles as $role) {
            $pivot = $role->actions()
                ->where('name', $action->name)
                ->withPivot('is_allowed')
                ->first();
            if (!$pivot) {
                return false;
            }
            if ($pivot->pivot->is_allowed) {
                return true;
            }
        }
        return false;
    }

    /**
     * Checks 'app_module' table for permissions.
     *
     * @param string $action
     * @return bool
     */
    private static function checkAppModule($action)
    {
        $module = AppModule::where('name', $action)->first();
        if (!isset($module->is_allowed)) {
            return true;
        }
        return $module->is_allowed;
    }

    /**
     * Adds actions (including M2M relationship with roles).
     *
     * @param array $actions
     * @param int $isAllowed
     */
    public static function addActions($actions, $isAllowed = 0)
    {
        $isAlreadyInDb = false;
        foreach ($actions as $action) {
            $a = Action::where('name', $action)->first();
            if ($a) {
                $isAlreadyInDb = true;
                break;
            }
        }

        if (!$isAlreadyInDb) {
            $roles = Role::all();
            foreach ($actions as $action) {
                $action = ['name' => $action];
                $action = Action::create($action);
                foreach ($roles as $role) {
                    $role->actions()->attach($action, [
                        'is_allowed' => $isAllowed
                    ]);
                }
            }
        }
    }

    /**
     * Adds actions for specific role (including M2M relationship with roles).
     *
     * @param array $actions
     * @param int $isAllowed
     */
    public static function addActionsForRole($actions, $isAllowed = 0, $roleId)
    {
        $isAlreadyInDb = false;
        foreach ($actions as $action) {
            $a = Action::where('name', $action)->first();
            $role = Role::findOrFail($roleId);
            if ($a) {
                $isAlreadyInDb = true;
                $role->actions()->attach($a, [
                        'is_allowed' => $isAllowed
                    ]);
            } else {
                $action = ['name' => $action];
                $action = Action::create($action);
                $role->actions()->attach($action, [
                        'is_allowed' => $isAllowed
                    ]);
            }
        }
    }

    /**
     * Adds roles (including M2M relationship with actions).
     *
     * @param array $roles
     * @param int $isAllowed
     */
    public static function addRoles($roles, $isAllowed = 0)
    {
        $isAlreadyInDb = false;
        foreach ($roles as $role) {
            $r = Role::where('name', $role)->first();
            if ($r) {
                $isAlreadyInDb = true;
                break;
            }
        }

        if (!$isAlreadyInDb) {
            $actions = Action::all();
            foreach ($roles as $role) {
                $role = ['name' => $role];
                $role = Role::create($role);
                foreach ($actions as $action) {
                    $action->roles()->attach($role, [
                        'is_allowed' => $isAllowed
                    ]);
                }
            }
        }
    }
}
