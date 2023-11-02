<?php
include_once "./app/conexao/Conexao.php";
include_once "./app/dao/UsuarioDAO.php";
include_once "./app/model/Usuario.php";

//instancia as classes
$usuario = new Usuario();
$usuariodao = new UsuarioDAO();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>CRUD</title>
    <style>
        .menu,
        thead {
            background-color: #bbb !important;
        }

        .row {
            padding: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light menu">
        <div class="container">
            <a class="navbar-brand" href="#">
                CRUD ALUNOS
            </a>
        </div>
    </nav>
    <div class="container">
        <form action="app/controller/UsuarioController.php" method="POST">
            <div class="row">
                <div class="col-md-5">
                    <label>Nome</label>
                    <input type="text" name="nome" value="" autofocus class="form-control" require />
                </div>
                <div class="col-md-2">
                    <label>Idade</label>
                    <input type="number" name="idade" value="" class="form-control" require />
                </div>
                <div class="col-md-2">
                    <label>Nota 1º Sem</label>
                    <input type="text" name="nota1" value="" class="form-control" require />
                </div>
                <div class="col-md-2">
                    <label>Nota 2º Sem</label>
                    <input type="text" name="nota2" value="" class="form-control" require />
                </div>
                <div class="col-md-5">
                    <label>Nome do Professor</label>
                    <input type="text" name="nomeProfessor" value="" class="form-control" require />
                </div>
                <div class="col-md-2">
                    <label>Numero da sala</label>
                    <input type="text" name="numeroSala" value="" class="form-control" require />
                </div>
                <div class="col-md-2">
                    <br>
                    <button class="btn btn-primary" type="submit" name="cadastrar">Cadastrar</button>
                </div>
            </div>
        </form>
        <hr>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>nota1</th>                       
                        <th>nota2</th>
                        <th>Professor</th>
                        <th>Sala</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuariodao->read() as $usuario) : ?>
                        <tr>
                            <td><?= $usuario->getId() ?></td>
                            <td><?= $usuario->getNome() ?></td>
                            <td><?= $usuario->getIdade() ?></td>
                            <td><?= $usuario->getNota1() ?></td>                      
                            <td><?= $usuario->getNota2()?></td>
                            <td><?= $usuario->getNomeProfessor()?></td>
                            <td><?= $usuario->getNumeroSala()?></td>
                            <td class="text-center">
                                <button class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#editar><?= $usuario->getId() ?>">
                                    Editar
                                </button>
                                <a href="app/controller/UsuarioController.php?del=<?= $usuario->getId() ?>">
                                <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                                </a>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="editar><?= $usuario->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="app/controller/UsuarioController.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>Nome</label>
                                                    <input type="text" name="nome" value="<?= $usuario->getNome() ?>" class="form-control" require />
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Idade</label>
                                                    <input type="number" name="idade" value="<?= $usuario->getIdade() ?>" class="form-control" require />
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                            <div class="col-md-3">
                                                    <label>nota1</label>
                                                    <input type="text" name="nota1" value="<?= $usuario->getNota1() ?>" class="form-control" require />
                                                </div>
                                                <div class="col-md-3">
                                                    <label>nota2</label>
                                                    <input type="text" name="nota2" value="<?= $usuario->getNota2() ?>" class="form-control" require />
                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-3">
                                                    <label>Professor</label>
                                                    <input type="text" name="nomeProfessor" value="<?= $usuario->getNomeProfessor() ?>" class="form-control" require />
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Sala</label>
                                                    <input type="text" name="numeroSala" value="<?= $usuario->getNumeroSala() ?>" class="form-control" require />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <br>
                                                    <input type="hidden" name="id" value="<?= $usuario->getId() ?>" />
                                                    <button class="btn btn-primary" type="submit" name="editar">Cadastrar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>