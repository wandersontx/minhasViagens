<?php 
use Controller\Service\Service;
$service = new Service;
$dados = $service->findAll();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Meus lugares</title>
		<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	

	<script src="/View/jquery.mask.min.js"></script>
	<script src="/View/eventos.js"></script>
</head>
<body style="margin: 40px;">
 
 <div class="container">
 <h2 class="text-success display-3 text-sm-center">Meus Locais</h2>	
 <table class="table table-hover"> 
 	<tr>
 		<a href="/cadastro" class="btn btn-primary mb-1">Novo</a>
 	</tr>	
 	<tr>
 		<th>Data</th>
 		<th>UF</th>
 		<th>Nome</th>
 		<th>Ações</th>
 	</tr>
 	<? foreach ($dados as $key => $value) { ?> 	
 	<tr>
		<td><?php
				$date = new DateTime($value["data"]);
				$data = $date->format('d-m-Y'); 
				echo str_replace("-", "/", $data);
			?>			
		</td>
		<td><?= $value["uf"] ?></td>
		<td><?= $value["nome"] ?></td>
		<td>
			<a href="/cadastro?acao=editar&id=<?= $value['id'] ?>" class="btn btn-info">Atualizar</a>

			<button value="<?= $value['id'] ?>" class="btn btn-outline-danger remove">Remover</button>
		</td>
 	</tr>
 	<? } ?>
 </table>
</div>

<div class="modal" tabindex="-1" id="modal_remover">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="modal_title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="modal_body"></p>
      </div>
      <div class="modal-footer">
        <a href="/" class="btn btn-info" data-dismiss="modal">Não</a>
        <a id="btn_remove" class="btn btn-outline-danger btn-sm">Sim</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>