<div id="conteudo">


  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Usuarios</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>


  <?php echo (isset($msg) ? $msg : '') ?>

  <div class="row">
    <div class="col-md-6">
      <form method="post">

        <input type="hidden" name="acao" value="inserir">

        <div class="row">
          <div class="col-md-12">
            <h4>Adicionar Usuario</h4>
          </div>
          <hr class="sidebar-divider">
          <div class="col-md-12">
            <label class="control-label" for="tipo">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="admin.exemplo">
          </div>
          <div>&nbsp</div>
          <div class="col-md-6">
            <label class="control-label" for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Admin">
          </div>

          <div class="col-md-6">
            <label class="control-label" for="sobrenome">Sobrenome</label>
            <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="exemplo">
          </div>
          <div>&nbsp</div>
          <div class="col-md-6">
            <label class="control-label" for="senha">Senha</label>
            <input type="text" class="form-control" value="abcd1234" name="senha" id="senha" disabled>
          </div>

          <div class="col-md-6">
            <label class="control-label" for="status">Nivel</label>
            <select class="form-control" name="status">
              <option value=""></option>
              <option value="3">Logistica</option>
              <option value="2">Controladoria</option>
              <option value="1">Administrador</option>

            </select>
          </div>
          <div>&nbsp</div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-default">Cadastrar</button>
          </div>
        </div>



      </form>
    </div>

    <div class="col-md-6" style="overflow:scroll; height: 400px;">
      <div class="col-md-12">
        <h4>Usuarios</h4>
      </div>
      <table class="table table-condensed">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Nivel</th>
          </tr>
        </thead>
        <tbody>
          <?php $usuarios = $this->db->query('SELECT * FROM users ORDER BY name'); ?>
          <?= $usuarios ?>
          <?php foreach ($usuarios->result() as $users) { ?>
            <tr>
              <th scope="row"><a href="#" data-toggle="modal" data-target="#myModal<?php echo $users->user_id ?>">
                  <?php echo $users->name ?>
                </a></th>
              <td>
                <?php echo $users->email ?>
              </td>
              <td>
                <?php if ($users->status == '1') {
                  echo 'Administrador';
                } elseif ($users->status == '2') {
                  echo 'Controladoria';
                } elseif ($users->status == '3') {
                  echo 'Logistica';
                } ?>
              </td>


            </tr>



            <!-- Modal -->
            <div class="modal fade" id="myModal<?php echo $users->user_id ?>" tabindex="-1" role="dialog"
              aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Usuario
                      <?php echo $users->email ?> <span class="pull-right">
                        <form method="post">
                          <input type="hidden" name="acao" value="excluir">
                          <input type="hidden" name="id" value="<?php echo $users->user_id ?>">
                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                      </span>
                    </h4>
                  </div>
                  <div class="modal-body">


                    <div class="row">
                      <div class="col-md-12">
                        <form method="post">

                          <input type="hidden" name="acao" value="editar">


                          <div class="row">

                            <hr class="sidebar-divider">
                            <div class="col-md-12">
                              <label class="control-label" for="tipo">Email</label>
                              <input type="text" class="form-control" name="email" id="email"
                                value="<?php echo $users->email ?>">
                              <input type="hidden" name="id" value="<?php echo $users->user_id ?>">
                            </div>
                            <div>&nbsp</div>
                            <div class="col-md-6">
                              <label class="control-label" for="nome">Nome</label>
                              <input type="text" class="form-control" name="nome" id="nome"
                                value="<?php echo $users->name ?>">
                            </div>

                            <div class="col-md-6">
                              <label class="control-label" for="sobrenome">Sobrenome</label>
                              <input type="text" class="form-control" name="sobrenome" id="sobrenome"
                                value="<?php echo $users->sobrenome ?>">
                            </div>
                            <div>&nbsp</div>
                            <div class="col-md-6">
                              <label class="control-label" for="senha">Senha</label>
                              <input type="text" class="form-control" value="abcd1234" name="senha" id="senha">
                            </div>

                            <div class="col-md-6">
                              <label class="control-label" for="status">Nivel</label>
                              <select class="form-control" name="status">
                                <option value="<?php echo $users->status ?>" selected>
                                  <?php if ($users->status == '1') {
                                    echo 'Administrador';
                                  } elseif ($users->status == '2') {
                                    echo 'Controladoria';
                                  } elseif ($users->status == '3') {
                                    echo 'Logistica';
                                  } ?>
                                </option>
                                <option value="3">Logistica</option>
                                <option value="2">Controladoria</option>
                                <option value="1">Administrador</option>

                              </select>
                            </div>
                            <div>&nbsp</div>

                          </div>




                      </div>
                    </div>





                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar Mudanças</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

          <?php } ?>
        </tbody>
      </table>
    </div>


  </div>
</div>