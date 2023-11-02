<?php

class Usuario{
    
    private $id;
    private $nome;
    private $nota1;
     private $idade;
    private $nota2;
    private $nomeProfessor;
    private $numeroSala;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getIdade() {
        return $this->idade;
    }

    function getNota1() {
        return $this->nota1;
    }

    function getNota2() {
        return $this->nota2;
    }
    function getNomeProfessor() {
        return $this->nomeProfessor;
    }

    function getNumeroSala() {
        return $this->numeroSala;
    }


    

	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @param mixed $nome 
	 * @return self
	 */
	public function setNome($nome): self {
		$this->nome = $nome;
		return $this;
	}
	
	/**
	 * @param mixed $nota1 
	 * @return self
	 */
	public function setNota1($nota1): self {
		$this->nota1 = $nota1;
		return $this;
	}
	
	/**
	 * @param mixed $idade 
	 * @return self
	 */
	public function setIdade($idade): self {
		$this->idade = $idade;
		return $this;
	}
	
	/**
	 * @param mixed $nota2 
	 * @return self
	 */
	public function setNota2($nota2): self {
		$this->nota2 = $nota2;
		return $this;
	}
	
	/**
	 * @param mixed $nomeProfessor 
	 * @return self
	 */
	public function setNomeProfessor($nomeProfessor): self {
		$this->nomeProfessor = $nomeProfessor;
		return $this;
	}
	
	/**
	 * @param mixed $numeroSala 
	 * @return self
	 */
	public function setNumeroSala($numeroSala): self {
		$this->numeroSala = $numeroSala;
		return $this;
	}
}

