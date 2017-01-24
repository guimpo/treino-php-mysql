				<td><input class="form-control" type="text" name="nome" value="<?=  htmlentities($produto->getNome(), ENT_QUOTES); ?>"></td>
			</tr>
			<tr>
				<td>Tipo</td>
				<td>
					<select class="form-control" name="tipo">
						<?php
							$tipos = array("Livro", "Produto");
							foreach($tipos as $tipo) :
								$tipo_do_produto = get_class($produto) == $tipo;
								$seleciona = $tipo_do_produto ? "selected='selected'" : "";
						?>
								<option value="<?= $tipo ?>" <?= $seleciona ?>>
									<?= $tipo ?>
								</option>
						<?php
							endforeach
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>ISBN</td>
				<td>
					<input type="text" class="form-control" value="<?= $produto->isLivro() ? $produto->getIsbn() : ""; ?>">
				</td>
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
