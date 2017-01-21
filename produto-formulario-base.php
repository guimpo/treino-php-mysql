				<td><input class="form-control" type="text" name="nome" value="<?=  htmlentities($produto->getNome(), ENT_QUOTES); ?>"></td>
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
