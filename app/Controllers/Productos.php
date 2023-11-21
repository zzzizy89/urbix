<?php 
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Models\Producto;
use App\Models\Tipo;
class Productos extends Controller{

    public function index()
    {
        $user = session('user');
    
        if (!$user || $user->id_user < 1) {
            // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
            return redirect()->to('/login');
        }
    
        // El usuario ha iniciado sesión, verificar su rol
        $rol = $user->rol;
    
        if ($rol == 1) {
            // Si el usuario tiene rol 1, cargar la vista listar
            $producto = new Producto();
    
            // Obtener los productos con la información del tipo asociado
            $productos = $producto->productotipo();
    
            $datos['productos'] = $productos;
            $datos['cabecera'] = view('templates/cabecera');
            $datos['pie'] = view('templates/piepagina');
    
            return view('main/crud/listar', $datos);
        } else {
            // Si el usuario no tiene rol 1, redirigir a la página dashboard
            return redirect()->to('/dashboard');
        }
    }
    

    public function crear()
    {
        // Instanciar el modelo de Tipo para obtener los tipos de productos disponibles
        $tipoModel = new Tipo();
        $datos['tipos'] = $tipoModel->tipoprod();
    
        // Preparar los datos necesarios para la vista
        $datos['cabecera'] = view('templates/cabecera');
        $datos['pie'] = view('templates/piepagina');
    
        // Cargar la vista de creación de producto con la información necesaria
        return view('main/crud/crear', $datos);
    }
    
        

    public function guardar()
    {
        // Instanciar el modelo Producto
        $producto = new Producto();
    
        // Validar los datos del formulario
        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]|max_length[255]',
            'precio' => 'required|numeric',
            'descripcion_prod' => 'required|min_length[3]|max_length[255]',
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,9320]',
            ],
        ]);
    
        // Verificar si la validación falla
        if (!$validacion) {
            // Establecer un mensaje de flash y redirigir de nuevo con los datos del formulario
            $session = session();
            $session->setFlashdata('mensaje', 'Verifique la información del formulario');
            return redirect()->back()->withInput();
        }
    
        // Procesar la imagen
        if ($imagen = $this->request->getFile('imagen')) {
            // Generar un nombre único para la imagen
            $nuevoNombre = $imagen->getRandomName();
            // Mover la imagen al directorio 'uploads'
            $imagen->move('uploads', $nuevoNombre);
    
            // Obtener la ID del tipo de producto seleccionado
            $tipoProductoID = $this->request->getVar('tipoprod');
    
            // Crear un array con los datos del producto
            $datos = [
                'nombre' => $this->request->getVar('nombre'),
                'precio' => $this->request->getVar('precio'),
                'descripcion_prod' => $this->request->getVar('descripcion_prod'),
                'imagen' => $nuevoNombre,
                'id_tipoprod' => $tipoProductoID,
            ];
    
            // Insertar el producto en la base de datos
            $producto->insertproducto($datos);
        }
    
        // Redirigir a la página de listar productos
        return redirect()->to(site_url('/listar'));
    }
    

    public function eliminar($id=null){

        $producto = new Producto();
        $datosProducto = $producto->obteneriddelete($id);

       if ($datosProducto) {
        $ruta = ('uploads/'.$datosProducto['imagen']);
        unlink($ruta);

        return $this->response->redirect(site_url('/listar'));
    }
}


    /**
 * Función para cargar la vista de edición de un producto.
 *
 * @param int|null $id - ID del producto a editar.
 * @return mixed
 */
public function editar($id = null)
{
    $producto = new Producto();
    $tipo = new Tipo();

    // Obtener información del producto por su ID
    $datos['producto'] = $producto->obtenerid($id);

    // Obtener la lista de tipos de productos
    $datos['tipos'] = $tipo->tipoprod();

    $datos['cabecera'] = view('templates/cabecera');
    $datos['pie'] = view('templates/piepagina');

    // Cargar la vista de edición con la información del producto
    return view('main/crud/editar', $datos);
}


  /**
 * Función para actualizar la información de un producto.
 *
 * @return mixed
 */
public function actualizar()
{
    $tipoProductoID = $this->request->getVar('tipoprod'); // Obtener la ID del tipo de producto seleccionado

    $producto = new Producto();
    $datos = [
        'nombre' => $nombre = $this->request->getVar('nombre'),
        'precio' => $nombre = $this->request->getVar('precio'),
        'descripcion_prod' => $nombre = $this->request->getVar('descripcion_prod'),
        'id_tipoprod' => $tipoProductoID // Actualizar la ID del tipo de producto
    ];
    $id = $this->request->getVar('id_producto');

    // Validar los campos del formulario
    $validacion = $this->validate([
        'nombre' => 'required|min_length[3]|max_length[255]',
        'precio' => 'required|numeric',
        'tipoprod' => 'required|numeric',
        'descripcion_prod' => 'required|min_length[3]|max_length[255]',
    ]);

    if (!$validacion) {
        $session = session();
        $session->setFlashdata('mensaje', 'Verifique la información del formulario');
        return redirect()->back()->withInput();
    }

    // Actualizar la información del producto en la base de datos
    $producto->updateprod($id, $datos);

    // Validar la imagen y actualizar si se proporciona una nueva
    $validacionImagen = $this->validate([
        'imagen' => [
            'uploaded[imagen]',
            'mime_in[imagen,image/jpg,image/jpeg,image/png]',
            'max_size[imagen,9320]',
        ],
    ]);

    if ($validacionImagen) {
        if ($imagen = $this->request->getFile('imagen')) {

            // Obtener la información actual del producto
            $datosProducto = $producto->obtenerid($id);

            // Eliminar la imagen anterior
            $ruta = ('uploads/' . $datosProducto['imagen']);
            unlink($ruta);

            // Mover la nueva imagen al directorio de uploads
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('uploads/', $nuevoNombre);

            // Actualizar el registro en la base de datos con el nuevo nombre de la imagen
            $datos = ['imagen' => $nuevoNombre];
            $producto->updateprod($datos, $id);
        }
    }

    // Redirigir a la lista de productos después de la actualización
    return $this->response->redirect(site_url('/listar'));
}


    public function inicio(){

        return view('inicio/vista');
    }

    public function about(){

        return view('inicio/about');
    }

   /**
 * Función para mostrar el catálogo de productos.
 *
 * @return mixed
 */
public function catalogo()
{
    $producto = new Producto();
    $productos = $producto->productotipo();

    $datos['productos'] = $productos;

    return view('main/catalogo/catalogo', $datos);
}

/**
 * Función para mostrar la descripción de un producto.
 *
 * @return mixed
 */
public function desc_producto()
{
    $producto = new Producto();
    $productos = $producto->productotipo();

    $datos['productos'] = $productos;
    
    return view('main/catalogo/desc_producto', $datos);
}

    
    
}
 
