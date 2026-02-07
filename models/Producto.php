<?php
require_once __DIR__ . '/../config/Database.php';

class Producto {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function all() {
        return $this->db->query("SELECT * FROM productos");
    }

    public function find($id) {
        return $this->db->query("SELECT * FROM productos WHERE id=$id")->fetch_object();
    }

    public function create($data) {
        $stmt = $this->db->prepare(
            "INSERT INTO productos(nombre, descripcion, precio, stock) VALUES (?,?,?,?)"
        );
        $stmt->bind_param("ssdi", $data['nombre'], $data['descripcion'], $data['precio'], $data['stock']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare(
            "UPDATE productos SET nombre=?, descripcion=?, precio=?, stock=? WHERE id=?"
        );
        $stmt->bind_param("ssdii", $data['nombre'], $data['descripcion'], $data['precio'], $data['stock'], $id);
        return $stmt->execute();
    }

    public function delete($id) {
        return $this->db->query("DELETE FROM productos WHERE id=$id");
    }
}
