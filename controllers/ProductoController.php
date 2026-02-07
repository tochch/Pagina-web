<?php
require_once __DIR__ . '/../models/Producto.php';

class ProductoController {
    private $model;

    public function __construct() {
        $this->model = new Producto();
    }

    public function index() {
        $productos = $this->model->all();
        require_once __DIR__ . '/../views/productos/index.php';
    }

    public function create() {
        $errors = [];
        require_once __DIR__ . '/../views/productos/create.php';
    }

    public function store() {
        $errors = $this->validar($_POST);

        if (!empty($errors)) {
            require_once __DIR__ . '/../views/productos/create.php';
            return;
        }

        $this->model->create($_POST);
        header("Location: index.php?controller=producto&action=index");
    }

    public function edit() {
        $producto = $this->model->find($_GET['id']);
        $errors = [];
        require_once __DIR__ . '/../views/productos/edit.php';
    }

    public function update() {
        $errors = $this->validar($_POST);

        if (!empty($errors)) {
            $producto = (object) $_POST;
            $producto->id = $_GET['id'];
            require_once __DIR__ . '/../views/productos/edit.php';
            return;
        }

        $this->model->update($_GET['id'], $_POST);
        header("Location: index.php?controller=producto&action=index");
    }

    public function delete() {
        $producto = $this->model->find($_GET['id']);
        require_once __DIR__ . '/../views/productos/delete.php';
    }

    public function destroy() {
        $this->model->delete($_GET['id']);
        header("Location: index.php?controller=producto&action=index");
    }

    private function validar($data) {
        $errors = [];

        if (strlen($data['nombre']) < 3)
            $errors[] = "Nombre mínimo 3 caracteres";

        if ($data['precio'] <= 0)
            $errors[] = "Precio debe ser mayor a 0";

        if (!is_numeric($data['stock']) || $data['stock'] < 0)
            $errors[] = "Stock inválido";

        return $errors;
    }
}
