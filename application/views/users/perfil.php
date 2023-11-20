<div id="conteudo">


  <div class="">
    <div class="col-lg-12">
      <h1 class="page-header">Perfil Usuario</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>


  <div class="row">
    <div class="col-md-6">
      <form method="post" action="..">

        <input type="hidden" name="acao" value="editar">

        <?php
        $email = $_SESSION['email'];
        $perfil = $this->db->query("SELECT * FROM users where email =  '$email'") ?>
        <?php foreach ($perfil->result() as $perfili) { ?>
          <input type="hidden" name="id" value="<?php echo $perfili->user_id ?>">
          <div class="row">

            <hr class="sidebar-divider">
            <div class="col-md-12">
              <label class="control-label" for="tipo">Email</label>
              <input type="text" class="form-control" name="email" id="email" value="<?php echo $perfili->email ?>"
                disabled>
            </div>
            <div>&nbsp;</div>
            <div class="col-md-6">
              <label class="control-label" for="nome">Nome</label>
              <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $perfili->name ?>">
            </div>

            <div class="col-md-6">
              <label class="control-label" for="sobrenome">Sobrenome</label>
              <input type="text" class="form-control" name="sobrenome" id="sobrenome"
                value="<?php echo $perfili->sobrenome ?>">
            </div>
            <div>&nbsp;</div>
            <div class="col-md-6">
              <label class="control-label" for="senha">Senha</label>
              <input type="text" class="form-control" name="senha" id="senha">
            </div>

            <div class="col-md-6">
              <label class="control-label" for="status">Nivel</label>
              <select class="form-control" disabled>
                <option value="1">
                  <?php echo $perfili->status ?>
                </option>


              </select>
            </div>
            <div>&nbsp;</div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-default">Cadastrar</button>
            </div>
          </div>

        <?php } ?>


      </form>
    </div>

    <div class="col-md-6" style="overflow:scroll; height: 400px;">
      <div class="col-md-12">
        <h4>Usuarios</h4>
      </div>



      <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Usuario victor.azevedo <span class="pull-right">
                  <form method="post"></form>
                  <input type="hidden" name="acao" value="excluir">
                  <input type="hidden" name="id" value="1">
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                </span></h4>
            </div>
            <div class="modal-body">


              <div class="row">
                <div class="col-md-12">
                  <form method="post"></form>

                  <input type="hidden" name="acao" value="editar">


                  <div class="row">

                    <hr class="sidebar-divider">
                    <div class="col-md-12">
                      <label class="control-label" for="tipo">Email</label>
                      <input type="text" class="form-control" name="email" id="email" value="victor.azevedo">
                      <input type="hidden" name="id" value="1">
                    </div>
                    <div>&nbsp;</div>
                    <div class="col-md-6">
                      <label class="control-label" for="nome">Nome</label>
                      <input type="text" class="form-control" name="nome" id="nome" value="Victor">
                    </div>

                    <div class="col-md-6">
                      <label class="control-label" for="sobrenome">Sobrenome</label>
                      <input type="text" class="form-control" name="sobrenome" id="sobrenome" value="Azevedo">
                    </div>
                    <div>&nbsp;</div>
                    <div class="col-md-6">
                      <label class="control-label" for="senha">Senha</label>
                      <input type="text" class="form-control" value="abcd1234" name="senha" id="senha">
                    </div>

                    <div class="col-md-6">
                      <label class="control-label" for="status">Nivel</label>
                      <select class="form-control" name="status">
                        <option value="1" selected="">Administrador</option>
                        <option value="3">Logistica</option>
                        <option value="2">Controladoria</option>
                        <option value="1">Administrador</option>

                      </select>
                    </div>
                    <div>&nbsp;</div>

                  </div>




                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary">Salvar Mudanças</button>
            </div>

          </div>
        </div>
      </div>

      <table class="table table-condensed">
        <thead>
          <tr>
            <th>Protocolo</th>
            <th>Data Chegada</th>
            <th>Desova</th>
          </tr>
        </thead>
        <tbody>

          <?php $eventos = $this->db->query("SELECT * FROM Eventos where Usuario = '$email'"); ?>
          <?php foreach ($eventos->result() as $linha) {

            $data = str_replace("-", "/", $linha->Data_chegada);
            $datach = date('d/m/Y', strtotime($data));

            $datas = str_replace("-", "/", $linha->desova);
            $datad = date('d/m/Y', strtotime($data));

            ?>


            <tr>
              <th height="25" align="left" valign="top" class="">
                <div align="left" style="width: 47px;
    overflow: hidden; text-overflow: clip;white-space: nowrap;"><span class="">
                    <b><a href="#">
                        <?php echo $linha->protocolo; ?>
                      </a></b></span></div>
              </th>
              <td>
                <?php echo $datach ?>
              </td>
              <td>
                <?php echo $datad ?>
              </td>


            </tr>
          <?php } ?>


          <?php $evento = $this->db->query("SELECT * FROM Eventos where user_map = '$email'"); ?>
          <?php foreach ($evento->result() as $linh) {

            $data = str_replace("-", "/", $linh->Data_chegada);
            $datach = date('d/m/Y', strtotime($data));

            $datas = str_replace("-", "/", $linh->desova);
            $datad = date('d/m/Y', strtotime($data));

            ?>
            <tr>
              <th height="25" align="left" valign="top" class="">
                <div align="left" style="width: 47px;
    overflow: hidden; text-overflow: clip;white-space: nowrap;"><span class="">
                    <b><a href="#">
                        <?php echo $linh->protocolo ?>
                      </a>
              </th>
              <td>
                <?php echo $datach ?>
              </td>
              <td>
                <?php echo $datad ?>
              </td>


            </tr>
          <?php } ?>



        </tbody>
      </table>

    </div>


  </div>




</div>




<br>
<br><br>