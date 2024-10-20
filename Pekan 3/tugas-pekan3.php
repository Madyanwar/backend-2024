<?php

class Animal {
    // Property animals
    public $animals;

    // Constructor untuk mengisi data awal animals
    public function __construct() {
        $this->animals = ['Kucing Anggora', 'Ayam', 'Ikan'];
    }

    // Method index: Menampilkan seluruh data animals
    public function index() {
        foreach ($this->animals as $key => $animal) {
            echo ($key+1) . ". " . $animal . PHP_EOL;
        }
    }

    // Method store: Menambahkan hewan baru
    public function store($newAnimal) {
        array_push($this->animals, $newAnimal);
        echo "$newAnimal berhasil ditambahkan." . PHP_EOL;
    }

    // Method update: Memperbarui data hewan
    public function update($index, $newAnimal) {
        if (isset($this->animals[$index])) {
            $this->animals[$index] = $newAnimal;
            echo "Data hewan berhasil diperbarui." . PHP_EOL;
        } else {
            echo "Hewan tidak ditemukan." . PHP_EOL;
        }
    }

    // Method destroy: Menghapus data hewan
    public function destroy($index) {
        if (isset($this->animals[$index])) {
            unset($this->animals[$index]);
            // Mengatur ulang indeks array setelah dihapus
            $this->animals = array_values($this->animals);
            echo "Hewan berhasil dihapus." . PHP_EOL;
        } else {
            echo "Hewan tidak ditemukan." . PHP_EOL;
        }
    }
}

// Contoh penggunaan class
$animal = new Animal();

echo "Menampilkan dataa seluruh hewan " . PHP_EOL;
$animal->index();
echo PHP_EOL;

echo "Store - Menambahkan hewan baru " . PHP_EOL;
$animal->store('burung');
$animal->index();
echo  PHP_EOL;

echo "Update - Mengupdate hewan " . PHP_EOL;
$animal->update(0, 'Kucing Anggora');
$animal->index();
echo PHP_EOL;

echo "Destroy - Menghapus hewan ". PHP_EOL;
$animal->destroy(1);
$animal->index();
echo PHP_EOL;

?>
