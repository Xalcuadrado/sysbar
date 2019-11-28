<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permisos de Users
        Permission::create([
        	'name'			=>'Navegar usuarios',
        	'slug'			=>'users.index',
        	'description'	=>'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
        	'name'			=>'Ver detalle de usuario',
        	'slug'			=>'users.show',
        	'description'	=>'Ver en detalle cada usuario del sistema',
        ]);
        Permission::create([
        	'name'			=>'Edición de usuario',
        	'slug'			=>'users.edit',
        	'description'	=>'Editar cualquier dato del usuario del sistema',
        ]);
        Permission::create([
        	'name'			=>'Eliminar usuario',
        	'slug'			=>'users.destroy',
        	'description'	=>'Eliminar cualquier usuario del sistema',
        ]);

        //Permisos de Roles
        Permission::create([
        	'name'			=>'Navegar roles',
        	'slug'			=>'roles.index',
        	'description'	=>'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
        	'name'			=>'Ver detalle de rol',
        	'slug'			=>'roles.show',
        	'description'	=>'Ver en detalle cada rol del sistema',
        ]);
        Permission::create([
        	'name'			=>'Creación de roles',
        	'slug'			=>'roles.create',
        	'description'	=>'Crear rol del sistema',
        ]);
        Permission::create([
        	'name'			=>'Edición de roles',
        	'slug'			=>'roles.edit',
        	'description'	=>'Editar cualquier dato del rol del sistema',
        ]);
        Permission::create([
        	'name'			=>'Eliminar rol',
        	'slug'			=>'roles.destroy',
        	'description'	=>'Eliminar cualquier rol del sistema',
        ]);

        //Permisos de Categorias
        Permission::create([
        	'name'			=>'Navegar categorias',
        	'slug'			=>'categorias.index',
        	'description'	=>'Lista y navega todos los categorias del sistema',
        ]);
        Permission::create([
        	'name'			=>'Ver detalle de categoría',
        	'slug'			=>'categorias.show',
        	'description'	=>'Ver en detalle cada categoría del sistema',
        ]);
        Permission::create([
        	'name'			=>'Creación de categorias',
        	'slug'			=>'categorias.create',
        	'description'	=>'Crear categoría del sistema',
        ]);
        Permission::create([
        	'name'			=>'Edición de categorias',
        	'slug'			=>'categorias.edit',
        	'description'	=>'Editar cualquier dato del categoría del sistema',
        ]);
        Permission::create([
        	'name'			=>'Eliminar categoría',
        	'slug'			=>'categorias.destroy',
        	'description'	=>'Eliminar cualquier categoría del sistema',
        ]);

        //Permisos de empresas
        Permission::create([
        	'name'			=>'Navegar empresas',
        	'slug'			=>'empresas.index',
        	'description'	=>'Lista y navega todos los empresas del sistema',
        ]);
        Permission::create([
        	'name'			=>'Ver detalle de empresa',
        	'slug'			=>'empresas.show',
        	'description'	=>'Ver en detalle cada empresa del sistema',
        ]);
        Permission::create([
        	'name'			=>'Creación de empresas',
        	'slug'			=>'empresas.create',
        	'description'	=>'Crear empresa del sistema',
        ]);
        Permission::create([
        	'name'			=>'Edición de empresas',
        	'slug'			=>'empresas.edit',
        	'description'	=>'Editar cualquier dato del empresa del sistema',
        ]);
        Permission::create([
        	'name'			=>'Eliminar empresa',
        	'slug'			=>'empresas.destroy',
        	'description'	=>'Eliminar cualquier empresa del sistema',
        ]);

        //Permisos de productos
        Permission::create([
        	'name'			=>'Navegar productos',
        	'slug'			=>'productos.index',
        	'description'	=>'Lista y navega todos los productos del sistema',
        ]);
        Permission::create([
        	'name'			=>'Ver detalle de producto',
        	'slug'			=>'productos.show',
        	'description'	=>'Ver en detalle cada producto del sistema',
        ]);
        Permission::create([
        	'name'			=>'Creación de productos',
        	'slug'			=>'productos.create',
        	'description'	=>'Crear producto del sistema',
        ]);
        Permission::create([
        	'name'			=>'Edición de productos',
        	'slug'			=>'productos.edit',
        	'description'	=>'Editar cualquier dato del producto del sistema',
        ]);
        Permission::create([
        	'name'			=>'Eliminar producto',
        	'slug'			=>'productos.destroy',
        	'description'	=>'Eliminar cualquier producto del sistema',
        ]);

        //Permisos de compras
        Permission::create([
        	'name'			=>'Navegar compras',
        	'slug'			=>'compras.index',
        	'description'	=>'Lista y navega todos los compras del sistema',
        ]);
        Permission::create([
        	'name'			=>'Ver detalle de compra',
        	'slug'			=>'compras.show',
        	'description'	=>'Ver en detalle cada compra del sistema',
        ]);
        Permission::create([
        	'name'			=>'Creación de compras',
        	'slug'			=>'compras.create',
        	'description'	=>'Crear compra del sistema',
        ]);
        Permission::create([
        	'name'			=>'Edición de compras',
        	'slug'			=>'compras.edit',
        	'description'	=>'Editar cualquier dato del compra del sistema',
        ]);
        Permission::create([
        	'name'			=>'Eliminar compra',
        	'slug'			=>'compras.destroy',
        	'description'	=>'Eliminar cualquier compra del sistema',
        ]);


        //Permisos de ingredientes
        Permission::create([
        	'name'			=>'Navegar ingredientes',
        	'slug'			=>'ingredientes.index',
        	'description'	=>'Lista y navega todos los ingredientes del sistema',
        ]);
        Permission::create([
        	'name'			=>'Ver detalle de ingrediente',
        	'slug'			=>'ingredientes.show',
        	'description'	=>'Ver en detalle cada ingrediente del sistema',
        ]);
        Permission::create([
        	'name'			=>'Creación de ingredientes',
        	'slug'			=>'ingredientes.create',
        	'description'	=>'Crear ingrediente del sistema',
        ]);
        Permission::create([
        	'name'			=>'Edición de ingredientes',
        	'slug'			=>'ingredientes.edit',
        	'description'	=>'Editar cualquier dato del ingrediente del sistema',
        ]);
        Permission::create([
        	'name'			=>'Eliminar ingrediente',
        	'slug'			=>'ingredientes.destroy',
        	'description'	=>'Eliminar cualquier ingrediente del sistema',
        ]);

        //Permisos de proveedores
        Permission::create([
        	'name'			=>'Navegar proveedores',
        	'slug'			=>'proveedores.index',
        	'description'	=>'Lista y navega todos los proveedores del sistema',
        ]);
        Permission::create([
        	'name'			=>'Ver detalle de proveedor',
        	'slug'			=>'proveedores.show',
        	'description'	=>'Ver en detalle cada proveedor del sistema',
        ]);
        Permission::create([
        	'name'			=>'Creación de proveedores',
        	'slug'			=>'proveedores.create',
        	'description'	=>'Crear proveedor del sistema',
        ]);
        Permission::create([
        	'name'			=>'Edición de proveedores',
        	'slug'			=>'proveedores.edit',
        	'description'	=>'Editar cualquier dato del proveedor del sistema',
        ]);
        Permission::create([
        	'name'			=>'Eliminar proveedor',
        	'slug'			=>'proveedores.destroy',
        	'description'	=>'Eliminar cualquier proveedor del sistema',
        ]);

        //permisos de proveedores
        Permission::create([
            'name'          =>'Navegar usuarios con permisos',
            'slug'          =>'asignar.index',
            'description'   =>'Gestiones de todos los usuarios vinculados a empresas',
        ]);

        //permisos ver pedidos
        Permission::create([
            'name'          =>'Navegar pedidos pendientes a evaluar',
            'slug'          =>'orders.index',
            'description'   =>'Lista de pedidos realizados y listos para ser gestionados',
        ]);
        Permission::create([
            'name'          =>'Navegar todos los pedidos',
            'slug'          =>'allorders.index',
            'description'   =>'Mostrar todos los pedidos',
        ]);
    }
}
