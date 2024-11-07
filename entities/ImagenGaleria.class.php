<?php
require_once 'database/IEntity.class.php';

class ImagenGaleria implements IEntity{
    //Constantes
    const RUTA_IMAGENES_PORTAFOLIOS = 'images/index/portfolio/';
    const RUTA_IMAGENES_GALLERY = 'images/index/gallery/';
    //Variables
    private $nombre;
    private $descripcion;
    private $numVisualizaciones;
    private $numLikes;
    private $numDownloads;

    /**
     * @var int
     */
    private $id;

    //Constructor
    public function __construct($nombre="",  $descripcion="",  $numVisualizaciones = 0,  $numLikes = 0 ,  $numDownloads = 0)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
        $this->id= null;
    }

    //Setters
    public function setNombre( $nombre): void 
    {
        $this->nombre = $nombre;
    }

	public function setDescripcion( $descripcion): void 
    {
        $this->descripcion = $descripcion;
    }

	public function setNumVisualizaciones( $numVisualizaciones): void {
        $this->numVisualizaciones = $numVisualizaciones;
    }

	public function setNumLikes( $numLikes): void 
    {
        $this->numLikes = $numLikes;
    }

	public function setNumDownloads( $numDownloads): void 
    {
        $this->numDownloads = $numDownloads;
    }

    //Getter
    public function getId()
    {
        return $this->id;
    }
	public function getNombre() : string
    {
        return $this->nombre;
    }

	public function getDescripcion() : string
    {
        return $this->descripcion;
    }

	public function getNumVisualizaciones() : int
    {
        return $this->numVisualizaciones;
    }

	public function getNumLikes() : int
    {
        return $this->numLikes;
    }

	public function getNumDownloads() : int
    {
        return $this->numDownloads;
    }

	public function getUrlPortafolio():string{
        return self::RUTA_IMAGENES_PORTAFOLIOS.$this->getNombre();
    }

    public function getUrlGallery():string{
        return self::RUTA_IMAGENES_GALLERY.$this->getNombre();
    }

	public function toArray(): array
    {
        return[
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'descripcion' => $this->getDescripcion(),
            'numVisualizaciones' => $this->getNumVisualizaciones(),
            'numLikes' => $this->getNumLikes(),
            'numDownloads' => $this->getNumDownloads()
        ];
    }

}
?>