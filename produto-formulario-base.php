				<td><input class="form-control" type="text" name="nome" value="<?=  htmlentities($produto["nome"], ENT_QUOTES); ?>"></td>
			</tr>
			<tr>
				<td>Preço</td>
				<td><input class="form-control" type="number" name="preco" value=<?=$produto["preco"]?>></td>
			</tr>
			<tr>
				<td>Descrição</td>
				<td><textarea name="descricao" class="form_control"><?=$produto["descricao"]?></textarea></td>
			</tr>
			<tr>
				<td>Situação</td>
				<?php $produtoUsado = $produto["usado"] == 1 ? "checked" : ""; ?>
				<td>
					<input type="checkbox" name="usado" value="true" <?=$produtoUsado?>>Usado
				</td>
			</tr>
			<tr>
				<td>Categorias</td>
				<td>

