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
         // USUARIOS
        Permission::create([
            'name'=>'Navegar usuarios',
            'slug'=>'users.index',
            'description'=>'lista y navega todos los usuarios del sistema',
        ]);

        Permission::create([
            'name'=>'Ver detalle de usuarios',
            'slug'=>'users.show',
            'description'=>'ver en detalle cada usuarios del sistema',
        ]);
        
        Permission::create([
            'name'=>'Creación de usuarios',
            'slug'=>'users.create',
            'description'=>'Podría crear nuevos usuarios en el sistema',
        ]);
        Permission::create([
            'name'=>'Edicion de usuarios',
            'slug'=>'users.edit',
            'description'=>'Editar cualquier dato de usuarios del sistema',
        ]);

        Permission::create([
            'name'=>'eliminar usuarios',
            'slug'=>'users.destroy',
            'description'=>'Eliminar cualquier dato de usuarios del sistema',
        ]);
        // categories
        Permission::create([
            'name'=>'Navegar categorías',
            'slug'=>'categories.index',
            'description'=>'lista y navega todos los categorías del sistema',
        ]);

        Permission::create([
            'name'=>'Ver detalle de categorías',
            'slug'=>'categories.show',
            'description'=>'ver en detalle cada categorías del sistema',
        ]);
        
        Permission::create([
            'name'=>'Creación de categorías',
            'slug'=>'categories.create',
            'description'=>'Podría crear nuevos categorías en el sistema',
        ]);
        Permission::create([
            'name'=>'Edicion de categorías',
            'slug'=>'categories.edit',
            'description'=>'Editar cualquier dato de categorías del sistema',
        ]);

        Permission::create([
            'name'=>'eliminar categorías',
            'slug'=>'categories.destroy',
            'description'=>'Eliminar cualquier dato de categorías del sistema',
        ]);
        // tags
        Permission::create([
            'name'=>'Navegar etiquetas',
            'slug'=>'tags.index',
            'description'=>'lista y navega todos los etiquetas del sistema',
        ]);

        Permission::create([
            'name'=>'Ver detalle de etiquetas',
            'slug'=>'tags.show',
            'description'=>'ver en detalle cada etiquetas del sistema',
        ]);
        
        Permission::create([
            'name'=>'Creación de etiquetas',
            'slug'=>'tags.create',
            'description'=>'Podría crear nuevos etiquetas en el sistema',
        ]);
        Permission::create([
            'name'=>'Edicion de etiquetas',
            'slug'=>'tags.edit',
            'description'=>'Editar cualquier dato de etiquetas del sistema',
        ]);

        Permission::create([
            'name'=>'eliminar etiquetas',
            'slug'=>'tags.destroy',
            'description'=>'Eliminar cualquier dato de etiquetas del sistema',
        ]);
        //roles 
        Permission::create([
            'name'=>'Navegar roles',
            'slug'=>'roles.index',
            'description'=>'lista y navega todos los rol del sistema',
        ]);

        Permission::create([
            'name'=>'Ver detalle de roles',
            'slug'=>'roles.show',
            'description'=>'ver en detalle cada rol del sistema',
        ]);

        Permission::create([
            'name'=>'Creacion de roles',
            'slug'=>'roles.create',
            'description'=>'Editar cualquier dato de rol del sistema',
        ]);

        Permission::create([
            'name'=>'Edicion de roles',
            'slug'=>'roles.edit',
            'description'=>'Editar cualquier dato de rol del sistema',
        ]);

        Permission::create([
            'name'=>'eliminar roles',
            'slug'=>'roles.destroy',
            'description'=>'Eliminar cualquier dato de rol del sistema',
        ]);
        //SUBCATEGORIAS 
        Permission::create([
            'name'=>'Navegar subcategorías',
            'slug'=>'subcategories.index',
            'description'=>'lista y navega todos los subcategoría del sistema',
        ]);
        Permission::create([
            'name'=>'Ver detalle de subcategorías',
            'slug'=>'subcategories.show',
            'description'=>'ver en detalle cada subcategoría del sistema',
        ]);
        Permission::create([
            'name'=>'Creacion de subcategorías',
            'slug'=>'subcategories.create',
            'description'=>'Editar cualquier dato de subcategoría del sistema',
        ]);
        Permission::create([
            'name'=>'Edicion de subcategorías',
            'slug'=>'subcategories.edit',
            'description'=>'Editar cualquier dato de subcategoría del sistema',
        ]);
        Permission::create([
            'name'=>'eliminar subcategorías',
            'slug'=>'subcategories.destroy',
            'description'=>'Eliminar cualquier dato de subcategoría del sistema',
        ]);
        //ARTICULOS 
        
        Permission::create([
            'name'=>'Navegar en todos artículos',
            'slug'=>'articles.all',
            'description'=>'lista y navega todos (all) los articulos del sistema',
        ]);
        Permission::create([
            'name'=>'Navegar artículos pendientes',
            'slug'=>'articles.pending',
            'description'=>'lista y navega todos los articulos pendientes del sistema',
        ]);

        Permission::create([
            'name'=>'Navegar artículos',
            'slug'=>'articles.index',
            'description'=>'lista y navega todos los articulos del sistema',
        ]);
        Permission::create([
            'name'=>'Ver detalle de artículos',
            'slug'=>'articles.show',
            'description'=>'ver en detalle cada articulo del sistema',
        ]);
        Permission::create([
            'name'=>'Creacion de artículos',
            'slug'=>'articles.create',
            'description'=>'Editar cualquier dato de articulo del sistema',
        ]);
        Permission::create([
            'name'=>'Edicion de artículos',
            'slug'=>'articles.edit',
            'description'=>'Editar cualquier dato de articulo del sistema',
        ]);
        Permission::create([
            'name'=>'eliminar artículos',
            'slug'=>'articles.destroy',
            'description'=>'Eliminar cualquier dato de articulo del sistema',
        ]);
        //COVER 
        Permission::create([
            'name'=>'Navegar publicidades',
            'slug'=>'covers.index',
            'description'=>'lista y navega todos los publicidades del sistema',
        ]);
        Permission::create([
            'name'=>'Ver detalle de publicidades',
            'slug'=>'covers.show',
            'description'=>'ver en detalle cada publicidad del sistema',
        ]);
        Permission::create([
            'name'=>'Creacion de publicidades',
            'slug'=>'covers.create',
            'description'=>'Editar cualquier dato de publicidad del sistema',
        ]);
        Permission::create([
            'name'=>'Edicion de publicidades',
            'slug'=>'covers.edit',
            'description'=>'Editar cualquier dato de publicidad del sistema',
        ]);
        Permission::create([
            'name'=>'eliminar publicidades',
            'slug'=>'covers.destroy',
            'description'=>'Eliminar cualquier dato de publicidad del sistema',
        ]);
        //redes sociales 
        Permission::create([
            'name'=>'Navegar redes sociales',
            'slug'=>'socials.index',
            'description'=>'lista y navega todos los redes sociales del sistema',
        ]);
        Permission::create([
            'name'=>'Ver detalle de redes sociales',
            'slug'=>'socials.show',
            'description'=>'ver en detalle cada red social del sistema',
        ]);
        Permission::create([
            'name'=>'Creacion de redes sociales',
            'slug'=>'socials.create',
            'description'=>'Editar cualquier dato de red social del sistema',
        ]);
        Permission::create([
            'name'=>'Edicion de redes sociales',
            'slug'=>'socials.edit',
            'description'=>'Editar cualquier dato de red social del sistema',
        ]);
        Permission::create([
            'name'=>'eliminar redes sociales',
            'slug'=>'socials.destroy',
            'description'=>'Eliminar cualquier dato de red social del sistema',
        ]);
         //links 
         Permission::create([
            'name'=>'Navegar enlaces',
            'slug'=>'links.index',
            'description'=>'lista y navega todos los enlaces del sistema',
        ]);
        Permission::create([
            'name'=>'Ver detalle de enlaces',
            'slug'=>'links.show',
            'description'=>'ver en detalle cada enlace del sistema',
        ]);
        Permission::create([
            'name'=>'Creacion de enlaces',
            'slug'=>'links.create',
            'description'=>'Editar cualquier dato de enlace del sistema',
        ]);
        Permission::create([
            'name'=>'Edicion de enlaces',
            'slug'=>'links.edit',
            'description'=>'Editar cualquier dato de enlace del sistema',
        ]);
        Permission::create([
            'name'=>'eliminar enlaces',
            'slug'=>'links.destroy',
            'description'=>'Eliminar cualquier dato de enlace del sistema',
        ]);
        //donaciones 
        Permission::create([
            'name'=>'Navegar donaciones',
            'slug'=>'donations.index',
            'description'=>'lista y navega todos los donaciones del sistema',
        ]);
        Permission::create([
            'name'=>'Ver detalle de donaciones',
            'slug'=>'donations.show',
            'description'=>'ver en detalle cada donación del sistema',
        ]);
        Permission::create([
            'name'=>'Creacion de donaciones',
            'slug'=>'donations.create',
            'description'=>'Editar cualquier dato de donación del sistema',
        ]);
        Permission::create([
            'name'=>'Edicion de donaciones',
            'slug'=>'donations.edit',
            'description'=>'Editar cualquier dato de donación del sistema',
        ]);
        Permission::create([
            'name'=>'eliminar donaciones',
            'slug'=>'donations.destroy',
            'description'=>'Eliminar cualquier dato de donación del sistema',
        ]);
    }
}
