<?php

namespace App\Permissoes;

use App\Models\Permissao;
use App\Models\Papel;

trait HasPermissionsTrait {

   public function givePermissionsTo(... $permissions) {
    $permissions = $this->getAllPermissions($permissions);
    //dd($permissions);
    if($permissions === null) {
      return $this;
    }
    $this->permissions()->saveMany($permissions);
    return $this;
  }

  public function withdrawPermissionsTo( ... $permissions ) {
    $permissions = $this->getAllPermissions($permissions);
    $this->permissions()->detach($permissions);
    return $this;
  }

  public function refreshPermissions( ... $permissions ) {
    $this->permissions()->detach();
    return $this->givePermissionsTo($permissions);
  }

  public function hasPermissionTo($permission) {
    return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
  }

  public function hasPermissionThroughRole($permission) {
    if(isset($permission->roles) && count($permission->roles) > 0) {
        foreach ($permission->roles as $role){
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    } else
        //No Records Found
        return false;
  }

  public function hasRole( ... $roles ) {
    if(isset($roles) && count($roles) > 0) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    } else
        //No Records Found
        return false;
  }

  public function roles() {
    return $this->belongsToMany(Papel::class,'usuarios_papeis');
  }

  public function permissions() {
    return $this->belongsToMany(Permissao::class,'usuarios_permissoes');
  }

  protected function hasPermission($permission) {
    return (bool) $this->permissions->where('slug', $permission->slug)->count();
  }

  protected function getAllPermissions(array $permissions) {
    return Permissao::whereIn('slug',$permissions)->get();
  }

}
