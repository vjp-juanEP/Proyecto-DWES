<?php 
    require_once 'entities/database/IEntity.class.php';

    class Categoria implements IEntity{
        private $id;
        private $nombre;
        private $numImg;

        public function __construct(string $nombre = "", int $numImg = 0 )
        {
            $this->nombre = $nombre;
            $this->numImg = $numImg;
        }

        //Setters
        public function setId( $id): void {$this->id = $id;}

        public function setNombre( $nombre): void {$this->nombre = $nombre;}

        public function setNumImg( $numImg): void {$this->numImg = $numImg;}

        //Getters
        public function getId() : int {return $this->id;}

        public function getNombre() : string {return $this->nombre;}

        public function getNumImg() : int {return $this->numImg;}

        public function toArray(): array
        {
            return [
                'id' => $this->getId(),
                'nombre' => $this->getnombre(),
                'numImg' => $this->getnumImg()
            ];
        }
    }
    
?>