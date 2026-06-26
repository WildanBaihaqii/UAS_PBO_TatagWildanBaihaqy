<?php

abstract class Mahasiswa {
    protected int $id_mahasiswa;
    protected string $nama_mahasiswa;
    protected string $nim;
    protected int $semester;
    protected float $tarifUktNominal;

    public function __construct(int $id_mahasiswa, string $nama_mahasiswa, string $nim, int $semester, float $tarifUktNominal) {
        $this->id_mahasiswa = $id_mahasiswa;
        $this->nama_mahasiswa = $nama_mahasiswa;
        $this->nim = $nim;
        $this->semester = $semester;
        $this->tarifUktNominal = $tarifUktNominal;
    }

    public function getIdMahasiswa(): int {
        return $this->id_mahasiswa;
    }

    public function getNamaMahasiswa(): string {
        return $this->nama_mahasiswa;
    }

    public function getNim(): string {
        return $this->nim;
    }

    public function getSemester(): int {
        return $this->semester;
    }

    public function getTarifUktNominal(): float {
        return $this->tarifUktNominal;
    }

    abstract public function hitungTagihanSemester(): void;
    abstract public function tampilkanSpesifikasiAkademik(): void;
}