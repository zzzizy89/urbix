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
    return view('main/crud/editar',$datos);
}


  /**
 * Función para actualizar la información de un producto.
 *
 * @return mixed
 */
public function actualizar()
{
    $tipoProductoID = $this->request->getVar('tipoprod');

    $producto = new Producto();
    $datos = [
        'nombre' => $this->request->getVar('nombre'),
        'precio' => $this->request->getVar('precio'),
        'descripcion_prod' => $this->request->getVar('descripcion_prod'),
        'id_tipoprod' => $tipoProductoID
    ];
    $id = $this->request->getVar('id_producto');

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

    $producto->updateprod($datos, $id);

    if ($this->request->getFile('imagen')->isValid()) {
        $datosProducto = $producto->obtenerid($id);
        $ruta = ('uploads/' . $datosProducto['imagen']);
        if (file_exists($ruta)) {
            unlink($ruta);
        }

        $imagen = $this->request->getFile('imagen');
        $nuevoNombre = $imagen->getRandomName();
        $imagen->move('uploads/', $nuevoNombre);

        $datos = ['imagen' => $nuevoNombre];
        $producto->updateprod($datos, $id);
    }

    return redirect()->to(site_url('/listar'));
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

    
}
 
