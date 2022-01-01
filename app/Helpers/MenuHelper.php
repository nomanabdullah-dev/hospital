<?php

namespace App\Helpers;

use URL;
use Auth;
use App\Models\Menu;
use App\Models\User;
use App\Models\RolePermission;
use App\Models\UserMenuAction;
use App\Models\UserPermission;
use Illuminate\Support\Facades\Route;

class MenuHelper
{
    public static function Menu(){
        $menu_permission = UserPermission::where('permission_type','menu')->where('user_id',auth()->user()->id)->pluck('permission_id')->toArray();
        /*if(!@$menu_permission){
            $menu_permission = RolePermission::where('permission_type','menu')->where('role_id',auth()->user()->role_id)->pluck('permission_id')->toArray();
        }*/
        $menu_list = Menu::with(['children' => function($q) use($menu_permission)
                        {
                            $q->where('status','=', 1);
                            $q->whereIn('id', $menu_permission);

                        }])
                        ->where('parent_id',NULL)
                        ->where('status',1)
                        ->whereIn('id',$menu_permission)
                        ->where('is_hidden','No')
                        ->orderBy('order_by','asc')
                        ->get();
        return $menu_list;
    }

    public static function MenuElement($menu){
        if(count($menu->children) > 0){
            $menu_link = 'javascript:';
            $has_arrow = 'has-arrow ';
        }else{
            if($menu->route_name){
                if(!\Route::has($menu->route_name)){
                    $menu_link = 'route-not-exist';
                }else{
                    $menu_link = route($menu->route_name);
                }
            }else{
                $menu_link = 'javascript:';
            }

            $has_arrow = '';
        }

        if($menu->icon){
            $menu_icon = $menu->icon;
        }else{
            $menu_icon = 'fas fa-th-list';
        }

       $data['menu_link'] = $menu_link;
       $data['has_arrow'] = $has_arrow;
       $data['menu_icon'] = $menu_icon;

        return $data;
    }

    public static function menuName($menu){
        if(@$menu->bn_name){
            return $menu->bn_name;
        }else{
            return $menu->name;
        }
    }

    public static function TableActionButton(array $action_array = null){
        $id = $action_array['id'];
        $status = $action_array['status'];
        
        $routeName = Route::currentRouteName();
        $newRoute = explode(".", $routeName );
        array_splice($newRoute, -1 );
        $Linkroute = implode(".", $newRoute );

        $button ='';
        $button .=
                '<a class="btn btn-primary btn-sm mb-1"
                    href=""
                    data-id="'.$id.'"
                    data-route="'.$Linkroute.'"
                    data-status="'.$status.'"
                    /*data-toggle="tooltip" data-placement="top"*/ title="Edit">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a class="btn btn-danger btn-sm mb-1"
                    href=""
                    data-placement="top"*/ title="Delete">
                    <i class="fas fa-trash"></i> Delete
                </a>';
        return $button;
    }


    public static function CustomElementPermission($slug){
        $routeName = \Route::currentRouteName();
        $menu = Menu::where('status',1)->where('route_name',$routeName)->first();
        $user_menu_action = UserMenuAction::where('status',1)->where('menu_id',$menu->id)->where('slug',$slug)->first();
        if(@$user_menu_action){
            $permission = UserPermission::where('user_id',auth()->user()->id)->where('permission_type','menu_action')->where('permission_id',$user_menu_action->id)->first();
            /*if(!@$permission){
                $permission = RolePermission::where('role_id',auth()->user()->role_id)->where('permission_type','menu_action')->where('permission_id',$user_menu_action->id)->first();
            }*/

            if(@$permission){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public static function status($id = null,$status = null) {

        $data_status = '';
        if($status === 'Active' || $status === 1 ){
            $checked = 'checked';
        }else{
            $checked = '';
        }

        $data_status .= '<div class="form-check form-switch form-switch-md status_'.$id.'" dir="ltr">
                            <input class="form-check-input" type="checkbox" onchange="statusChange('.$id.')" '.$checked.'>
                        </div>';

        return $data_status;
    }
}
