<?php

require_once 'Database.php';

class Utils
{
	public static function renderProductCards()
	{
		$db = new Database();
		$produtos = $db->read('produtos');
		$html = '';

		foreach ($produtos as $produto) {
			$whereImagem = 'produto_id = ' . $produto['id'];
			$imagens = $db->read('produtos_midia', 'arquivo', '', $whereImagem);
			$htmlCard = '<div class="column">
				<div class="card">
					<div class="card-image">
						<figure class="image is-16by9">
							<img src="images/'.$imagens[0]['arquivo'].'" alt="Placeholder image">
						</figure>
					</div>
					<div class="card-content">
						<div class="content">
							<h1>'.$produto['nome'].'</h1>
							<br>
							<span class="button is-rounded is-pulled-left">Valor: R$'.number_format($produto['valor'], 2, ',', '.').'</span>
							<button class="button is-success is-rounded is-pulled-right	"><span class="mdi mdi-cart-plus icon is-left"></span></button>
						</div>
					</div>
				</div>
			</div>';
			echo $htmlCard;
		}
	}
}