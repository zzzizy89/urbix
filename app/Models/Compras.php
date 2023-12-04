<?php 
namespace App\Models;

use CodeIgniter\Model;

class Compras extends Model{
    protected $table      = 'compras';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_compras';
     protected $allowedFields = ['id_user','id_metodo_pago','id_direccion_casa','total_c','fecha_compra'];

    protected $useTimestamps = false;
    protected $createdField = 'fecha_compra';

    public function insertCompra($id_user,$id_direccion,$totalCompra)
    {
        return $this->insert([
            'id_user' => $id_user,
            'id_metodo_pago' => 1, // ID del método de pago (ajusta según tus necesidades)
            'id_direccion_casa' => $id_direccion, // ID de la dirección (ajusta según tus necesidades)
            'total_c' => $totalCompra,
        ]);
    }
    public function controlcompras()
    {
        return $this->select('compras.fecha_compra AS fecha_compra,compras.total_c AS total_compra, u.email AS email_usuario,t.tipo AS tipo_prod, p.nombre AS nombre_producto, dc.cantidad, p.precio AS precio_unitario, (dc.cantidad * p.precio) AS subtotal')
            ->join('users u', 'compras.id_user = u.id_user')
            ->join('detalle_compra dc', 'compras.id_compras = dc.id_compras')
            ->join('productos p', 'dc.id_producto = p.id_producto')
            ->join('tipo t', 'p.id_tipoprod = t.id_tipoprod')
            ->get()
            ->getResult();
    }
    public function usercompras($id_user)
    {
        return $this->select('compras.fecha_compra AS fecha_compra,t.tipo AS tipo_prod, p.nombre AS nombre_producto, dc.cantidad, p.precio AS precio_unitario, (dc.cantidad * p.precio) AS subtotal')
            ->join('users u', 'compras.id_user = u.id_user')
            ->join('detalle_compra dc', 'compras.id_compras = dc.id_compras')
            ->join('productos p', 'dc.id_producto = p.id_producto')
            ->join('tipo t', 'p.id_tipoprod = t.id_tipoprod')
            ->where('u.id_user', $id_user)
            ->get()
            ->getResult();
    }
    

}