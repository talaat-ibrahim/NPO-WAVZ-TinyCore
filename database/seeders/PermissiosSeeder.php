<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissiosSeeder extends Seeder
{
    public $permissions = [];

    public function initPermissions() {
        $perfix = "Branche_";

        $this->permissions = [
            ['name' => $perfix . 'read-roles','display_name' => 'Read Roles','description' => 'عرض الادوار','category' => 'roles', 'guard_name' => 'web'],
            ['name' => $perfix . 'create-roles','display_name' => 'Create Roles','description' => 'اضافة الادوار','category' => 'roles', 'guard_name' => 'web'],
            ['name' => $perfix . 'update-roles','display_name' => 'Update Roles','description' => 'تعديل الادوار','category' => 'roles', 'guard_name' => 'web'],
            ['name' => $perfix . 'delete-roles','display_name' => 'Delete Roles','description' => 'حذف الادوار','category' => 'roles', 'guard_name' => 'web'],

            ['name' => $perfix . 'read-home','display_name' => 'Read home','description' => 'عرض الرئيسة','category' => 'home', 'guard_name' => 'web'],

            ['name' => $perfix . 'read-users','display_name' => 'Read users','description' => 'عرض مستخدم','category' => 'users', 'guard_name' => 'web'],
            ['name' => $perfix . 'create-users','display_name' => 'Create users','description' => 'اضافة مستخدم','category' => 'users', 'guard_name' => 'web'],
            ['name' => $perfix . 'update-users','display_name' => 'Update users','description' => 'تعديل مستخدم','category' => 'users', 'guard_name' => 'web'],
            ['name' => $perfix . 'delete-users','display_name' => 'Delete users','description' => 'حذف مستخدم','category' => 'users', 'guard_name' => 'web'],

            ['name' => $perfix . 'read-terminal','display_name' => 'Read terminal','description' => 'Read terminal','category' => 'terminal', 'guard_name' => 'web'],
            ['name' => $perfix . 'create-terminal','display_name' => 'Create terminal','description' => 'Create terminal','category' => 'terminal', 'guard_name' => 'web'],
            ['name' => $perfix . 'update-terminal','display_name' => 'Update terminal','description' => 'Update terminal','category' => 'terminal', 'guard_name' => 'web'],
            ['name' => $perfix . 'delete-terminal','display_name' => 'Delete terminal','description' => 'Delete terminal','category' => 'terminal', 'guard_name' => 'web'],

            ['name' => $perfix . 'read-branches','display_name' => 'Read branches','description' => 'عرض فرع','category' => 'branches', 'guard_name' => 'web'],
            ['name' => $perfix . 'create-branches','display_name' => 'Create branches','description' => 'اضافة فرع','category' => 'branches', 'guard_name' => 'web'],
            ['name' => $perfix . 'update-branches','display_name' => 'Update branches','description' => 'تعديل فرع','category' => 'branches', 'guard_name' => 'web'],
            ['name' => $perfix . 'delete-branches','display_name' => 'Delete branches','description' => 'حذف فرع','category' => 'branches', 'guard_name' => 'web'],
            ['name' => $perfix . 'filter-branches','display_name' => 'Filter branches','description' => 'فلتر الفروع','category' => 'branches', 'guard_name' => 'web'],
            ['name' => $perfix . 'export-branches','display_name' => 'Export branches','description' => 'تصدير الفروع','category' => 'branches', 'guard_name' => 'web'],
            ['name' => $perfix . 'import-branches','display_name' => 'Import branches','description' => 'استيراد الفروع','category' => 'branches', 'guard_name' => 'web'],
            ['name' => $perfix . 'terminal-branches','display_name' => 'Show Ternimal branches','description' => 'عرض Terminal','category' => 'branches', 'guard_name' => 'web'],

            ['name' => $perfix . 'read-network','display_name' => 'Read network','description' => 'عرض الشبكات','category' => 'network', 'guard_name' => 'web'],
            ['name' => $perfix . 'create-network','display_name' => 'Create network','description' => 'اضافة الشبكات','category' => 'network', 'guard_name' => 'web'],
            ['name' => $perfix . 'update-network','display_name' => 'Update network','description' => 'تعديل الشبكات','category' => 'network', 'guard_name' => 'web'],
            ['name' => $perfix . 'delete-network','display_name' => 'Delete network','description' => 'حذف الشبكات','category' => 'network', 'guard_name' => 'web'],

            ['name' => $perfix . 'read-project','display_name' => 'Read project','description' => 'عرض مشروع','category' => 'project', 'guard_name' => 'web'],
            ['name' => $perfix . 'create-project','display_name' => 'Create project','description' => 'اضافة مشروع','category' => 'project', 'guard_name' => 'web'],
            ['name' => $perfix . 'update-project','display_name' => 'Update project','description' => 'تعديل مشروع','category' => 'project', 'guard_name' => 'web'],
            ['name' => $perfix . 'delete-project','display_name' => 'Delete project','description' => 'حذف مشروع','category' => 'project', 'guard_name' => 'web'],


            ['name' => $perfix . 'read-branch-level','display_name' => 'Read branch level','description' => 'عرض مستويات المشروع','category' => 'branch level', 'guard_name' => 'web'],
            ['name' => $perfix . 'create-branch-level','display_name' => 'Create branch level','description' => 'اضافة مستويات المشروع','category' => 'branch level', 'guard_name' => 'web'],
            ['name' => $perfix . 'update-branch-level','display_name' => 'Update branch level','description' => 'تعديل مستويات المشروع','category' => 'branch level', 'guard_name' => 'web'],
            ['name' => $perfix . 'delete-branch-level','display_name' => 'Delete branch level','description' => 'حذف مستويات المشروع','category' => 'branch level', 'guard_name' => 'web'],

            ['name' => $perfix . 'read-line-type','display_name' => 'Read line type','description' => 'عرض نوع الخط','category' => 'line type', 'guard_name' => 'web'],
            ['name' => $perfix . 'create-line-type','display_name' => 'Create line type','description' => 'اضافة نوع الخط','category' => 'line type', 'guard_name' => 'web'],
            ['name' => $perfix . 'update-line-type','display_name' => 'Update line type','description' => 'تعديل نوع الخط','category' => 'line type', 'guard_name' => 'web'],
            ['name' => $perfix . 'delete-line-type','display_name' => 'Delete line type','description' => 'حذف نوع الخط','category' => 'line type', 'guard_name' => 'web'],

            ['name' => $perfix . 'read-router-type','display_name' => 'Read router type','description' => 'عرض نوع الروتر','category' => 'router type', 'guard_name' => 'web'],
            ['name' => $perfix . 'create-router-type','display_name' => 'Create router type','description' => 'اضافة نوع الروتر','category' => 'router type', 'guard_name' => 'web'],
            ['name' => $perfix . 'update-router-type','display_name' => 'Update router type','description' => 'تعديل نوع الروتر','category' => 'router type', 'guard_name' => 'web'],
            ['name' => $perfix . 'delete-router-type','display_name' => 'Delete router type','description' => 'حذف نوع الروتر','category' => 'router type', 'guard_name' => 'web'],

            ['name' => $perfix . 'read-switch-model','display_name' => 'Read switch model','description' => 'عرض نوع السوتش','category' => 'switch model', 'guard_name' => 'web'],
            ['name' => $perfix . 'create-switch-model','display_name' => 'Create switch model','description' => 'اضافة نوع السوتش','category' => 'switch model', 'guard_name' => 'web'],
            ['name' => $perfix . 'update-switch-model','display_name' => 'Update switch model','description' => 'تعديل نوع السوتش','category' => 'switch model', 'guard_name' => 'web'],
            ['name' => $perfix . 'delete-switch-model','display_name' => 'Delete switch model','description' => 'حذف نوع السوتش','category' => 'switch model', 'guard_name' => 'web'],

            ['name' => $perfix . 'read-ups-installation','display_name' => 'Read ups installation','description' => 'عرض تركيب يو بي إس','category' => 'ups installation', 'guard_name' => 'web'],
            ['name' => $perfix . 'create-ups-installation','display_name' => 'Create ups installation','description' => 'اضافة تركيب يو بي إس','category' => 'ups installation', 'guard_name' => 'web'],
            ['name' => $perfix . 'update-ups-installation','display_name' => 'Update ups installation','description' => 'تعديل تركيب يو بي إس','category' => 'ups installation', 'guard_name' => 'web'],
            ['name' => $perfix . 'delete-ups-installation','display_name' => 'Delete ups installation','description' => 'حذف تركيب يو بي إس','category' => 'ups installation', 'guard_name' => 'web'],

            ['name' => $perfix . 'read-line-capacity','display_name' => 'Read line capacity','description' => 'عرض قدرة الخط','category' => 'line capacity', 'guard_name' => 'web'],
            ['name' => $perfix . 'create-line-capacity','display_name' => 'Create line capacity','description' => 'اضافة قدرة الخط','category' => 'line capacity', 'guard_name' => 'web'],
            ['name' => $perfix . 'update-line-capacity','display_name' => 'Update line capacity','description' => 'تعديل قدرة الخط','category' => 'line capacity', 'guard_name' => 'web'],
            ['name' => $perfix . 'delete-line-capacity','display_name' => 'Delete line capacity','description' => 'حذف قدرة الخط','category' => 'line capacity', 'guard_name' => 'web'],

            ['name' => $perfix . 'read-entuity-status','display_name' => 'Read entuity status','description' => 'عرض حالة الجاذبية','category' => 'entuity status', 'guard_name' => 'web'],
            ['name' => $perfix . 'create-entuity-status','display_name' => 'Create entuity status','description' => 'اضافة حالة الجاذبية','category' => 'entuity status', 'guard_name' => 'web'],
            ['name' => $perfix . 'update-entuity-status','display_name' => 'Update entuity status','description' => 'تعديل حالة الجاذبية','category' => 'entuity status', 'guard_name' => 'web'],
            ['name' => $perfix . 'delete-entuity-status','display_name' => 'Delete entuity status','description' => 'حذف حالة الجاذبية','category' => 'entuity status', 'guard_name' => 'web'],

            ['name' => $perfix . 'read-government','display_name' => 'Read government','description' => 'عرض كود المحافظه','category' => 'government', 'guard_name' => 'web'],
            ['name' => $perfix . 'create-government','display_name' => 'Create government','description' => 'اضافة كود المحافظه','category' => 'government', 'guard_name' => 'web'],
            ['name' => $perfix . 'update-government','display_name' => 'Update government','description' => 'تعديل كود المحافظه','category' => 'government', 'guard_name' => 'web'],
            ['name' => $perfix . 'delete-government','display_name' => 'Delete government','description' => 'حذف كود المحافظه','category' => 'government', 'guard_name' => 'web'],

        ];
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->initPermissions();

        foreach($this->permissions as $item) {
            if (!DB::table('permissions')->where('name', $item['name'])->exists()) {

                Permission::updateOrCreate($item);
            }
        }
    }
}
