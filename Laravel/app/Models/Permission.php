<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Str;

class Permission extends Model
{
    use HasFactory;

    /**
	 * Get all Admin Controllers public methods
	 *
	 * @return array
	 */
	public static function defaultPermissions()
	{
		$permissions = Permission::getRoutesPermissions();
		$permissions = collect($permissions)->mapWithKeys(function ($item) {
			return [$item['permission'] => $item['permission']];
		})->sort()->toArray();
		
		// dd($permissions);
		
		return $permissions;
	}

    public static function getRoutesPermissions()
	{
		$routeCollection = Route::getRoutes();
		
		$defaultAccess = ['list', 'create', 'update', 'delete', 'reorder', 'details_row'];
		$defaultAllowAccess = ['list', 'create', 'update', 'delete'];
		$defaultDenyAccess = ['reorder', 'details_row'];
		
		// Controller's Action => Access
		$accessOfActionMethod = [
			'index'                    => 'list',
			'show'                     => 'list',
			'create'                   => 'create',
			'store'                    => 'create',
			'edit'                     => 'update',
			'update'                   => 'update',
			'reorder'                  => 'update',
			'saveReorder'              => 'update',
			'listRevisions'            => 'update',
			'restoreRevision'          => 'update',
			'destroy'                  => 'delete',
			'bulkDelete'               => 'delete',
			'saveAjaxRequest'          => 'update',
			'dashboard'                => 'access', // Dashboard
			'redirect'                 => 'access', // Dashboard
			'syncFilesLines'           => 'update', // Languages
			'showTexts'                => 'update', // Languages
			'updateTexts'              => 'update', // Languages
			'createDefaultPermissions' => 'create', // Permissions
			'reset'                    => 'delete', // Homepage Sections
			'download'                 => 'download', // Backup
			'banUserByEmail'           => 'ban-users-email', // Blacklist
			'make'                     => 'make', // Inline Requests
			'install'                  => 'install', // Plugins
			'uninstall'                => 'uninstall', // Plugins
			'reSendEmailVerification'  => 'resend-verification-notification',
			'reSendPhoneVerification'  => 'resend-verification-notification',
			'systemInfo'               => 'info',
			
			'createBulkCountriesSubDomain' => 'create', // Domain Mapping
			'generate'                     => 'create',
		];
		$tab = $data = [];
		foreach ($routeCollection as $key => $value) {
			
			// Init.
			$data['filePath'] = null;
			$data['actionMethod'] = null;
			$data['methods'] = [];
			$data['permission'] = null;
			
			// Get & Clear the route prefix
			$routePrefix = $value->getPrefix();
			$routePrefix = trim($routePrefix, '/');
			if ($routePrefix != 'admin') {
				$routePrefix = head(explode('/', $routePrefix));
			}
			
			if ($routePrefix == 'admin') {
				$data['methods'] = $value->methods();
				
				$data['uri'] = $value->uri();
				$data['uri'] = preg_replace('#\{[^\}]+\}#', '*', $data['uri']);
				
				$controllerActionPath = $value->getActionName();
				
				try {
					$controllerNamespace = '\\' . preg_replace('#@.+#i', '', $controllerActionPath);
					$reflector = new \ReflectionClass($controllerNamespace);
					$data['filePath'] = $filePath = $reflector->getFileName();
				} catch (\Throwable $e) {
					$data['filePath'] = $filePath = null;
				}
				
				$data['actionMethod'] = $actionMethod = $value->getActionMethod();
				$access = (isset($accessOfActionMethod[$actionMethod])) ? $accessOfActionMethod[$actionMethod] : null;
				
				if (!empty($filePath) && file_exists($filePath)) {
					$content = file_get_contents($filePath);
					
					if (Str::contains($content, 'extends PanelController')) {
						$allowAccess = [];
						$denyAccess = [];
						
						if (Str::contains($controllerActionPath, '\PermissionController')) {
							if (!config('larapen.admin.allow_permission_create')) {
								$denyAccess[] = 'create';
							}
							if (!config('larapen.admin.allow_permission_update')) {
								$denyAccess[] = 'update';
							}
							if (!config('larapen.admin.allow_permission_delete')) {
								$denyAccess[] = 'delete';
							}
						} else if (Str::contains($controllerActionPath, '\RoleController')) {
							if (!config('larapen.admin.allow_role_create')) {
								$denyAccess[] = 'create';
							}
							if (!config('larapen.admin.allow_role_update')) {
								$denyAccess[] = 'update';
							}
							if (!config('larapen.admin.allow_role_delete')) {
								$denyAccess[] = 'delete';
							}
						} else {
							// Get allowed accesses
							$tmp = '';
							preg_match('#->allowAccess\(([^\)]+)\);#', $content, $tmp);
							$allowAccessStr = (isset($tmp[1]) && !empty($tmp)) ? $tmp[1] : '';
							
							if (!empty($allowAccessStr)) {
								$tmp = '';
								preg_match_all("#'([^']+)'#", $allowAccessStr, $tmp);
								$allowAccess = (isset($tmp[1]) && !empty($tmp)) ? $tmp[1] : [];
								
								if (empty($denyAccess)) {
									$tmp = '';
									preg_match_all('#"([^"]+)"#', $allowAccessStr, $tmp);
									$allowAccess = (isset($tmp[1]) && !empty($tmp)) ? $tmp[1] : [];
								}
							}
							
							// Get denied accesses
							$tmp = '';
							preg_match('#->denyAccess\(([^\)]+)\);#', $content, $tmp);
							$denyAccessStr = (isset($tmp[1]) && !empty($tmp)) ? $tmp[1] : '';
							
							if (!empty($denyAccessStr)) {
								$tmp = '';
								preg_match_all("#'([^']+)'#", $denyAccessStr, $tmp);
								$denyAccess = (isset($tmp[1]) && !empty($tmp)) ? $tmp[1] : [];
								
								if (empty($denyAccess)) {
									$tmp = '';
									preg_match_all('#"([^"]+)"#', $denyAccessStr, $tmp);
									$denyAccess = (isset($tmp[1]) && !empty($tmp)) ? $tmp[1] : [];
								}
							}
						}
						
						$allowAccess = array_merge((array)$defaultAllowAccess, (array)$allowAccess);
						$denyAccess = array_merge((array)$defaultDenyAccess, (array)$denyAccess);
						
						$availableAccess = array_merge(array_diff($allowAccess, $defaultAccess), $defaultAccess);
						$availableAccess = array_diff($availableAccess, $denyAccess);
						
						if (in_array($access, $defaultAccess)) {
							if (!in_array($access, $availableAccess)) {
								continue;
							}
						}
					}
				}
				
				if (Str::contains($controllerActionPath, '\ActionController')) {
					$data['permission'] = strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1-', $actionMethod));
				} else {
					$tmp = '';
					preg_match('#\\\([a-zA-Z0-9]+)Controller@#', $controllerActionPath, $tmp);
					$controllerSlug = (isset($tmp[1]) && !empty($tmp)) ? $tmp[1] : '';
					$controllerSlug = strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1-', $controllerSlug));
					$data['permission'] = (!empty($access)) ? $controllerSlug . '-' . $access : null;
				}
				
				if (empty($data['permission'])) {
					continue;
				}
				
				if ($data['filePath']) {
					unset($data['filePath']);
				}
				if ($data['actionMethod']) {
					unset($data['actionMethod']);
				}
				
				// Save It!
				$tab[$key] = $data;
			}
			
		}
		
		return $tab;
	}
}
