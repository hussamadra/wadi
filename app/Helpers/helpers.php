<?php

use Illuminate\Support\Facades\Log;

if ( ! function_exists('put_permanent_env'))
{
    function put_permanent_env($key, $value)
    {
        $path = app()->environmentFilePath();

        $escaped = preg_quote('='.env($key), '/');

        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));
    }
}

if (!function_exists('setEnvironmentValue')) {
    function setEnvironmentValue($envKey, $envValue)
    {
        putenv ("CUSTOM_VARIABLE=hero");

//        $envFile = app()->environmentFilePath();
//        $str = file_get_contents($envFile);
//
//        $oldValue = strtok($str, "{$envKey}=");
//
//        $str = str_replace("{$envKey}={$oldValue}", "{$envKey}={$envValue}\n", $str);
//
//        $fp = fopen($envFile, 'w');
//        fwrite($fp, $str);
//        fclose($fp);
    }
}

if (!function_exists('get_value_from_constants_array')) {
    function get_value_from_constants_array($constants_array, $value)
    {
        $result = array_filter($constants_array,
            function ($key) use ($value) {
                if ($key['id'] == $value) return $key;
            });
        return (count($result) > 0) ? reset($result) : null;
    }
}

if (!function_exists('get_value_from_constants_array_by_name_key')) {
    function get_value_from_constants_array_by_name_key($constants_array, $value)
    {
        $result = array_filter($constants_array,
            function ($key) use ($value) {
                if ($key['name'] == $value) return $key;
            });
        return (count($result) > 0) ? reset($result) : null;
    }
}

if (!function_exists('get_arabic_field_name_from_constants_array_by_name_key')) {
    function get_arabic_field_name_from_constants_array_by_name_key($constants_array, $value)
    {
        $result = array_filter($constants_array,
            function ($key) use ($value) {
                if ($key['field_name'] == $value) return $key;
            });
        return (count($result) > 0) ? reset($result)['arabic_name'] : null;
    }
}

if (!function_exists('remove_characters_and_numbers_from_string')) {
    function remove_characters_and_numbers_from_string($str)
    {
        $res = preg_replace("/[0-9-]/", "", $str);
        return $res;
    }
}

if (!function_exists('get_all_permissions_for_authenticated_user')) {
    function get_all_permissions_for_authenticated_user()
    {
        $user = Auth::guard('api')->user();
//        dd($user->permissionsFromRoles);

        $permissionsFromRoles = collect($user->permissionsFromRoles->pluck('permission_id'))->flatten()->toArray();

//        $permissionsFromRoles->map(function ($item, $key) use (&$permissions) {
//            $permissions=array_merge($permissions, unserialize($item));
//        });

//        Log::info($permissionsFromRoles);
//        dd($user->user_permissions);
        Log::info($user->user_permissions->toArray());

//        dd($permissionsFromRoles);
//        $permissions = array_merge($user->permissionsFromRoles, $user->permissions);
        $res = \App\Models\Permission::whereIn('id', array_merge($permissionsFromRoles, $user->directPermissions->pluck('permission_id')->toArray()))->pluck('id')->toArray();
        return $res;
    }
}
