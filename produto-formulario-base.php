				<td><input class="form-control" type="text" name="nome" value="<?=  htmlentities($produto->getNome(), ENT_QUOTES); ?>"></td>
			</tr>
			<tr>
				<td>Tipo</td>
				<td>
					<select class="form-control" name="tipoProduto">
						<?php	$tipos = array("LivroFisico", "Ebook");
							foreach($tipos as $tipo) :
								$seleciona = get_class($produto) == $tipo ? "selected='selected'" : "";

								if($tipo == "LivroFisico") : ?>
										<optgroup label="Livros">
								<?php endif;

								$tipo == "LivroFisico" ? $mostra = "Livro Físico" : $mostra = $tipo; ?>
								<option value="<?= $tipo ?>" <?= $seleciona ?>>	<?= $mostra ?> </option>

								<?php if($tipo == "Ebook") : ?>
										</optgroup>
								<?php endif; ?>

							<?php	endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>ISBN</td>
				<td>
					<input class="form-control" type="text" value="<?= $produto->isLivro() ? $produto->getIsbn() : ""; ?>" name="isbn">
				</td>
			</tr>
			<tr>
				<td>Taxa de Impressão</td>
				<td><input class="form-control" type="number" name="taxaImpressao" value="<?= $produto->isLivroFisico() ? $produto->getTaxaImpressao() : ""?>"></td>
			</tr>
			<tr>
				<td>Marca d'água</td>
				<td><input class="form-control" type="number" name="waterMark" value="<?= $produto->isEbook() ? $produto->getWaterMark() : ""?>"></td>
			</tr>
			<tr>
				<td>Preço</td>
				<td><input class="form-control" type="number" name="preco" value=<?= $produto->getPreco() ?>></td>
			</tr>
			<tr>
				<td>Descrição</td>
				<td><textarea name="descricao" class="form_control"><?= $produto->getDescricao() ?></textarea></td>
			</tr>
			<tr>
				<td>Situação</td>
				<?php $produtoUsado = $produto->getUsado() == 1 ? "checked" : ""; ?>
				<td>
					<input type="checkbox" name="usado" value="true" <?=$produtoUsado?>>Usado
				</td>
			</tr>
			<tr>
				<td>Categorias</td>
				<td>
