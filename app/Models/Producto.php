<?php 
namespace App\Models;

use CodeIgniter\Model;

class Producto extends Model{
    protected $table      = 'productos';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_producto';
     protected $allowedFields = ['nombre','precio','imagen','descripcion_prod','id_tipoprod'];

     public function productotipo()

    {
        // Realiza una unión con la tabla 'tipo'
        $this->join('tipo', 'productos.id_tipoprod = tipo.id_tipoprod');

        // Ordena por el id del producto de forma ascendente
        $this->orderBy('productos.id_producto', 'ASC');

        // Obtiene todos los resultados
        return $this->findAll();
    }
public function insertproducto($datos)
{
    $this->insert($datos);
}
public function obteneriddelete($id)
{
    $datosProducto = $this->find($id);

    if ($datosProducto) {
        $this->where('id_producto', $id)->delete();
        $this->db->table('carrito')->where('id_producto', $id)->delete();
    }

    return $datosProducto;
}

public function obtenerid($id)
{
    $datosProducto = $this->find($id);

     $this->where('id_producto', $id)->first();
     return $datosProducto;

}
public function updateprod($datos,$id)
{
    $this->update($id, $datos);
}
public function obtenertodoslosprod()
{
    return $this->orderBy('id_producto', 'ASC')->findAll();
}
/*public function obtenerPrecioPorId($id_producto)
    {
        // Obtén el precio del producto por su ID
        return $this->select('precio')->where('id_producto', $id_producto)->first();
    }
    */
    public function obtenerProductoPorId($id_producto)
    {
        return $this->find($id_producto);
    }
    public function obtenerProductosPorTipo($idTipo)
{
    if ($idTipo) {
        return $this->where('id_tipoprod', $idTipo)->orderBy('id_producto', 'ASC')->findAll();
    } else {
        return $this->orderBy('id_producto', 'ASC')->findAll();
    }
}

}