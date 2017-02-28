<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

/**
 * Turns Establishments into a menu item
 */
class EstablishmentsDataTypeRowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedPermissionsTable();
        $this->seedPermissionsRolesJoiningTable();
        $this->seedMenuItemsTable();
        $this->seedDataTypeTable();
        $this->seedDataRowTable();
    }

    public function seedPermissionsTable()
    {
        $keys = [
            'browse_admin',
            'browse_database',
            'browse_media',
            'browse_settings',
        ];

        foreach ($keys as $key) {
            Permission::firstOrCreate(
                [
                    'key'        => $key,
                    'table_name' => null,
                ]
            );
        }

        Permission::generateFor('establishments');
    }

    public function seedPermissionsRolesJoiningTable()
    {
        $role = Role::where('name', 'admin')->firstOrFail();

        $permissions = Permission::where('table_name', 'establishments');

        $role->permissions()->syncWithoutDetaching(
            $permissions->pluck('id')->all()
        );
    }

    public function seedDataTypeTable()
    {
        $dataType = $this->dataType('slug', 'establishments');

        if (!$dataType->exists) {
            $dataType->fill(
                [
                    'name'                  => 'establishments',
                    'display_name_singular' => 'Establishment',
                    'display_name_plural'   => 'Establishments',
                    'icon'                  => 'voyager-company',
                    'model_name'            => 'App\\Models\\Establishment',
                    'generate_permissions'  => 1,
                    'description'           => '',
                ]
            )->save();
        }
    }

    public function seedDataRowTable()
    {
        $establishmentsDataType = DataType::where('slug', 'establishments')->firstOrFail();

        $dataRow = $this->dataRow($establishmentsDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'PRI',
                               'display_name' => 'ID',
                               'required'     => 1,
                               'browse'       => 0,
                               'read'         => 0,
                               'edit'         => 0,
                               'add'          => 0,
                               'delete'       => 0,
                               'details'      => '',
                           ])->save();
        }

        $dataRow = $this->dataRow($establishmentsDataType, 'establishment_type_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'select_dropdown',
                               'display_name' => 'Type',
                               'required'     => 1,
                               'browse'       => 0,
                               'read'         => 1,
                               'edit'         => 1,
                               'add'          => 1,
                               'delete'       => 1,
                               'details'      => '
{
    "relationship": {
        "key": "id",
        "label": "name"
    }
}',
                           ])->save();
        }

        $dataRow = $this->dataRow($establishmentsDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'text',
                               'display_name' => 'Name',
                               'required'     => 1,
                               'browse'       => 1,
                               'read'         => 1,
                               'edit'         => 1,
                               'add'          => 1,
                               'delete'       => 1,
                               'details'      => '',
                           ])->save();
        }

        $dataRow = $this->dataRow($establishmentsDataType, 'description');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'rich_text_box',
                               'display_name' => 'Description',
                               'required'     => 0,
                               'browse'       => 0,
                               'read'         => 1,
                               'edit'         => 1,
                               'add'          => 1,
                               'delete'       => 1,
                               'details'      => '',
                           ])->save();
        }

        $dataRow = $this->dataRow($establishmentsDataType, 'address');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'text',
                               'display_name' => 'Address',
                               'required'     => 0,
                               'browse'       => 0,
                               'read'         => 1,
                               'edit'         => 1,
                               'add'          => 1,
                               'delete'       => 1,
                               'details'      => '',
                           ])->save();
        }

        $dataRow = $this->dataRow($establishmentsDataType, 'city');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'text',
                               'display_name' => 'City',
                               'required'     => 0,
                               'browse'       => 0,
                               'read'         => 1,
                               'edit'         => 1,
                               'add'          => 1,
                               'delete'       => 1,
                               'details'      => '',
                           ])->save();
        }

        $dataRow = $this->dataRow($establishmentsDataType, 'phone');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'text',
                               'display_name' => 'Phone',
                               'required'     => 0,
                               'browse'       => 0,
                               'read'         => 1,
                               'edit'         => 1,
                               'add'          => 1,
                               'delete'       => 1,
                               'details'      => '',
                           ])->save();
        }

        $dataRow = $this->dataRow($establishmentsDataType, 'email');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'text',
                               'display_name' => 'Email',
                               'required'     => 0,
                               'browse'       => 0,
                               'read'         => 1,
                               'edit'         => 1,
                               'add'          => 1,
                               'delete'       => 1,
                               'details'      => '',
                           ])->save();
        }

        $dataRow = $this->dataRow($establishmentsDataType, 'url');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'text',
                               'display_name' => 'URL',
                               'required'     => 0,
                               'browse'       => 0,
                               'read'         => 1,
                               'edit'         => 1,
                               'add'          => 1,
                               'delete'       => 1,
                               'details'      => '',
                           ])->save();
        }

        $dataRow = $this->dataRow($establishmentsDataType, 'longitude');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'text',
                               'display_name' => 'Longitude',
                               'required'     => 0,
                               'browse'       => 0,
                               'read'         => 1,
                               'edit'         => 1,
                               'add'          => 1,
                               'delete'       => 1,
                               'details'      => '',
                           ])->save();
        }

        $dataRow = $this->dataRow($establishmentsDataType, 'latitude');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'text',
                               'display_name' => 'Latitude',
                               'required'     => 0,
                               'browse'       => 0,
                               'read'         => 1,
                               'edit'         => 1,
                               'add'          => 1,
                               'delete'       => 1,
                               'details'      => '',
                           ])->save();
        }

        $dataRow = $this->dataRow($establishmentsDataType, 'suburb');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'text',
                               'display_name' => 'Suburb',
                               'required'     => 0,
                               'browse'       => 0,
                               'read'         => 1,
                               'edit'         => 1,
                               'add'          => 1,
                               'delete'       => 1,
                               'details'      => '',
                           ])->save();
        }

        $dataRow = $this->dataRow($establishmentsDataType, 'region');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'text',
                               'display_name' => 'Region',
                               'required'     => 0,
                               'browse'       => 0,
                               'read'         => 1,
                               'edit'         => 1,
                               'add'          => 1,
                               'delete'       => 1,
                               'details'      => '',
                           ])->save();
        }

        $dataRow = $this->dataRow($establishmentsDataType, 'postcode');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'text',
                               'display_name' => 'Post code',
                               'required'     => 0,
                               'browse'       => 0,
                               'read'         => 1,
                               'edit'         => 1,
                               'add'          => 1,
                               'delete'       => 1,
                               'details'      => '',
                           ])->save();
        }

        $dataRow = $this->dataRow($establishmentsDataType, 'is_active');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'select_dropdown',
                               'display_name' => 'Status',
                               'required'     => 1,
                               'browse'       => 1,
                               'read'         => 1,
                               'edit'         => 1,
                               'add'          => 1,
                               'delete'       => 1,
                               'details'      => '
{
    "default": "0",
    "options": {
        "0": "Inactive",
        "1": "Active"
    }
}',
                           ])->save();
        }



        $dataRow = $this->dataRow($establishmentsDataType, 'founded_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'date',
                               'display_name' => 'Founded',
                               'required'     => 0,
                               'browse'       => 0,
                               'read'         => 1,
                               'edit'         => 1,
                               'add'          => 1,
                               'delete'       => 1,
                               'details'      => '
{
    "format" : "Y"
}',
                           ])->save();
        }

        $dataRow = $this->dataRow($establishmentsDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'timestamp',
                               'display_name' => 'Created',
                               'required'     => 0,
                               'browse'       => 1,
                               'read'         => 1,
                               'edit'         => 0,
                               'add'          => 0,
                               'delete'       => 0,
                               'details'      => '',
                           ])->save();
        }

        $dataRow = $this->dataRow($establishmentsDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'timestamp',
                               'display_name' => 'updated_at',
                               'required'     => 0,
                               'browse'       => 0,
                               'read'         => 0,
                               'edit'         => 0,
                               'add'          => 0,
                               'delete'       => 0,
                               'details'      => '',
                           ])->save();
        }

        $dataRow = $this->dataRow($establishmentsDataType, 'deleted_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                               'type'         => 'timestamp',
                               'display_name' => 'updated_at',
                               'required'     => 0,
                               'browse'       => 0,
                               'read'         => 0,
                               'edit'         => 0,
                               'add'          => 0,
                               'delete'       => 0,
                               'details'      => '',
                           ])->save();
        }
    }

    public function seedMenuItemsTable()
    {
        if (file_exists(base_path('routes/web.php'))) {
            require base_path('routes/web.php');

            $menu = Menu::where('name', 'admin')->firstOrFail();
            $menuItem = MenuItem::firstOrNew([
                                                 'menu_id' => $menu->id,
                                                 'title'   => 'Establishments',
                                                 'url'     => route('voyager.establishments.index', [], false),
                                             ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                                    'target'     => '_self',
                                    'icon_class' => 'voyager-company',
                                    'color'      => null,
                                    'parent_id'  => null,
                                    'order'      => 7,
                                ])->save();
            }
        }
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }

    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
                                       'data_type_id' => $type->id,
                                       'field'        => $field,
                                   ]);
    }
}
