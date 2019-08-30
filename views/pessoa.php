<script>
  function editarPessoa(id,nome,cpf,email,datanascimento) {
    $("#id_pessoa").val(id);
    $("#nome_pessoa").val(nome);
    $("#cpf_pessoa").val(cpf);
    $("#email_pessoa").val(email);
    $("#datanascimento_pessoa").val(datanascimento);
}
</script>


<div class="content-wrapper">
  <section class="content-header">
    <h1>Pessoa<small>Cadastro</small></h1><br>
    
    <button type="button" class="btn btn-primaryyy" data-toggle="modal" data-target="#modalAddPessoa"><i class="fa fa-plus" aria-hidden="true"></i> Nova Pessoa</button>

      <div class="modal fade" id="modalAddPessoa">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><b>Cadastrar Pessoa</b></h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?= BASE; ?>pessoa/salvar">
                <input type="hidden" name="id" class="form-control" readonly style="width:40px;">

                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" placeholder="Insira o nome da pessoa" autofocus required><br>

                <label for="cpf">CPF</label>
                <input type="text" name="cpf" class="form-control" data-mask="000.000.000.00" placeholder="Insira o CPF" required><br>

                <label for="email">E-mail</label>
                <input type="text" name="email" class="form-control" placeholder="Insira o E-mail" required><br>

                <label for="datanascimento">Data de Nascimento</label>
                <input type="text" name="datanascimento" class="form-control" data-mask="00/00/0000" placeholder="Insira a data de nascimento" required><br>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primaryyy pull-left" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
              <button type="submit" class="btn btn-primaryyy"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalEditPessoa">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><b>Editar Pessoa</b></h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?php echo BASE; ?>pessoa/editar" enctype="multipart/form-data">
                <input type="hidden" name="id" class="form-control" id="id_pessoa" readonly style="width: 40px;">
                
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome_pessoa" placeholder="Insira o nome da Pessoa" required ><br>

                <label for="cpf">CPF</label>
                <input type="text" name="cpf" class="form-control" id="cpf_pessoa" data-mask="000.000.000.00" placeholder="Insira o CPF" required ><br>

                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" id="email_pessoa" placeholder="Insira o E-mail" required ><br>

                <label for="datanascimento">Data de nascimento</label>
                <input type="text" name="datanascimento" class="form-control" data-mask="00/00/0000" id="datanascimento_pessoa" placeholder="Insira a data de nascimento" required ><br>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primaryyy pull-left" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
              <button type="submit" class="btn btn-primaryyy"><i class="fa fa-check" aria-hidden="true"></i> Editar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
  </section>

  <section class="content">
    <div class="box box-widget ">
      <div class="box-header with-border">
        <h3 class="box-title">Pessoas cadastrados</h3>
      </div>
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>CPF</th>
              <th>E-mail</th>
              <th>Data de nascimento</th>
              <th class="text-center">Opções</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($pessoas as $pessoa): ?>
            <tr>
              <td><?php echo $pessoa['id']; ?></td>
              <td><?php echo $pessoa['nome']; ?></td>
              <td><?php echo $pessoa['cpf']; ?></td>
              <td><?php echo $pessoa['email']; ?></td>
              <td><?php echo $pessoa['datanascimento']; ?></td>
              <td>
                <div class='text-center'>
                  <a type="button" class="btn btn-primaryyy btn-xs" onclick="editarPessoa('<?php echo $pessoa['id']; ?>','<?php echo $pessoa['nome']; ?>','<?php echo $pessoa['cpf']; ?>','<?php echo $pessoa['email']; ?>','<?php echo $pessoa['datanascimento']; ?>')"  data-toggle="modal" data-target="#modalEditPessoa" data-toggle="tooltip" data-placement="left" title="Editar">
                    <i class='fa fa-pencil'></i>
                  </a>
                  <a type="button" href="<?php echo BASE; ?>pessoa/excluir/<?php echo $pessoa['id']; ?>" class="btn btn-dangerrr btn-xs" data-confirm="Deseja excluir a pessoa selecionada?" data-toggle="tooltip" data-placement="right" title="Excluir">
                    <i class='fa fa-trash'></i>
                  </a> 
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>CPF</th>
              <th>E-mail</th>
              <th>Data de nascimento</th>
              <th class="text-center">Opções</th>
            </tr>
          </tfoot>
          </table>
        </div>
      </div>
    </section>
</div>
